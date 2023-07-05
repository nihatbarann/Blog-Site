
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
 <!-- Bootstrap Core CSS -->
<link href="<?php echo ASSETS ?>/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo ASSETS ?>/admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo ASSETS ?>/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?php echo ASSETS ?>/admin/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo ASSETS ?>/admin/js/bootstrap.min.js"></script>
</head>
<body id="login" >
  <div class="login-logo">
    <a href="<?php echo ROOT ?>home"><img src="<?php echo ASSETS ?>/admin/images/logo.png" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	  <form method="post">
  <?php  if(isset($_SESSION['error'])&& $_SESSION['error']!='' ){ 
   echo alertMessage($_SESSION['error'],'danger');
  }
    ?>
		<input type="text" class="text" value="" name="username" required  placeholder="Kullanıcı Adınızı Giriniz." >
		<input type="password" name="passwd" value=""  required placeholder="Parola" >
		<div class="submit"><input type="submit"></div>
	</form>
  </div>
</body>
</html>
<?php 
unset($_SESSION['error']);
?>
