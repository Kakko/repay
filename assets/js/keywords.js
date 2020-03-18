const add_key = $('#add_keyword').html(); //CONST CREATED TO SET FIELDS TO EMPTY
function cad_keywords() {
    $('#add_keyword').html(add_key);
    $("[name='key_action']").val('add');
    $('#add_keyword').modal('show');

    list_key_cats();
    list_keys();
}

function list_key_cats(){
    $.post('', {
        key_action: 'list_cat'
    }, function(data){
        // console.log(data);
        $('#list_cats').html(data);

    })
}

function list_keys(){
    $.post('', {
        key_action: 'list_keys'
    }, function(data){
        $('.key_show').html(data);
    })
}

function add_keyword(){
    let name = $('#key_name').val();
    let category_id = $('#list_cats').val();

    $.post('', {
        name: name,
        category_id: category_id,
        key_action: 'add_key'
    }, function(data){
        $('.key_show').html(data);

    })
}

function delete_key(id){
    let c = confirm("Deseja excluir essa Keyword?");
    if(c ==  true){
        $.post('', {
            id: id,
            key_action: 'delete_key'
        }, function(data){

            $('.key_show').html(data);
        })
    }
}