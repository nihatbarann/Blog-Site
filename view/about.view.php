

<?php $this->view('header'); ?>

    <div class="main-wrapper">
	    	    
	    <article class="about-section py-5">
		    <div class="container">
			    <h2 class="title mb-3"><?php echo $data['about_name'] ?></h2>

				
			
			    <p><?php echo $data['about_desc'] ?></p>
			    <img class="img-fluid" src="<?php echo ASSETS."/uploads/".$data["about_image"];?>" alt="image">
			  
		    </div>
	    </article><!--//about-section-->
	    
	   
		<?php  $this->view('footer'); ?>
