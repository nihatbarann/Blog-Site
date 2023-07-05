<?php if(!isset($_SESSION['username']) && !isset($_SESSION['name'])) 
{
  header("Location:".ADMIN."/login");
  die();

}
?>
<?php $this->view('admin/header') ?>

<div id="page-wrapper">
<div class="panel panel-primary">
			<div class="panel-heading">
				<button type="" class="btn btn-primary" data-target="#AddPost" data-toggle="modal">Post Ekle</button>
			</div>
				<div class="panel-body no-padding" style="display: block;" id="displayPostTable">
			
				</div>




					
	<div class="modal fade" id="AddPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Ekle</h5>
      </div>
      <div class="modal-body">
	  <form id="settings" name="settings-form" enctype="multipart/form-data" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
          <fieldset>
          <div class="form-group">
              <label class="control-label">Post Başlık</label>
              <input  type="text" name="site-name" class="form-control1 ng-invalid ng-invalid-required ng-touched" required="">
            </div>
            <div class="form-group">
              <label class="control-label">Post Resim</label>
              <input type="file" name="site-desc" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched"  required="">
            </div>
            <div class="form-group">
              <label class="control-label">Post Açıklama</label>
                  <textarea   name="site-title" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="" cols="30" rows="10"></textarea>
            </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>



					
				
<!-- Modal -->
<div class="modal fade" id="PostUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Güncelle</h5>
      </div>
      <div class="modal-body">
	  <form id="settings" name="settings-form" enctype="multipart/form-data" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
          <fieldset>
          <div class="form-group">
              <label class="control-label">Post Başlık</label>
              <input  type="text" name="site-name" class="form-control1 ng-invalid ng-invalid-required ng-touched" required="">
            </div>
            <div class="form-group">
              <label class="control-label">Post Resim</label>
              <input type="file" name="site-title" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="">
            </div>
            <div class="form-group">
              <label class="control-label">Post Durum</label>
              <select class="form-control1" name="" id="">
                <option value="1" >Göster</option>
                <option value="0">Gizle</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Post Açıklama</label>
              <textarea   name="site-title" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="" cols="30" rows="10"></textarea>
            </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

$(document).ready(function(){


  displayPost();
});

function displayPost() {
    var action = 'displayPost';

    $.ajax({
      type: 'post',
      data: { action: action },
      url: " <?php echo ROOT . 'core/ajax.php'; ?>",
      success: function (response) {
        $('#displayPostTable').empty();
        $('#displayPostTable').html(response);



      }
    });
  }




function postDelete(id) {

var id = id;
var action = 'postDelete';

$.ajax({
  type: 'post',
  data: { id: id, action: action },
  url: " <?php echo ROOT . 'core/ajax.php'; ?>",
  success: function (response) {
    swal("Kayıt Başarı ile silindi!", response, "success");
    displayPost();

  }
});

}


</script>
<!-- //map -->
</div>

<?php $this->view('admin/footer') ?>
