
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



</script>
