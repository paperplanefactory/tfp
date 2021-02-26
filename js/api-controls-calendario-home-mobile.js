// impostazioni iniziali
var filtro;
var term_name;
var term_name_trim;
var term_slug;
var term_id;


var startTime;
var hourToApi;
var hourToUrl;


// imposto l'ora
if (hourToUrl === "giornata") {
  hourToApi = '23:59:59';
  time_interval = "to";
}
if (hourToUrl === "mattino") {
  hourToApi = '13:00:00';
  time_interval = "to";
}
if (hourToUrl === "pomeriggio") {
  hourToApi = '20:00:00';
  time_interval = "to";
}
if (hourToUrl === "sera") {
  hourToApi = '20:00:01';
  time_interval = "from";
}
if ( typeof hourToUrl === 'undefined' || hourToUrl === null || hourToUrl === '' ) {
  var hourToApi = '23:59:59';
  time_interval = "to";
}


if ( typeof startDateToApi === 'undefined' || startDateToApi === null || startDateToApi === '' ) {
  var getDateFrom;
  getDateFrom = new Date();
}

else {
  reconvertFrom = startDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
  getDateFrom = new Date(reconvertFrom);
}


timeInterval = 7;

$('.one-week-more').click(function(){
  getDateFrom.setDate(getDateFrom.getDate() + timeInterval);
  startDateConverter();
  endDateConverter();
});

$('.one-week-less').click(function(){
  getDateFrom.setDate(getDateFrom.getDate() - timeInterval);
  startDateConverter();
  endDateConverter();
});


function findStartDayAndMonth() {
  dayFromName = dayFrom.replace(/^0+/, "");
  if ( monthFrom == 1 ) {
    monthFromName = "Gennaio";
  }
  else if ( monthFrom == 2 ) {
    monthFromName = "Febbraio";
  }
  else if ( monthFrom == 3 ) {
    monthFromName = "Marzo";
  }
  else if ( monthFrom == 4 ) {
    monthFromName = "Aprile";
  }
  else if ( monthFrom == 5 ) {
    monthFromName = "Maggio";
  }
  else if ( monthFrom == 6 ) {
    monthFromName = "Giugno";
  }
  else if ( monthFrom == 7 ) {
    monthFromName = "Luglio";
  }
  else if ( monthFrom == 8 ) {
    monthFromName = "Agosto";
  }
  else if ( monthFrom == 9 ) {
    monthFromName = "Settembre";
  }
  else if ( monthFrom == 10 ) {
    monthFromName = "Ottobre";
  }
  else if ( monthFrom == 11 ) {
    monthFromName = "Novembre";
  }
  else if ( monthFrom == 12 ) {
    monthFromName = "Dicembre";
  }
}

function findEndDayAndMonth() {
  dayToName = dayTo.replace(/^0+/, "");
  if ( monthTo == 1 ) {
    monthToName = "Gennaio";
  }
  else if ( monthTo == 2 ) {
    monthToName = "Febbraio";
  }
  else if ( monthTo == 3 ) {
    monthToName = "Marzo";
  }
  else if ( monthTo == 4 ) {
    monthToName = "Aprile";
  }
  else if ( monthTo == 5 ) {
    monthToName = "Maggio";
  }
  else if ( monthTo == 6 ) {
    monthToName = "Giugno";
  }
  else if ( monthTo == 7 ) {
    monthToName = "Luglio";
  }
  else if ( monthTo == 8 ) {
    monthToName = "Agosto";
  }
  else if ( monthTo == 9 ) {
    monthToName = "Settembre";
  }
  else if ( monthTo == 10 ) {
    monthToName = "Ottobre";
  }
  else if ( monthTo == 11 ) {
    monthToName = "Novembre";
  }
  else if ( monthTo == 12 ) {
    monthToName = "Dicembre";
  }
}

function startDateConverter() {
  // recupero l'anno
  yrFrom = getDateFrom.getFullYear(),
  // recupero il mese
  monthFrom = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
  // recupero il giorno
  dayFrom = ("0" + getDateFrom.getDate()).slice(-2),
  // creo la data per le api
  startDateToApi = yrFrom + '' + monthFrom + '' + dayFrom;

  checkTodayDateFrom = new Date();
  // recupero l'anno
  yrFromCheck = checkTodayDateFrom.getFullYear(),
  // recupero il mese
  monthFromCheck = ("0" + (checkTodayDateFrom.getMonth() + 1)).slice(-2),
  // recupero il giorno
  dayFromCheck = ("0" + checkTodayDateFrom.getDate()).slice(-2),
  // creo la data per le api
  startDateToApiCheck = yrFromCheck + '' + monthFromCheck + '' + dayFromCheck;
}


function endDateConverter() {
  getDateTo = getDateFrom;
  getDateTo.setDate(getDateFrom.getDate() + timeInterval);
  // recupero l'anno
  yrTo = getDateTo.getFullYear(),
  // recupero il mese
  monthTo = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
  // recupero il giorno
  dayTo = ("0" + getDateTo.getDate()).slice(-2),
  // creo la data per le api
  endDateToApi = yrTo + '' + monthTo + '' + dayTo;
  findStartDayAndMonth();
  findEndDayAndMonth();

  if ( startDateToApi == startDateToApiCheck ) {
    $('.datepicker-to').val("Oggi");
  }
  else {
    $('.datepicker-to').val(dayFromName +" "+ monthFromName);
  }
  filter_posts_button();
}
startDateConverter();
endDateConverter();


// filtro attivato dai menu a tendina
function filter_posts_button() {
  $('.disableable').addClass('no-more-requests');
  if ( typeof term_slug === 'undefined' || term_slug === null || term_slug === '' ) {
    term_slug = "-";
  }

  if (hourToApi === "23:59:59") {
    hourToUrl = "giornata";
    time_interval = "to";
  }
  if (hourToApi === "13:00:00") {
    hourToUrl = "mattino";
    time_interval = "to";
  }
  if (hourToApi === "20:00:00") {
    hourToUrl = "pomeriggio";
    time_interval = "to";
  }
  if (hourToApi === "20:00:01") {
    hourToUrl = "sera";
    time_interval = "from";
  }

  //window.history.pushState("object or string", "Title", "/calendario-spettacoli/"+startDateToApi+""+endDateToApi+"/"+hourToUrl+"/"+term_slug+"/");
  $('.disableable').addClass('no-more-requests');
  $( "#loading" ).fadeIn(300);
  $( "#result" ).fadeOut(300);
  $( "#result" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=calendario-home-mobile&from="+startDateToApi+"&to="+endDateToApi+"&time="+hourToApi+"&time_interval="+time_interval+"&taxonomies="+term_id+"&date_not_defined=true&source="+here+"&hourToUrl=ii", function( response, status, xhr ) {
    if ( status == "error" ) {
      var msg = "Sorry but there was an error: ";
      $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
    }
    else {
      $( "#loading" ).fadeOut(300);
      $( "#result" ).fadeIn(300);
      $('.no-more-requests').removeClass('no-more-requests');
			$("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
      effect : "fadeIn",
      load : function() {
        $(".lazy-placehoder").fadeOut(150);
      }
      });
    }
  });

}




// faccio la chiamata iniziale
$(document).ready(function() {
  get_and_compile_dropdown();
});
