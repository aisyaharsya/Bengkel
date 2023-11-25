<?php

require_once 'db.php';

class nota_suku_cadang extends db{

    function show(){
        $data = $this->db->prepare("SELECT * FROM nota_suku_cadang");

        try{
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e){
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($no_nota_suku_cadang, $tgl_nota_suku_cadang){
        $data = $this->db->prepare("INSERT INTO nota_suku_cadang (no_nota_suku_cadang, tgl_nota_suku_cadang) VALUES (?, ?)");
        
        $data->bindParam(1, $no_nota_suku_cadang);
        $data->bindParam(2, $tgl_nota_suku_cadang);
        
        try {
            $result = $data->execute();
        }
        catch (PDOException $e){
            print_r($e->getMessage());
        }
        return $result;
    }

    function update($no_nota_suku_cadang, $tgl_nota_suku_cadang) {
        $data = $this->db->prepare("UPDATE nota_suku_cadang
        SET no_nota_suku_cadang = '$no_nota_suku_cadang', 
        tgl_nota_suku_cadang = '$tgl_nota_suku_cadang'
        WHERE no_nota_suku_cadang = '$no_nota_suku_cadang'");

        try {
            $result = $data->execute();
            } 
        catch(PDOException $e){
            print_r($e->getMessage());
            }
            
        return $result;
    }

    function delete($no_nota_suku_cadang){
        $data = $this->db->prepare("DELETE FROM nota_suku_cadang
                                    WHERE no_nota_suku_cadang= '$no_nota_suku_cadang'");
        try {
            $result = $data->execute();
            } 
            catch(PDOException $e){
            print_r($e->getMessage());
            }
            
        return $result;
    }
    
}
?>