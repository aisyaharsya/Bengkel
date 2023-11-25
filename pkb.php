<?php

require_once 'db.php';

class pkb extends db{

    function show(){
        $data = $this->db->prepare("SELECT * FROM pkb");

        try{
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e){
            print_r($e->getMessage());
        }

        return $result;
    }
    
}
?>