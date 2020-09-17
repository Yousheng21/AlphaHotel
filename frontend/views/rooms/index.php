
<section class="room-section spad">
    <div class="container">
        <?php foreach ($rooms as $room):?>
        <div class="rooms-page-item mt-3 ">
            <div class="row mb-5" style="box-shadow: 1px 1px 30px 0px rgba(255, 255, 255, 1);">
                <div class="col-lg-6 pl-0 pr-0">
                    <div class="room-pic-slider owl-carousel">
                        <div class="single-room-pic">
                            <img src="<?=$room->image?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="background-color: #a8a8a8">
                    <div class="room-text">
                        <div class="room-title">
                            <h2><?=$room->name?></h2>
                            <div class="room-price">
                                <span>From</span>
                                <div class="d-flex flex-row"><h2><?=$room->price?>$</h2><sub class="align-self-center text-danger" style="font-size: 16px">/night</sub></div>

                            </div>
                        </div>
                        <div class="room-desc">
                            <p><?=$room->description?></p>
                        </div>
                        <div class="room-features">
                            <div class="room-info">
                                <img src="https://img.icons8.com/fluent/50/000000/tv-show.png"/>
                                <span>Smart TV</span>
                            </div>
                            <div class="room-info">
                                <img src="https://img.icons8.com/ios-filled/50/000000/wifi-logo.png"/>
                                <span>High Wi-fii</span>
                            </div>
                            <div class="room-info">
                                <img src="https://img.icons8.com/pastel-glyph/50/000000/air-conditioner--v2.png"/>
                                <span>AC</span>
                            </div>
                            <div class="room-info">
                                <img src="https://img.icons8.com/wired/50/000000/indoor-parking.png"/>
                                <span>Parking</span>
                            </div>
                            <div class="room-info last">
                                <img src="https://img.icons8.com/ios/64/000000/swimming-pool.png"/>
                                <span>Pool</span>
                            </div>
                        </div>
                        <a href="/frontend/web/rooms/reservation?name=<?=$room->name?>" ><button class="btn btn-outline-danger">Заказать <img src="https://img.icons8.com/small/16/000000/right.png"/></button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>


