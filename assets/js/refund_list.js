function refund_select() {
    if($('#contents').hasClass('selected')){
        $('#contents').removeClass('selected');    
    } else {
        $('#contents').addClass('selected');
    }
}