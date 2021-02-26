// impostazioni iniziali
var to_input;
var to_percorso;
var to_url;
var to_subb;

var startDateToApi;
var endDateToApi;
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
if ( here === 'home' ) {
  var numberOfDaysToAdd = 0;
  var arrowJump = 1;
}
else {
  var numberOfDaysToAdd = 7;
  var arrowJump = 7;
}





if ( here === 'home' ) {
  // imposto il prossimo giorno come chiamata iniziale se non ci sono parametri
if ( typeof endDateToApi === 'undefined' || endDateToApi === null || endDateToApi === '' ) {
  var getDateTo = new Date();
  //var numberOfDaysToAdd = 30;
  getDateTo.setDate(getDateTo.getDate() + numberOfDaysToAdd);
  yr = getDateTo.getFullYear(),
  month = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
  day = ("0" + getDateTo.getDate()).slice(-2),
  endDate = yr + '' + month + '' + day;
  var endDateFor = day + '/' + month + '/' + yr;
  endDateToApi = endDate;
  findDayAndMonth();
  getDateToWeekHandle = new Date(toValidDateEnd(endDateFor));
  $('.datepicker-to').val(dayName +" "+ monthName +" al Parenti");
  date_mod = $("datepicker-from").val();
  $('.calendar-dates-end').each(resizeInput);
}

else {
  reconvertFrom = startDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
  getDateFromWeekHandle = new Date(reconvertFrom);
  getDateFromWeekHandle.setDate(getDateFromWeekHandle.getDate());
  yr = getDateFromWeekHandle.getFullYear(),
  month = ("0" + (getDateFromWeekHandle.getMonth() + 1)).slice(-2),
  day = ("0" + getDateFromWeekHandle.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  findDayAndMonth();
  $('.datepicker-to').val(dayName +" "+ monthName);



  reconvertTo = endDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
  getDateToWeekHandle = new Date(reconvertTo);

  getDateToWeekHandle.setDate(getDateToWeekHandle.getDate());
  yr = getDateToWeekHandle.getFullYear(),
  month = ("0" + (getDateToWeekHandle.getMonth() + 1)).slice(-2),
  day = ("0" + getDateToWeekHandle.getDate()).slice(-2),
  endDate = yr + '' + month + '' + day;
  var endDateFor = day + '/' + month + '/' + yr;
  endDateToApi = endDate;
  findDayAndMonth();
  if ( endDate != startDate ) {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
  }
  else {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" al Parenti");
  }
  $('.calendar-dates-end').each(resizeInput);

  if ( startDateToApi != endDateToApi) {
    arrowJump = 7;
    $('.one-week').addClass('current-filter');
    $('.one-day').removeClass('current-filter');
  }
  else {
    arrowJump = 1;
    $('.one-week').removeClass('current-filter');
    $('.one-day').addClass('current-filter');
  }
}
}
else {
  // imposto il prossimo giorno come chiamata iniziale se non ci sono parametri
  if ( typeof endDateToApi === 'undefined' || endDateToApi === null || endDateToApi === '' ) {
    var getDateFrom = new Date();
    var getDateFromWeekHandle = new Date();
    yr = getDateFrom.getFullYear(),
    month = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
    day = ("0" + getDateFrom.getDate()).slice(-2),
    startDate = yr + '' + month + '' + day;
    var startDateFor = day + '/' + month + '/' + yr;
    startDateToApi = startDate;
    findDayAndMonth();
    $('.datepicker-to').val(dayName +" "+ monthName);

    var getDateTo = new Date();
    var numberOfDaysToAdd = arrowJump;
    getDateTo.setDate(getDateTo.getDate() + numberOfDaysToAdd);
    yr = getDateTo.getFullYear(),
    month = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
    day = ("0" + getDateTo.getDate()).slice(-2),
    endDate = yr + '' + month + '' + day;
    var endDateFor = day + '/' + month + '/' + yr;
    endDateToApi = endDate;
    findDayAndMonth();
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
    getDateToWeekHandle = new Date(toValidDateEnd(endDateFor));
    date_mod = $("datepicker-from").val();
    $('.calendar-dates-end').each(resizeInput);
  }

  else {
    reconvertFrom = startDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
    getDateFromWeekHandle = new Date(reconvertFrom);
    getDateFromWeekHandle.setDate(getDateFromWeekHandle.getDate());
    yr = getDateFromWeekHandle.getFullYear(),
    month = ("0" + (getDateFromWeekHandle.getMonth() + 1)).slice(-2),
    day = ("0" + getDateFromWeekHandle.getDate()).slice(-2),
    startDate = yr + '' + month + '' + day;
    var startDateFor = day + '/' + month + '/' + yr;
    startDateToApi = startDate;
    findDayAndMonth();
    $('.datepicker-to').val(dayName +" "+ monthName);



    reconvertTo = endDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
    getDateToWeekHandle = new Date(reconvertTo);

    getDateToWeekHandle.setDate(getDateToWeekHandle.getDate());
    yr = getDateToWeekHandle.getFullYear(),
    month = ("0" + (getDateToWeekHandle.getMonth() + 1)).slice(-2),
    day = ("0" + getDateToWeekHandle.getDate()).slice(-2),
    endDate = yr + '' + month + '' + day;
    var endDateFor = day + '/' + month + '/' + yr;
    endDateToApi = endDate;
    findDayAndMonth();
    if ( endDate != startDate ) {
      mydate = $('.datepicker-to').val();
      $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
    }
    else {
      mydate = $('.datepicker-to').val();
      $('.datepicker-to').val(mydate +" al Parenti");
    }
    $('.calendar-dates-end').each(resizeInput);

    if ( startDateToApi != endDateToApi) {
      arrowJump = 7;
      $('.one-week').addClass('current-filter');
      $('.one-day').removeClass('current-filter');
    }
    else {
      arrowJump = 1;
      $('.one-week').removeClass('current-filter');
      $('.one-day').addClass('current-filter');
    }
  }
}















function resizeInput() {
  var dateValue = $(this).val();
  var dateValueLength = ( dateValue.length - 2 );
  $(this).attr('size',dateValueLength);
}

// disabilito tutti i campi mentre i contenuti vengono caricati in modo da evitare troppe richieste
$('.disableable').addClass('no-more-requests');

// conversione numero del giorno e mese
function findDayAndMonth() {
  if ( day == 01 ) {
    dayName = "1";
  }
  else if ( day == 02 ) {
    dayName = "2";
  }
  else if ( day == 03 ) {
    dayName = "3";
  }
  else if ( day == 04 ) {
    dayName = "4";
  }
  else if ( day == 05 ) {
    dayName = "5";
  }
  else if ( day == 06 ) {
    dayName = "6";
  }
  else if ( day == 07 ) {
    dayName = "7";
  }
  else if ( day == 08 ) {
    dayName = "8";
  }
  else if ( day == 09 ) {
    dayName = "9";
  }
  else {
    dayName = day;
  }

  if ( month == 1 ) {
    monthName = "Gennaio";
  }
  else if ( month == 2 ) {
    monthName = "Febbraio";
  }
  else if ( month == 3 ) {
    monthName = "Marzo";
  }
  else if ( month == 4 ) {
    monthName = "Aprile";
  }
  else if ( month == 5 ) {
    monthName = "Maggio";
  }
  else if ( month == 6 ) {
    monthName = "Giugno";
  }
  else if ( month == 7 ) {
    monthName = "Luglio";
  }
  else if ( month == 8 ) {
    monthName = "Agosto";
  }
  else if ( month == 9 ) {
    monthName = "Settembre";
  }
  else if ( month == 10 ) {
    monthName = "Ottobre";
  }
  else if ( month == 11 ) {
    monthName = "Novembre";
  }
  else if ( month == 12 ) {
    monthName = "Dicembre";
  }
}

// riconversione data iniziale per datepicker
function toValidDateStart(datestring){
    return datestring.replace(/(\d{2})(\/)(\d{2})/, "$3$2$1");
}

// riconversione data finale per datepicker
function toValidDateEnd(datestring){
    return datestring.replace(/(\d{2})(\/)(\d{2})/, "$3$2$1");
}

// imposto la data di oggi se non ci sono parametri
if ( typeof startDateToApi === 'undefined' || startDateToApi === null || startDateToApi === '' ) {
  var getDateFrom = new Date();
  yr = getDateFrom.getFullYear(),
  month = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
  day = ("0" + getDateFrom.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  findDayAndMonth();
  getDateFromWeekHandle = new Date(toValidDateStart(startDateFor));
  $('.datepicker-to').val(dayName +" "+ monthName +" al Parenti");
}

// mostra solo gli eventi di oggi
$('.one-day').unbind().click(function(){
  arrowJump = 1;
  $('.disableable').addClass('no-more-requests');
  var getDateFrom = new Date(getDateFromWeekHandle);

  var getDateTo = new Date(getDateToWeekHandle);

  yr = getDateFrom.getFullYear(),
  month = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
  day = ("0" + getDateFrom.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  endDateToApi = startDate;
  getDateFromWeekHandle = new Date(toValidDateStart(startDateFor));
  getDateToWeekHandle = new Date(toValidDateEnd(startDateFor));
  findDayAndMonth();
  $('.datepicker-to').val(dayName +" "+ monthName +" al Parenti");
  filter_posts_button();
  $('.calendar-dates-end').each(resizeInput);
  $(this).addClass('current-filter');
  $('.one-week').removeClass('current-filter');
});

// mostra solo gli eventi di una settimana a partire da oggi
$('.one-week').unbind().click(function(){
  arrowJump = 7;
  $('.disableable').addClass('no-more-requests');
  var getDateFrom = new Date(getDateToWeekHandle);
  yr = getDateFrom.getFullYear(),
  month = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
  day = ("0" + getDateFrom.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  findDayAndMonth();
  $('.datepicker-to').val(dayName +" "+ monthName);
  getDateFromWeekHandle = new Date(toValidDateStart(startDateFor));
  var getDateTo = new Date(getDateFrom);
  var numberOfDaysToAdd = arrowJump;
  getDateTo.setDate(getDateTo.getDate() + numberOfDaysToAdd);
  yr = getDateTo.getFullYear(),
  month = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
  day = ("0" + getDateTo.getDate()).slice(-2),
  endDate = yr + '' + month + '' + day;
  var endDateFor = day + '/' + month + '/' + yr;
  endDateToApi = endDate;
  findDayAndMonth();
  mydate = $('.datepicker-to').val();
  $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
  getDateToWeekHandle = new Date(toValidDateEnd(endDateFor));
  filter_posts_button();
  $('.calendar-dates-end').each(resizeInput);
  $('.hide-separator, .datepicker-to').show();
  $(this).addClass('current-filter');
  $('.one-day').removeClass('current-filter');
});

// freccia avanti
$('.one-week-more').unbind().click(function(){
  $('.disableable').addClass('no-more-requests');
  var plusOneWeekStart = new Date(getDateToWeekHandle);
  if ( arrowJump == 1 ) {
    plusOneWeekStart.setDate(plusOneWeekStart.getDate() + 1);
  }
  yr = plusOneWeekStart.getFullYear(),
  month = ("0" + (plusOneWeekStart.getMonth() + 1)).slice(-2),
  day = ("0" + plusOneWeekStart.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  findDayAndMonth();
  $('.datepicker-to').val(dayName +" "+ monthName);
  getDateFromWeekHandle = new Date(toValidDateStart(startDateFor));


  var plusOneWeekEnd = new Date(getDateToWeekHandle);
  var numberOfDaysToAdd = arrowJump;
  plusOneWeekEnd.setDate(plusOneWeekEnd.getDate() + numberOfDaysToAdd);
  yr = plusOneWeekEnd.getFullYear(),
  month = ("0" + (plusOneWeekEnd.getMonth() + 1)).slice(-2),
  day = ("0" + plusOneWeekEnd.getDate()).slice(-2),
  endDate = yr + '' + month + '' + day;
  var endDateFor = day + '/' + month + '/' + yr;
  endDateToApi = endDate;
  findDayAndMonth();
  if ( endDate != startDate ) {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
  }
  else {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" al Parenti");
  }
  getDateToWeekHandle = new Date(toValidDateEnd(endDateFor));
  getDateFromWeekHandle = new Date(toValidDateEnd(startDateFor));
  filter_posts_button();
  $('.calendar-dates-end').each(resizeInput);
});

// freccia indietro
$('.one-week-less').unbind().click(function(){
  $('.disableable').addClass('no-more-requests');
  var minusOneWeekEnd = new Date(getDateFromWeekHandle);
  if ( arrowJump == 1 ) {
    minusOneWeekEnd.setDate(minusOneWeekEnd.getDate() - 1);
  }
  yr = minusOneWeekEnd.getFullYear(),
  month = ("0" + (minusOneWeekEnd.getMonth() + 1)).slice(-2),
  day = ("0" + minusOneWeekEnd.getDate()).slice(-2),
  endDate = yr + '' + month + '' + day;
  var endDateFor = day + '/' + month + '/' + yr;
  endDateToApi = endDate;
  findDayAndMonth();
  $('.datepicker-to').val(dayName +" "+ monthName);
  getDateToWeekHandle = new Date(toValidDateStart(endDateFor));

  var minusOneWeekStart = new Date(getDateFromWeekHandle);
  var numberOfDaysToSub = arrowJump;
  minusOneWeekStart.setDate(minusOneWeekStart.getDate() - numberOfDaysToSub);
  yr = minusOneWeekStart.getFullYear(),
  month = ("0" + (minusOneWeekStart.getMonth() + 1)).slice(-2),
  day = ("0" + minusOneWeekStart.getDate()).slice(-2),
  startDate = yr + '' + month + '' + day;
  var startDateFor = day + '/' + month + '/' + yr;
  startDateToApi = startDate;
  findDayAndMonth();
  if ( endDate != startDate ) {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(dayName +" "+ monthName + " - " + mydate +" al Parenti");
  }
  else {
    mydate = $('.datepicker-to').val();
    $('.datepicker-to').val(mydate +" al Parenti");
  }
  getDateFromWeekHandle = new Date(toValidDateStart(startDateFor));
  filter_posts_button();
  $('.calendar-dates-end').each(resizeInput);
});



$('.datepicker-from').datepicker({
  language: 'en',
  dateFormat: 'd MM',
  todayButton: true,
  clearButton: true,
  autoClose: true,
  inline: false,
  onShow: function() {
    toggleSelected: new Date(getDateFromWeekHandle);
  },
  onSelect: function onSelect(fd, date) {
    var getDateFrom = new Date(date),
    yr = date.getFullYear(),
    month = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2),
    startDate = yr + '' + month + '' + day;
    startDateToApi = startDate;
    getDateFromWeekHandle = getDateFrom;
    if ( day == 01 ) {
      dayName = "1";
    }
    else if ( day == 02 ) {
      dayName = "2";
    }
    else if ( day == 03 ) {
      dayName = "3";
    }
    else if ( day == 04 ) {
      dayName = "4";
    }
    else if ( day == 05 ) {
      dayName = "5";
    }
    else if ( day == 06 ) {
      dayName = "6";
    }
    else if ( day == 07 ) {
      dayName = "7";
    }
    else if ( day == 08 ) {
      dayName = "8";
    }
    else if ( day == 09 ) {
      dayName = "9";
    }
    else {
      dayName = day;
    }

    if ( month == 1 ) {
      monthName = "Gennaio";
    }
    else if ( month == 2 ) {
      monthName = "Febbraio";
    }
    else if ( month == 3 ) {
      monthName = "Marzo";
    }
    else if ( month == 4 ) {
      monthName = "Aprile";
    }
    else if ( month == 5 ) {
      monthName = "Maggio";
    }
    else if ( month == 6 ) {
      monthName = "Giugno";
    }
    else if ( month == 7 ) {
      monthName = "Luglio";
    }
    else if ( month == 8 ) {
      monthName = "Agosto";
    }
    else if ( month == 9 ) {
      monthName = "Settembre";
    }
    else if ( month == 10 ) {
      monthName = "Ottobre";
    }
    else if ( month == 11 ) {
      monthName = "Novembre";
    }
    else if ( month == 12 ) {
      monthName = "Dicembre";
    }
      mydate = $('.datepicker-to').val();
      $('.datepicker-to').val(dayName +" "+ monthName +" al Parenti");




    var getDateTo = new Date(getDateFrom);
    if ( arrowJump == 1 ) {
      getDateTo.setDate(getDateTo.getDate());
      $('.one-day').addClass('current-filter');
      $('.one-week').removeClass('current-filter');
    }
    else {
      getDateTo.setDate(getDateTo.getDate() + arrowJump);
      $('.one-day').removeClass('current-filter');
      $('.one-week').addClass('current-filter');
    }
    yr = getDateTo.getFullYear(),
    month = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
    day = ("0" + getDateTo.getDate()).slice(-2),
    endDate = yr + '' + month + '' + day;

    endDateToApi = endDate;
    getDateToWeekHandle = getDateTo;
    var endDateFor = day + '/' + month + '/' + yr;
    endDateToApi = endDate;
    if ( day == 01 ) {
      dayName = "1";
    }
    else if ( day == 02 ) {
      dayName = "2";
    }
    else if ( day == 03 ) {
      dayName = "3";
    }
    else if ( day == 04 ) {
      dayName = "4";
    }
    else if ( day == 05 ) {
      dayName = "5";
    }
    else if ( day == 06 ) {
      dayName = "6";
    }
    else if ( day == 07 ) {
      dayName = "7";
    }
    else if ( day == 08 ) {
      dayName = "8";
    }
    else if ( day == 09 ) {
      dayName = "9";
    }
    else {
      dayName = day;
    }

    if ( month == 1 ) {
      monthName = "Gennaio";
    }
    else if ( month == 2 ) {
      monthName = "Febbraio";
    }
    else if ( month == 3 ) {
      monthName = "Marzo";
    }
    else if ( month == 4 ) {
      monthName = "Aprile";
    }
    else if ( month == 5 ) {
      monthName = "Maggio";
    }
    else if ( month == 6 ) {
      monthName = "Giugno";
    }
    else if ( month == 7 ) {
      monthName = "Luglio";
    }
    else if ( month == 8 ) {
      monthName = "Agosto";
    }
    else if ( month == 9 ) {
      monthName = "Settembre";
    }
    else if ( month == 10 ) {
      monthName = "Ottobre";
    }
    else if ( month == 11 ) {
      monthName = "Novembre";
    }
    else if ( month == 12 ) {
      monthName = "Dicembre";
    }
    if ( endDate != startDate ) {
      mydate = $('.datepicker-to').val();
      $('.datepicker-to').val(mydate +" - "+ dayName +" "+ monthName +" al Parenti");
    }

    filter_posts_button();
    $('.calendar-dates-end').each(resizeInput);
    $('.disableable').addClass('no-more-requests');
  }
});











// gestisco la tendina tipi di evento
$('.this-voice').unbind().click(function(){
  to_subb = $(this).attr('id');
  to_input = $(this).attr('value');
  to_percorso = '';
  to_url = $(this).attr('slug');
  percorso = $(this).attr('percorso');
  filter_posts_button();
  if ( percorso === 'true' ) {
    if ( to_subb != '' ) {
      $('.top-opener-1-txt-replace').html(to_subb).addClass('txt-3-color');
      $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    }
    else {
      $('.top-opener-2-txt-replace').html("Tipo di evento").addClass('txt-3-color');
      $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi").removeClass('txt-3-color');
    }
    show_percorsi_tax_info();
  }
  else if ( percorso === 'false' ) {
    if ( to_subb != '' ) {
      $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
      $('.top-opener-1-txt-replace').html(to_subb).addClass('txt-3-color');
    }
    else {
      $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
      $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi").removeClass('txt-3-color');
    }
  }
  else {
    if ( to_subb != '' ) {
      $('.top-opener-2-txt-replace').html(to_subb).addClass('txt-3-color');
      $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi").removeClass('txt-3-color');
    }
    else {
      $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
      $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi").removeClass('txt-3-color');
    }
  }
});














// gestisco la tendina tipi di evento
$('.this-voice-fascia').unbind().click(function(){
  to_subb = $(this).attr('id');
  hourToApi = $(this).attr('value');
  $('.top-opener-3-txt-replace').html(to_subb);
  filter_posts_button();

});

$('.sub-opener').hide();
// fake modal
$('.top-opener-1').click(function(){
  $('html').css('overflowY', 'hidden');
  $('body').addClass('occupy-scrollbar');
  $('.modal-set').fadeIn(10);
  $('.fake-select-1').fadeIn(10);
});
$('.top-opener-2').click(function(){
  $('html').css('overflowY', 'hidden');
  $('body').addClass('occupy-scrollbar');
  $('.modal-set').fadeIn(10);
  $('.fake-select-2').fadeIn(10);
});
$('.top-opener-3').click(function(){
  $('html').css('overflowY', 'hidden');
  $('body').addClass('occupy-scrollbar');
  $('.modal-set').fadeIn(10);
  $('.fake-select-3').fadeIn(10);
});
$('.modal-set, .fake-select, .this-voice').click(function(){
  $('html').css('overflowY', 'scroll');
  $('body').removeClass('occupy-scrollbar');
  $('.modal-set').fadeOut(10);
  $('.fake-select-1, .fake-select-2, .fake-select-3').fadeOut(10);
});




// filtro attivato dai menu a tendina
function filter_posts_button() {
  if (to_url === "") {
    to_url = "-";
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

  window.history.pushState("object or string", "Title", "/calendario-spettacoli/"+startDateToApi+""+endDateToApi+"/"+hourToUrl+"/"+to_url+"");
  $('.disableable').addClass('no-more-requests');
  $( "#loading" ).fadeIn(300);
  $( "#result" ).fadeOut(300);
  $( "#result" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=calendario&from="+startDateToApi+"&to="+endDateToApi+"&time="+hourToApi+"&time_interval="+time_interval+"&taxonomies="+to_input+"&date_not_defined=true&source="+here+"&hourToUrl=ii", function( response, status, xhr ) {
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
  function filter_posts() {
    if ( percorso === 'true' ) {
      if ( to_subb != '' ) {
        $('.top-opener-1-txt-replace').html(to_subb);
        $('.top-opener-2-txt-replace').html("Tipo di evento");
      }
      else {
        $('.top-opener-2-txt-replace').html("Tipo di evento");
        $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi");
      }
    }
    else {
      if ( to_subb != '' ) {
        $('.top-opener-2-txt-replace').html(to_subb);
        $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi");
      }
      else {
        $('.top-opener-2-txt-replace').html("Tipo di evento");
        $('.top-opener-1-txt-replace').html("Abbonamenti e percorsi");
      }
    }
    if ( hourToUrl != '' ) {
      if (hourToUrl === "mattino") {
        $('.top-opener-3-txt-replace').html('Mattino');
      }
      if (hourToUrl === "pomeriggio") {
        $('.top-opener-3-txt-replace').html('Pomeriggio');
      }
      if (hourToUrl === "sera") {
        $('.top-opener-3-txt-replace').html('Sera');
      }
    }
    else {
      $('.top-opener-3-txt-replace').html("Fascia oraria");
    }
    $( "#loading" ).fadeIn(300);
    $( "#result" ).fadeOut(300);
    $( "#result" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=calendario&from="+startDateToApi+"&to="+endDateToApi+"&time="+hourToApi+"&time_interval="+time_interval+"&taxonomies="+to_input+"&date_not_defined=true&source="+here+"&hourToUrl=ii", function( response, status, xhr ) {
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
  filter_posts();
});
