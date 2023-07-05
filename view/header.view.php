

<?php

$model=$this->loadModel('siteModel');
  $data=$model->getSiteAyar();
  $stm=$model->getAbout();
  


?>
<!DOCTYPE html>
<html lang="en"> 
<head>


    <title><?php echo $data['site_title'] ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $data['site_desc'] ?>">
	<meta name="keywords" content="<?php echo $data['site_key'] ?>">
	<meta name="author" content="<?php echo $data['site_name'] ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo ASSETS."/uploads/".$data['site_icon'] ?>">

    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="<?php // echo $data['site_icon'] ?>"> 
       <!-- Javascript -->          
   <script src="<?php echo ASSETS ?>/plugins/jquery-3.3.1.min.js"></script>
   <script src="<?php echo ASSETS ?>/plugins/popper.min.js"></script> 
   <script src="<?php echo ASSETS ?>/plugins/bootstrap/js/bootstrap.min.js"></script> 

   <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
   <script src="<?php echo ASSETS ?>/js/demo/style-switcher.js"></script>     
   

    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo ASSETS ?>/css/theme-1.css">

	

</head> 

<body>
    
    <header class="header text-center" >	    
	    <h1 class="blog-name pt-lg-4 mb-0"><a href="<?php echo $data['site_url'] ?>"><?php echo $data['site_name'] ?></a></h1>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<div class="profile-section pt-3 pt-lg-0">
				    <img class="profile-image mb-3 rounded-circle mx-auto" src="<?php echo ASSETS."/uploads/".$stm["about_image"] ?>" alt="image" >			
					
					<div class="bio mb-3"><?php echo $stm['about_desc'] ?><a href="about">Daha Fazlası için</a></div><!--//bio-->
					<ul class="social-list list-inline py-3 mx-auto">
			            <li class="list-inline-item"><a href="<?php echo $stm['about_twitter'] ?>"><i class="fab fa-twitter fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="<?php echo $stm['about_instagram'] ?>"><i class="fab fa-instagram fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="<?php echo $stm['about_linkedin'] ?>"><i class="fab fa-linkedin"></i></a></li>
			            <li class="list-inline-item"><a href="<?php echo $stm['about_github'] ?>"><i class="fab fa-github"></i></a></li>

			        </ul><!--//social-list-->
			        <hr> 
				</div><!--//profile-section-->
				
				<ul class="navbar-nav flex-column text-left">
					<li class="nav-item">
					    <a class="nav-link" href="<?php echo $data['site_url'] ?>"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
					</li>
				
					<li class="nav-item">
					    <a class="nav-link" href="<?php echo ROOT ?>about"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li>
				</ul>
			</div>
		</nav>
    </header>
	