<?php
class aboutModel {



    function getAbout(){
        $db = new database();
        $query="SELECT * from about limit 1";
        $cek=$db->read($query);

        if($cek){
            return $cek;

        }
        else{
            return "hata";
        }
}


function aboutEdit($post,$file){

    $db = new database();
$aboutName=htmlspecialchars($_POST['about-name']);
$aboutDesc=htmlspecialchars($_POST['about-desc']);
$aboutInsta=htmlspecialchars($_POST['about-instagram']);
$aboutTwit=htmlspecialchars($_POST['about-twitter']);
$aboutGit=htmlspecialchars($_POST['about-github']);
$aboutLinkedin=htmlspecialchars($_POST['about-linkedin']);
$imageName=$file;
$data=[$aboutDesc,$aboutName,$imageName,$aboutInsta,$aboutTwit,$aboutGit,$aboutLinkedin];
$query="UPDATE about SET about_desc=? ,about_name=? ,about_image=? ,about_instagram=? ,about_twitter=? ,about_linkedin=? ,about_github=?
 WHERE id=1";
$stm=$db->write($query,$data);

if($stm)
{

   return true;
}
else{
    $_SESSION['Error']="Bir Hata Oluştu Lütfen Tekrar Deneyiniz";
    return false;
}

}




}


?>