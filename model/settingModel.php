<?php 

class settingModel extends Controller{


public function settingEdit($post,$files){

    $db = new database();
$siteTitle=htmlspecialchars($post['site-title']);
$siteDesc=htmlspecialchars($post['site-desc']);
$siteUrl=htmlspecialchars($post['site-url']);
$siteName=htmlspecialchars($post['site-name']);
$siteKey=htmlspecialchars($post['site-key']);
$siteFooter=htmlspecialchars($post['site-footer']);
$fileName=$files;

$data=[$siteTitle,$siteDesc,$siteUrl,$fileName,$siteKey,$siteFooter,$siteName];

$query="UPDATE siteayar SET site_title=? ,site_desc=? ,site_url=? ,site_icon=? ,site_key=? ,site_footer=? ,site_name=?
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