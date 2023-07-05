<?php

class database{

   public function db_connect(){
            try {
                $db=NEW PDO("mysql:host=localhost;dbname=".DBNAME.";charset=utf8;",USERNAME,PASSWORD);
                return $db;
            } catch (PDOException $th) {
                Echo $th;
            }
    }
    public function read($query,$data=[]){
        $db=$this->db_connect();
       $stm=$db->prepare($query);
        if($data != ""){
         $stm->execute($data);
        }
        else{
        $stm->execute();
         }
         $data=$stm->fetch(PDO::FETCH_ASSOC);    
        if($data){
            return $data;
        }
        else{
            return false;
        }
        

    }
    public function Allread($query,$data=""){
        $db=$this->db_connect();
       $stm=$db->prepare($query);
        if($data != ""){
         $stm->execute($data);
        }
        else{
        $stm->execute();
         }
         $data=$stm->fetchAll(PDO::FETCH_ASSOC);    
        if($data){
            return $data;
        }
        else{
            return false;
        }
        

    }
    public function write($query,$data){
        $db=$this->db_connect();
        $stm=$db->prepare($query);
        $stm->execute($data);
         
         if($stm){
            return true;
        }
         else{
             return false;
         }
         

    }
}


?>