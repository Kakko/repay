<?php
class Logs extends Model {

    public function registrarlogin($log, $user_ip, $data_cadastro, $user_id){
        $sql = $this->db->prepare("INSERT INTO log SET log = :log, user_ip = :user_ip, data_cadastro = :data_cadastro, users_id = :user_id");
        $sql->bindValue(":log", $log);
        $sql->bindValue(":user_ip", $user_ip);
        $sql->bindValue(":data_cadastro", $data_cadastro);
        $sql->bindValue(":user_id", $user_id);
        $sql->execute();

    }

    public function log_acesso($log, $user_ip, $data_cadastro, $user_id){
        $sql = $this->db->prepare("INSERT INTO log SET log = :log, user_ip = :user_ip, data_cadastro = :data_cadastro, users_id = :user_id");
        $sql->bindValue(":log", $log);
        $sql->bindValue(":user_ip", $user_ip);
        $sql->bindValue(":data_cadastro", $data_cadastro);
        $sql->bindValue(":user_id", $user_id);
        $sql->execute();
    }
}