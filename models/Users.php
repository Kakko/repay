<?php
class Users extends Model {

    private $userInfo; //KEEP INFO FROM LOGGED USER

    //VERIFY IF THE USER IS LOGGED
    public function isLogged(){
        if(isset($_SESSION['lgUser']) && !empty($_SESSION['lgUser'])){
            return true;
        } else {
            return false;
        }
    }

    //USER LOGIN
    public function doLogin($email, $password){
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password AND status = 'Ativo'");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":password", md5($password));
        $sql->execute();

        if($sql->rowCount() > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['lgUser'] = $row['id'];
            return true;
        } else {
            return false;
        }
    }

    //USER LOGOUT
    public function logout() {
        session_destroy();
    }

    //FETCH INFORMATIONS FROM LOGGED USER
    public function setLoggedUser() {
        if(isset($_SESSION['lgUser']) && !empty($_SESSION['lgUser'])){
            $id = $_SESSION['lgUser'];

            $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $this->userInfo = $sql->fetch(PDO::FETCH_ASSOC);
            }
        }
    }

    //SEARCH FOR THE NAME FROM THE LOGGED USER
    public function getName(){
        $this->setLoggedUser(); //"THIS" IS USED HERE BECAUSE THE FUNCTION IS AT THE SAME MODEL
        if(isset($this->userInfo['name'])){ // FETCH THE DATA FROM THE PRIVATE VAR SET ON THE BEGGINING OF THIS MODEL, FEEDED FOR THE FUNCTION setLogged User;
            return $this->userInfo['name']; 
        } else {
            return 'Não tem Nome';
        }
    }

    public function infoLoggedUser($id) { // SENT THE INFORMATION TO THE AJAX ON THE EDIT_USER MODEL;
        $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return json_encode($info);
    }

    public function add_new_user($name, $email, $password, $type, $status, $data_cadastro){ //ADD NEW USER

        $sql = $this->db->prepare("INSERT INTO users SET name = :name, email = :email, password = :password, type = :type, status = :status, data_cadastro = :data_cadastro");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":password", $password);
        $sql->bindValue(":type", $type);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":data_cadastro", $data_cadastro);
        $sql->execute();
    }

    public function list_add_users(){
        $sql = $this->db->prepare("SELECT * FROM users");
        $sql->execute();

        if($sql->rowCount() > 0){
            $added_users = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $users = '';
        foreach($added_users as $add){
            if($add['type'] == 'admin'){
                $users .='
                <div class="listed_users" style="background-color: #b5ffb3">
                    <span>'.$add['name'].'</span>
                </div>';
            } else {
                $users .='
                <div class="listed_users" style="background-color: lightblue">
                    <span>'.$add['name'].'</span>
                </div>';
            }
        }
        return $users;
    }

    public function edit_user($id, $user_name, $user_email, $user_password) { //UPDATE LOGGED USER

        if(!empty($user_password)){ //IF THE LOGGED USER SET A NEW PASSWORD
            $sql = $this->db->prepare("UPDATE users SET name = :user_name, email = :user_email, password = :user_password WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":user_name", $user_name);
            $sql->bindValue(":user_email", $user_email);
            $sql->bindValue(":user_password", $user_password);
            $sql->execute();
        } else { // IF THE LOGGED USER DIDN'T SET A NEW PASSWORD
            $sql = $this->db->prepare("UPDATE users SET name = :user_name, email = :user_email WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":user_name", $user_name);
            $sql->bindValue(":user_email", $user_email);
            $sql->execute();
        }
    }






}