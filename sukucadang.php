<?php

require_once 'db.php';

class suku_cadanang extends db{

    function show(){
        $data = $this->db->prepare("SELECT * FROM suku_cadanag");

        try{
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e){
            print_r($e->getMessage());
        }

        return $result;
    }
    
    
    function store($id_suku_cadang, $nama_suku_cadang, $hrga_satuan){
        $data = $this->db->prepare("INSERT INTO suku_cadanag (id_suku_cadang, nama_suku_cadang, hrga_satuan) VALUES (?, ?, ?)");
        
        $data->bindParam(1, $id_suku_cadang);
        $data->bindParam(2, $nama_suku_cadang);
        $data->bindParam(3, $hrga_satuan);
        
        try {
            $result = $data->execute();
        }
        catch (PDOException $e){
            print_r($e->getMessage());
        }
        return $result;
    }

    function update($id_suku_cadang, $nama_suku_cadang, $hrga_satuan) {
        $data = $this->db->prepare("UPDATE suku_cadanag
        SET id_suku_cadang = '$id_suku_cadang', 
        nama_suku_cadang = '$nama_suku_cadang',
        hrga_satuan = '$hrga_satuan'
        WHERE id_suku_cadang = '$id_suku_cadang'");

        try {
            $result = $data->execute();
            } 
        catch(PDOException $e){
            print_r($e->getMessage());
            }
            
        return $result;
    }

    function delete($id_suku_cadang){
        $data = $this->db->prepare("DELETE FROM suku_cadanag
                                    WHERE id_suku_cadang= '$id_suku_cadang'");
        try {
            $result = $data->execute();
            } 
            catch(PDOException $e){
            print_r($e->getMessage());
            }
            
        return $result;
    }

    function total(){
        $data = $this->db->prepare("SELECT total() as hrga_satuan LIMIT 1");

        try {
            $data->execute();
            $result = $data->fetchColumn();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }

}
?>