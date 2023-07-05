<?php

class siteModel{

    function getSiteAyar (){

        $db=new database();
        $query="SELECT * from siteayar limit 1";
        $data=$db->read($query);
        if($db){
            return $data;
        }
        return false;
}
function getAbout (){
    
    $db=new database();
    $query="SELECT * from about limit 1";
    $data=$db->read($query);
    if($db){
        return $data;
    }
    return false;
}



}



?>