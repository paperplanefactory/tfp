jQuery(function ($) {
    $('.spettacoli-archiviati-search').on('submit', function (e) {
        e.preventDefault();
        var form_data = $(this).serializeArray();
        var form_verified_data = {};

        var url = $(this).attr('action');

        $.each(form_data, function (i, element) {
            if (element.value != '') {
                if(typeof form_verified_data[element.name] === 'undefined'){
                    form_verified_data[element.name] = [];
                }
                form_verified_data[element.name].push(element.value);
            }
        });

        $.each(form_verified_data, function (i, element) {
            var values = element.toString();
            url += (i.replace('[', '')).replace(']', '') + '/' + values + '/';
        });

        window.location.replace(url);
    });
});
