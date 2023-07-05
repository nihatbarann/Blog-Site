<?php if(!isset($_SESSION['username']) && !isset($_SESSION['name'])) 
{
  header("Location:".ADMIN."/login");
  die();

}
?>
<?php $this->view('admin/header') ?>
<div id="page-wrapper">

<div>

<center><h1>Yonetim Paneli</h1></center>
<hr>
</div>

  <!-- map -->
<link href="<?php echo ASSETS ?>/admin/css/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.js"></script>
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.world.js" type="text/javascript"></script>
<script type="text/javascript">
 
</script>
<!-- //map -->
</div>
<?php $this->view('admin/footer') ?>
