<?php
class homeController extends Controller {

    public function __construct(){
        parent:: __construct();

        $users = new Users();
        if($users->isLogged() == false){
            header("Location: ".BASE_URL."login");
        }
    }

    public function index() {
        $data = array();
        $users = new Users();
        $logs = new Logs();
        $categories = new Categories();
        $keywords = new Keywords();



        //MODALS
        if(!empty($_POST['user_action']) && isset($_POST['user_action'])){ 
            //ADD NEW USER
            if($_POST['user_action'] == 'add_user'){
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $password = addslashes(md5($_POST['password']));
                $type = addslashes($_POST['type']);
                $status = 'Ativo';
                $data_cadastro = date("Y-m-d H:i:s");

                echo $users->add_new_user($name, $email, $password, $type, $status, $data_cadastro);
                exit;    
            }
            //LIST USERS
            if($_POST['user_action'] == 'list_added_users'){
                echo $users->list_add_users();
                exit;
            }
            //SHOW ADDED USERS TO EDIT
            if($_POST['user_action'] == 'view_edit'){
                $id = addslashes($_POST['id']);

                echo $users->infoLoggedUser($id);
                exit;
            }
            //UPDATE ADDED USERS
            if($_POST['user_action'] == 'edit'){
 
                $id = addslashes($_POST['id']);
                $user_name = addslashes($_POST['user_name']);
                $user_email = addslashes($_POST['user_email']);
                if(!empty($_POST['user_password'])){
                    $user_password = addslashes(md5($_POST['user_password']));
                } else {
                    $user_password = '';
                }

                $users->edit_user($id, $user_name, $user_email, $user_password);
                exit;
            }
        }

        if(!empty($_POST['cat_action']) && isset($_POST['cat_action'])){
            //ADD NEW CATEGORY
            if($_POST['cat_action'] == 'add'){
                $name = addslashes($_POST['name']);
                $data_cadastro = date("Y-m-d H:i:s");

                echo $categories->add_new_cat($name, $data_cadastro);
                exit;
            }
            //LIST ALL CATEGORIES
            if($_POST['cat_action'] == 'list'){

                echo $categories->listCats();
                exit;
            }
            //EDIT A CATEGORY
            if($_POST['cat_action'] == 'edit'){
                $id = addslashes($_POST['id_cat']);
                $name = addslashes($_POST['input_value']);

                echo $categories->edit_cat($id, $name);
                exit;
            }
            //DELETE A CATEGORY
            if($_POST['cat_action'] == 'delete'){
                $id = addslashes($_POST['id']);

                echo $categories->delete_cat($id);
                exit;
            }

            if($_POST['cat_action'] == 'list_all'){

                echo $categories->home_cat_list();
                exit;
            }
        }

        if(!empty($_POST['key_action']) && isset($_POST['key_action'])){
            //ADD NEW KEYWORD
            if($_POST['key_action'] == 'add_key'){
                $name = addslashes($_POST['name']);
                $category_id = addslashes($_POST['category_id']);
                $data_cadastro = date("Y-m-d H:i:s");
                $user_id = $_SESSION['lgUser'];

                echo $keywords->add_keyword($name, $category_id, $data_cadastro, $user_id);
                exit;
            }
            //LIST ALL CATEGORIES
            if($_POST['key_action'] == 'list_cat'){

                echo $keywords->list_cats();
                exit;
            }
            //LIST ALL ADDED KEYWORDS
            if($_POST['key_action'] == 'list_keys'){

                echo $keywords->list_keys();
                exit;
            }

            if($_POST['key_action'] == 'delete_key'){

                $id = addslashes($_POST['id']);

                echo $keywords->delete_key($id);
                exit;
            }
        }

        $data['categories'] = $categories->list_all_cats();
        $this->loadTemplate('home', $data);
    }
}