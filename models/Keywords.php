<?php
class Keywords extends Model {

    public function list_cats(){
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $list_cats = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '
            <option value="">Selecione...</option>
        ';
        foreach($list_cats as $list){
            $data .='
                <option value="'.$list['id'].'">'.$list['name'].'</option>
            ';
        }        

        return $data;
    }

    public function add_keyword($name, $category_id, $data_cadastro, $user_id){
        $sql = $this->db->prepare("INSERT INTO keywords SET name = :name, category_id = :category_id, data_cadastro = :data_cadastro, user_id = :user_id");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":category_id", $category_id);
        $sql->bindValue(":data_cadastro", $data_cadastro);
        $sql->bindValue(":user_id", $user_id);
        $sql->execute();

        $sql = $this->db->prepare("SELECT * FROM keywords");
        $sql->execute();

        if($sql->rowCount() > 0){
            $keywords = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data ='';
        foreach($keywords as $key){
            $data .= '
            <input type="text" class="input_key_show" value="'.$key['name'].'" readonly><div class="input_key_show_delete" onclick="delete_key('.$key['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function list_keys(){
        $sql = $this->db->prepare("SELECT * FROM keywords");
        $sql->execute();

        if($sql->rowCount() > 0){
            $keywords = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data ='';
        foreach($keywords as $key){
            $data .= '
            <input type="text" class="input_key_show" value="'.$key['name'].'" readonly><div class="input_key_show_delete" onclick="delete_key('.$key['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function delete_key($id){
        $sql = $this->db->prepare("DELETE FROM keywords WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = $this->db->prepare("SELECT * FROM keywords");
        $sql->execute();

        if($sql->rowCount() > 0){
            $keywords = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data ='';
        foreach($keywords as $key){
            $data .= '
            <input type="text" class="input_key_show" value="'.$key['name'].'" readonly><div class="input_key_show_delete" onclick="delete_key('.$key['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

}