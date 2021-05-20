
function setCookie(){
    let at = $('#in').val();
    let out = $('#out').val();
    let guests = $('#guest').val();
    document.cookie = "in="+ at+"; path=/; max-age = 14400";
    document.cookie = "out="+out+"; path=/; max-age = 14400";
    document.cookie = "guests="+guests+"; path=/; max-age = 14400;";
}
