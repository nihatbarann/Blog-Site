<?php if(!isset($_SESSION['username']) && !isset($_SESSION['name'])) 
{
  header("Location:".ADMIN."/login");
  die();

}
?>
<?php $this->view('admin/header') ?>

<div id="page-wrapper">
<div class="col-md-12 graphs">
	   <div class="xs">

     <?php 
      if(isset($_SESSION['Error'])){
        echo alertMessage($_SESSION['Error'],'success'); 
      }
      ?>
  	    <div class="well1 white">
        <form id="settings" action="" method="POST" name="settings-form" enctype="multipart/form-data" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
          <fieldset>
          <div class="form-group">
              <label class="control-label">Site Adı</label>
              <input  type="text" name="site-name" class="form-control1 ng-invalid ng-invalid-required ng-touched"  value="<?php echo $data['site_name'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Site Başlık</label>
              <input type="text" name="site-title" class="form-control1 ng-invalid ng-invalid-required ng-touched"  value="<?php echo $data['site_title'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Site Açıklama</label>
              <input type="text" name="site-desc" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" value="<?php echo $data['site_desc'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Site Url Adres</label>
              <input type="text" name="site-url" class="form-control1 ng-invalid ng-invalid-required ng-touched"   value="<?php echo $data['site_url'] ?>">
            </div>
          
            <div class="form-group">
              <label class="control-label">Site İcon</label>
              <div class="form-group"><img src="<?php echo ASSETS."/uploads/" ?><?php echo $data['site_icon'] ?>" alt="" height="50" width="50">
              </div>
              <input type="file" id="files" name="site-icon" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" placeholder="">
            </div>
            <div class="form-group">
              <label class="control-label">Site Anahtar Kelimeler</label>
              <input type="text" name="site-key" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched"   value="<?php echo $data['site_key'] ?>">

            <div class="form-group">
              <label class="control-label">Site Alt bölüm</label>
              <input type="text" name="site-footer" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched"   value="<?php echo $data['site_footer'] ?>">
            </div>
           
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Düzenle</button>
              <button type="reset" class="btn btn-danger">iptal</button>

            </div>
          </fieldset>
        </form>
      </div>
    </div>
   
   </div>
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

<?php $this->view('admin/footer');
unset($_SESSION['Error']);
?>