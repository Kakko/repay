<?php
class Categories extends Model {


    public function add_new_cat($name, $data_cadastro){ //ADD NEW CATEGORY
        $sql = $this->db->prepare("INSERT INTO categories SET name = :name, data_cadastro = :data_cadastro");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":data_cadastro", $data_cadastro);
        $sql->execute();

        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '';
        foreach($categories as $cat){
            $data .= '
            <input type="text" class="input_cat_show" data_id="'.$cat['id'].'" value="'.$cat['name'].'" ondblclick="rename('.$cat['id'].', this)" readonly><div class="input_cat_show_delete" onclick="delete_cat('.$cat['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function listCats(){ //LIST ALL CATEGORIES TO FILL AN AJAX REQUEST WHERE ALL CATEGORIES HAS TO BE SHOWN
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '';
        foreach($categories as $cat){
            $data .= '
                <input type="text" class="input_cat_show" data_id="'.$cat['id'].'" value="'.$cat['name'].'" ondblclick="rename('.$cat['id'].', this)" readonly><div class="input_cat_show_delete" onclick="delete_cat('.$cat['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function edit_cat($id, $name){ //EDIT A CATEGORY
        $sql = $this->db->prepare("UPDATE categories SET name = :name WHERE id = :id");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '';
        foreach($categories as $cat){
            $data .= '
            <input type="text" class="input_cat_show" data_id="'.$cat['id'].'" value="'.$cat['name'].'" ondblclick="rename('.$cat['id'].', this)" readonly><div class="input_cat_show_delete" onclick="delete_cat('.$cat['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function delete_cat($id){ //DELETE A CATEGORY
        $sql = $this->db->prepare("DELETE FROM categories WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '';
        foreach($categories as $cat){
            $data .= '
            <input type="text" class="input_cat_show" data_id="'.$cat['id'].'" value="'.$cat['name'].'" ondblclick="rename('.$cat['id'].', this)" readonly><div class="input_cat_show_delete" onclick="delete_cat('.$cat['id'].')"><img src="'.BASE_URL.'assets/images/icons/close_icon.svg"></div>
            ';
        }

        return $data;
    }

    public function list_all_cats(){
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        } 
        return $categories;
    }

    public function home_cat_list(){
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();

        if($sql->rowCount() > 0){
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        } 

        $data_list ='';
        foreach($categories as $cat){
            $data_list .='
                <li>'.$cat['name'].'</li>
            ';
        }

        return $data_list;
    }
}