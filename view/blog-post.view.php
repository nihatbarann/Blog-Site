<?php 
$this->view('header'); ?>

    <div class="main-wrapper">
	    
	    <article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
			    <header class="blog-post-header">
				    <h2 class="title mb-2"><?php echo $data['post_title']; ?></h2>
				    <div class="meta mb-3"><span class="date"><?php echo $data['post_create_date']; ?></span><span class="time"><?php echo $data['post_send_name']; ?></span><span class="time">5 min read</span></div>
			    </header>
				<img class="img-fluid" src="<?php echo ASSETS."/uploads/".$data['post_img'] ?>" alt="image" width="400" >
				  <p><?php echo $data['post_desc']; ?></p>
				    <div class="embed-responsive embed-responsive-16by9">
					</div>
				   
			    </div>
				
		    </div><!--//container-->
	    </article>
	    
	   
		<?php  $this->view('footer'); ?>