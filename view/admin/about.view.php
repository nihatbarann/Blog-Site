<?php if(!isset($_SESSION['username']) && !isset($_SESSION['name'])) 
{
  header("Location:".ADMIN."/login");
  die();

}
?>

<?php $this->view('admin/header')?> 

<div id="page-wrapper">
<div class="col-md-12 graphs">
	   <div class="xs">
      <?php 
      if(isset($_SESSION['Error'])){
        echo alertMessage($_SESSION['Error'],'success'); 
      }
      ?>
  	    <div class="well1 white">
        <form action="" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" enctype="multipart/form-data">
          <fieldset>
          <div class="form-group">
              <label class="control-label">Hakkımda İsim</label>
              <input type="text" name="about-name" class="form-control1 ng-invalid ng-invalid-required ng-touched" required="" value="<?php echo $data['about_name'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Hakkımda Açıklama</label>
              <input type="text" name="about-desc" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required value="<?php echo $data['about_desc'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Hakkımda Resim</label>
              <div class="form-group"><img src="<?php echo ASSETS."/uploads/" ?><?php echo $data['about_image'] ?>" alt="" height="50" width="50">
              <input type="file" name="about-image" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched"  value="<?php echo $data['about_image'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Hakkımda İnstagram Url</label>
              <input type="text" name="about-instagram" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required value="<?php echo $data['about_instagram'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Hakkımda Twitter Url</label>
              <input type="text" name="about-twitter" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched"required placeholder=""value="<?php echo $data['about_twitter'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Hakkımda Github Url</label>
              <input type="text" name="about-github" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched"  required value="<?php echo $data['about_github'] ?>">

            <div class="form-group">
              <label class="control-label">Hakkımda linkedin Url</label>
              <input type="text" name="about-linkedin" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched"  required value="<?php echo $data['about_linkedin'] ?>">
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