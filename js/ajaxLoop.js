// ajaxLoop.js
jQuery(function($) {
  var loopHandlerUrl = "https://teatroparenti.local/web/themes/tfp/loops/loop-handler.php";
  var page = 1;
  var loading = true;
  var $window = $(window);
  var $content = $("#appender");
  var load_posts = function() {
    $.ajax({
      type: "GET",
      data: {
        numPosts: 4,
        pageNumber: page
      },
      dataType: "html",
      url: loopHandlerUrl,
      beforeSend: function() {
        if (page != 1) {
          $content.append('<div id="temp_load" style="text-align:center">\
                            <img src="../images/ajax-loader.gif" />\
                            </div>');
        }
      },
      success: function(data) {
        $data = $(data);
        if ($data.length) {
          $data.hide();
          $content.append($data);
          $data.fadeIn(500, function() {
            $("#temp_load").remove();
            loading = false;
          });
        } else {
          $("#temp_load").remove();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $("#temp_load").remove();
        alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      }
    });
  }
  $window.scroll(function() {
    var content_offset = $content.offset();
    //console.log(content_offset.top);
    if (!loading && ($window.scrollTop() +
        $window.height()) > ($content.scrollTop() +
        $content.height() + content_offset.top)) {
      loading = true;
      page++;
      load_posts();
    }
  });
  load_posts();
});