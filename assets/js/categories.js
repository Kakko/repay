const add_cat = $('#add_category').html(); //CONST CREATED TO SET FIELDS TO EMPTY
function cad_categories() {
    $('#add_category').html(add_cat);
    $("[name='cat_action']").val('add');
    $('#add_category').modal('show');

    list_cats();
}

function list_cats(){
    $.post('', {
        cat_action: 'list'
    }, function(data){
        // console.log(data);
        $('.cat_show').html(data);
    })
}

function submit_cat(){
    var name = $("[name='cat_name']").val();
    if(name != ''){
        $.post('', {
            name: name,
            cat_action: 'add'
        }, function(data){
            // console.log(data);
            $('.cat_show').html(data);
            home_list_cats();
        })
    }
}

function rename(id, element) {
    if($('.input_cat_show').is('[readonly]')){
        $(element).css('cursor', 'text');
        $('.input_cat_show').removeAttr('readonly');
    }
    element.addEventListener('keyup', function(e){
        var key = e.which || e.keyCode;
        if (key == 13) { 
        $.post('', {
            id_cat: element.getAttribute('data_id'),
            input_value: element.value,
            cat_action: 'edit'
        }, function(data){
            $('.cat_show').html(data);
            home_list_cats();
        })
        $(element).css('cursor', 'pointer');
        $('.input_cat_show').Attr('readonly');
    }
    });
}

function delete_cat(id){
    let c = confirm("Deseja excluir a categoria?")
    if(c == true) {
        $.post('', {
            id: id,
            cat_action: 'delete'
        }, function(data){
            console.log(data);
            $('.cat_show').html(data);
        })
    }
    home_list_cats();
}

function home_list_cats(){
    $.post('', {
        cat_action: 'list_all'
    }, function(data_list){
        console.log(data_list);
        $('#cat_list').html(data_list);
    })
}