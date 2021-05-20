<?php

$in = $_GET['in']??'';
$out = $_GET['out']??'';

$guests = $_GET['guests']??'';

if(!$in && !$out && !$guests){
    $in = $_COOKIE['in']??'';
    $out = $_COOKIE['out']??'';
    $guests = $_COOKIE['guests']??'';
}

if(!$guests) $guests = 1;
?>

<form action="/frontend/web/rooms/index" method="get" class="d-flex justify-content-center sidebar mb-5"">
    <article class="filter-group">
        <div class="d-flex flex-row">
            <div class="col-6">
                <label for="">Заселение</label>
                <img class="calendar" src="https://img.icons8.com/color/48/000000/calendar.png" onClick="{datepick('in')}">
                <input type="text" class="inpDate form-control " value="<?=$in?>" onClick="{datepick('in')}" id="in" name="in" readonly
                >
            </div>
            <div class="col-6">
                <label for="">Выезд</label>
                <img class="calendar" src="https://img.icons8.com/color/48/000000/calendar.png" onClick="{datepick('out')}" >
                <input type="text" class="inpDate form-control " value="<?=$out?>"  onClick="{datepick('out')}" id="out" name="out" readonly
                >
            </div>
        </div>

    </article>
    <article class="filter-group">
        <div class="form-group col-12">
            <label class="title">Гости</label>
            <img class="guests" src="https://img.icons8.com/ios-glyphs/30/000000/guest-male.png"/>
            <div class="guestsDiv">
                <input name="guests" class="form-control" data-toggle="popover" id="guest" maxlength="1" onclick="clearInput(event)" required value='<?= $guests ?>'
                       onInput="editInput(event)">
<!--                <span class="tooltip top_tooltip">Top  Tooltip</span>-->
            </div>
        </div>
    </article>
    <div class="d-flex justify-content-center">
        <button type="submit" onclick="setCookie()" class="btn btn-primary" style=" margin-top: 1%; font-size: 120%">Показать цены</button>
    </div>
</form>
