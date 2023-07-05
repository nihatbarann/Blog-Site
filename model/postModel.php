<?php 
class postModel{

function getOnePost($a){

     $db=new database();
     $query="SELECT * from posts where post_seo_url=? and durum=1";
     $stm=$db->read($query,[$a]);
     if($stm){
        return $stm;
     }
     else{
        return false;
     }

}
function getAllPost(){

   
   $db=new database();
   $query="SELECT * from posts WHERE durum=1";
   $stm=$db->Allread($query);
   if($stm){
      return $stm;
   }
   else{
      return false;
   }
}

}



?>