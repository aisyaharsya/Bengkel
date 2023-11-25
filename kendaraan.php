<?php

require_once 'db.php';

class kendaraan extends db{

    function show(){
        $data = $this->db->prepare("SELECT * FROM kendaraan");

        try{
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e){
            print_r($e->getMessage());
        }

        return $result;
    }

    function joinPemilik(){
        $data = $this->db->prepare("SELECT * FROM kendaraan k join pemilik p
                                    ON k.id_pemilik = p.id_pemilik");
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