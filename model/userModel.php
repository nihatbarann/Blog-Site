<?php


class userModel{



function checkLogin(){
   @$_SESSION['error'];
   $db=new database();

if(isset($_POST['username']) && isset($_POST['passwd'])){

$username=$_POST['username'];
$passwd=md5($_POST['passwd']);
$data=[$username,$passwd];
$query="SELECT * from user WHERE email=? and passwd=? and durum=1";
$stm=$db->Allread($query,$data);

if($stm>0){
$_SESSION['email']=$stm[0]['email'];
$_SESSION['name']=$stm[0]['name'];

header("Location:".ADMIN);
die();
}
else {
$_SESSION['error']="Kullanıcı Adı ve Parola Hatalı";
return false;
}
}
}


function logout(){

   session_start();
   session_unset();
   session_destroy();
   header("location:login");
}


public function isLoggedIn()
{
    // Oturum durumu kontrol ediliyor
    session_start();
    return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
}


}
?>