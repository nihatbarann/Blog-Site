<?php if (!isset($_SESSION['username']) && !isset($_SESSION['name'])) {
  header("Location:" . ADMIN . "/login");
  die();

}
?>
<?php $this->view('admin/header') ?>
<div id="page-wrapper">
  <div class="panel panel-primary">
    <div class="panel-heading ">
      <button type="button" class="btn btn-primary" id="asdsa" data-toggle="modal" data-target="#users_Add">Kullanıcı
        Ekle</button>
    </div>
    <div class="panel-body no-padding" style="display: block;">

      <div id="displayUserDiv" class="panel-body no-padding" style="display: block;">
      </div>
      <div class="modal fade" id="users_Add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Ekle</h5>
            </div>

            <div class="modal-body">
              <form id="user_add_form" action="" method="post" name="users-form" enctype="multipart/form-data"
                class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
                <div class="form-group">
                  <label class="control-label">Kullanıcı Adı</label>
                  <input type="text" name="user_name" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                    required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Kullanıcı Email </label>
                  <input type="text" name="user_mail" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                    required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Kullanıcı Parola</label>
                  <input type="text" name="user_passwd"
                    class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" required="">

                </div>


            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">İptal</button>
              <button type="reset" class="btn btn-secondary">Temizle</button>
              <button type="" id="user_add" class="btn btn-primary">Kaydet</button>
            </div>
            </form>
          </div>

        </div>
      </div>





      <!-- Modal -->
      <div class="modal fade" id="users_Edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Düzenle</h5>
            </div>
            <div class="modal-body">
              <form id="user_edit" name="settings-form" enctype="multipart/form-data"
                class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern">
                <div class="form-group">
                  <label class="control-label">Kullanıcı Adı</label>
                  <input type="text" name="user-name-edit" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                    required="" value="">
                </div>
                <div class="form-group">
                  <label class="control-label">Kullanıcı Mail</label>
                  <input type="text" name="user-mail-edit" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                    required="" value="">
                </div>
                <div class="form-group">
                  <label class="control-label">Kullanıcı Parola</label>
                  <input type="text" name="user-passwd-edit"
                    class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" required=""
                    value="">

                </div>
                <div class="form-group">
                  <label class="control-label">Admin Durum</label>
                  <select name="user-status-edit"  class="form-control1">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">İptal</button>
            <button type="submit" class="btn btn-primary" id="userModalEdit">Kaydet</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- map -->
<link href="<?php echo ASSETS ?>/admin/css/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.js"></script>
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo ASSETS ?>/admin/js/jquery.vmap.world.js" type="text/javascript"></script>
<script>


  $(document).ready(function () {

    displayUser();
    // setInterval(displayUser);


    $('#user_add').click(function (e) {
     
      e.preventDefault();
      var formdata = $('#user_add_form').serialize() + '&action=' + 'useradd';
      $.ajax({


        type: 'post',
        data: formdata,
        url: " <?php echo ROOT . 'core/ajax.php'; ?>",
        success: function (response) {
          $('#users_Add').modal('hide');
          if(response=="Başarılı"){
            swal("Başarılı!", "Kayıt Başarı ile Eklendi", "success");
          }
          if(response=="Hata"){
            swal("Hata!", "Kayıt eklenirken Hata oluştu", "warning");
          }
          if(response=="required"){
            swal("Hata!", "Lütfen Tüm alanları doldurunuz", "warning");
          }
          displayUser();
          $("#user_add_form").trigger("reset");

        }

      });

    });

  });


  function displayUser() {
    var action = 'displayUser';

    $.ajax({
      type: 'post',
      data: { action: action },
      url: " <?php echo ROOT . 'core/ajax.php'; ?>",
      success: function (response) {
        $('#displayUserDiv').empty();
        $('#displayUserDiv').html(response);



      }
    });
  }




  function userDelete(id) {

    var id = id;
    var action = 'userDelete';

    $.ajax({
      type: 'post',
      data: { id: id, action: action },
      url: " <?php echo ROOT . 'core/ajax.php'; ?>",
      success: function (response) {
        swal("Kayıt Başarı ile silindi!", response, "success");
        displayUser();

      }
    });

  }


  function userEdit(id){

  $('#userModalEdit').click(function(){
      var data=$('#user_edit').serialize() + "&action=" + "userEdit"  +"&id=" + id;
   $.ajax({
      type: 'post',
      data:data,
      url: " <?php echo ROOT . 'core/ajax.php'; ?>",
      success: function (response) {
        if(response=="Başarılı"){
       swal(response,"Kayıt Başarı ile Güncellendi!", "success");
        }
        if(response=="Boş"){
       swal(response,"Lütfen Tüm alanları doldurunuz!", "warning");
        }
        if(response=="Başarısız"){
       swal(response,"Bir Hata oluştu Lütfen Tekrar Deneyiniz.!", "danger");
        }
       displayUser();

      }
    });
    $('#users_Edit').modal('hide');

  });

  }



</script>

<?php $this->view('admin/footer') ?>