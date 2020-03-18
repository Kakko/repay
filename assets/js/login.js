function showPassword(){
    let password = $('#passdata');
    if($(password).attr('type') == 'text'){
        $(password).attr('type', 'password');
        $('.hidden_icon').attr('style', 'background-image: url(http://localhost/repay/assets/images/icons/hidden.png)')
    } else {
        $(password).attr('type', 'text');
        $('.hidden_icon').attr('style', 'background-image: url(http://localhost/repay/assets/images/icons/eye.png)')
    }

}