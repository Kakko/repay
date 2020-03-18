const add_user = $('#add_users').html(); //CONST CREATED TO SET FIELDS TO EMPTY
function add_users() {
    $('#add_users').html(add_user);
    $("[name='user_action']").val('add');
    $('#add_users').modal('show');
    
    list_users();
}

function list_users(){
    $.post('', {
        user_action: 'list_added_users'
    }, function(data){
        console.log(data);
        $('#user_list').html(data);
    })
}

function add_new_user(){
    let name = $('#add_user_name').val();
    let email = $('#add_user_email').val();
    let password = $('#add_user_password').val();
    let type = $('#add_user_type').val();
    console.log(type);
    $.post('', {
        name: name,
        email: email,
        password: password,
        type: type,
        user_action: 'add_user'
    })

}

const edit_user = $('#edit_user').html(); //CONST CREATED TO SET FIELDS TO EMPTY
function view_edit_users(id) { //VIEW THE LOGGED USER'S INFO TO EDIT
    $('#edit_user').html(edit_user);
    $('#edit_user').modal('show');

    $.post('', {
        id: id,
        user_action: 'view_edit',
    }, function(info){
        let dado = JSON.parse(info);
        $("[name='user_name']").val(dado.name);
        $("[name='user_email']").val(dado.email);
    })
}

function send_edited_user(id) { //EDIT THE USER'S INFO
    var user_name = $("[name='user_name']").val();
    var user_email = $("[name='user_email']").val();
    var user_password = $("[name='user_password']").val();
    $.post('', {
        id: id,
        user_name: user_name,
        user_email: user_email,
        user_password: user_password,
        user_action: 'edit'
    }, function(data){
        console.log(data);
    })
}