var x = document.getElementById("contain");

x.addEventListener("click", myFunction);

function myFunction() {
    var element = document.getElementById("nav");
    element.classList.toggle("open");

    x.classList.toggle("change");
}

(function() {
    'use strict';

    function trackScroll() {
        var scrolled = window.pageYOffset;
        var coords = document.documentElement.clientHeight;

        if (scrolled > coords) {
            goTopBtn.classList.add('back_to_top-show');

        }
        if (scrolled < coords) {
            goTopBtn.classList.remove('back_to_top-show');

        }
    }

    function backToTop() {
        if (window.pageYOffset > 0) {
            window.scrollBy(0, -80);
            setTimeout(backToTop, 1);
        }
    }

    var goTopBtn = document.querySelector('.back_to_top');

    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
})();


function datepick(id){
    if(id === 'in'){
        let dateOut = $('#out').val();
        let newDateOut = '';
        if(dateOut){
            dateOut = dateOut.split('.');
            dateOut[1]--;
            newDateOut = new Date(dateOut[2],dateOut[1],dateOut[0]);
        }
        var myDatepicker = $('#'+id).datepicker(
            {
                toggleSelected: false,
                todayButton: new Date(),
                minDate: new Date(),
                // maxDate: newDateOut,
                onSelect: function (date) {
                    let dateIn = date.split('.');
                    dateIn[1]--;
                    let newDateIn = new Date(dateIn[2],dateIn[1],dateIn[0]);
                    if (newDateIn>=newDateOut){
                        dateIn[0]++;
                        newDateIn.setDate(dateIn[0]);
                        $('#out').datepicker().data('datepicker').selectDate(newDateIn);
                    }
                }
            }
        ).data('datepicker');
        myDatepicker.show();

    }
    else{
        let dateIn = $('#in').val();
        let newDateIn = new Date();
        if(dateIn){
            dateIn = dateIn.split('.');
            dateIn[0]++;
            dateIn[1]--;
            newDateIn = new Date(dateIn[2],dateIn[1],dateIn[0]);
        }
        var Datepicker = $('#'+id).datepicker(
            {
                toggleSelected: false,
                minDate: newDateIn
            }
        ).data('datepicker');
        Datepicker.show();
    }

}
let at1 = getCookie('in');
let out = getCookie('out');
if( $('#in').val()=='' &&  $('#out').val()==''){
    $('#in').datepicker().data('datepicker').selectDate(new Date());
    let newDate = new Date();
    newDate.setDate(newDate.getDate()+1);
    $('#out').datepicker().data('datepicker').selectDate(newDate);
    let at = $('#in').val();
    let out1 = $('#out').val();
    let guests = $('#guest').val();
    document.cookie = "in="+ at+"; path=/; max-age = 14400";
    document.cookie = "out="+out1+"; path=/; max-age = 14400";
    document.cookie = "guests="+guests+"; path=/; max-age = 14400;";
}
else{
    at1= at1.split('.');out = out.split('.');
    at1[1]--;out[1]--;
    $('#in').datepicker().data('datepicker').selectDate(new Date(at1[2],at1[1],at1[0]));
    $('#out').datepicker().data('datepicker').selectDate(new Date(out[2],out[1],out[0]));
}


    // $('#new1').on('click', function(e){
    //     $('html,body').stop().animate({ scrollTop: $('#news1').offset().top }, 1000);
    //     e.preventDefault();
    // });
var myHash = location.hash; //получаем значение хеша
location.hash = ''; //очищаем хеш
if(myHash[1] != undefined){ //проверяем, есть ли в хеше какое-то значение
    $('html, body').animate({scrollTop: $(myHash).offset().top}, 500); //скроллим за полсекунды
}
function editInput(event){
    let val = event.target.value;
    if (!isNaN(val)){
        let info = $('#guest');
        // .tooltip({
        //     title: 'Выбрано максимальное количество гостей для заселения в номер',
        //     content: 'Выбрано максимальное количество гостей для заселения в номер',
        //     placement: 'top'
        // });
        if(val<1 && val !=='' ){
            event.target.value = 1;
            // info.popover({
            //     title: 'Выбрано максимальное количество гостей для заселения в номер',
            //     content: 'Выбрано максимальное количество гостей для заселения в номер',
            //     placement: 'top'
            // }).popover('show');
            // // info.tooltip('enable');
            // info.popover('show');
            // setTimeout( () => info.tooltip('disable'),4000);
        }
        else if (val>4 && val!==''){
            event.target.value = 4;
            // $('#guest').attr('title', 'Выбрано максимальное количество гостей для заселения в номер');
            // info.tooltip('show');
            // setTimeout( () => info.tooltip('hide'),4000);
        }
    }
    else {
        event.target.value = '';
    }
}

function slider(event,id) {
    let tag = '';
    if (event == 1) tag = 'DIV';
    else tag = event.toElement.nodeName;

    if (tag === 'BUTTON') return false;
    else {
        let slider = document.getElementById('demo'+id);
        let sliders = document.getElementsByClassName('demo');

        if (slider.style.display === 'none'){
            for (const slider1 of sliders) {
                slider1.style.display = 'none';
            }
            slider.style.display = 'block';
        }
        else
            slider.style.display = 'none';
    }




}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function clearInput(event){
    event.target.value = '';
}