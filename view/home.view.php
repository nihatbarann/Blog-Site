<?php // $this->view('header');
    $this->view('header');


?>
    <div class="main-wrapper">
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
                    <div class="form-group">
                        <input type="text" id="search" name="search" class="form-control " placeholder="Search Post">
                    </div>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container" id="postsView">
				<?php if($data){ ?>	
				<?php foreach ($data as $key) { ?>
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="<?php echo ASSETS."/uploads/".$key['post_img'] ?>" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="<?php echo ROOT ?>post/<?php echo $key['post_seo_url'] ?>"><?php echo $key['post_title'] ?></a></h3>
						    <div class="meta mb-1"><span class="date"><?php echo $key['post_create_date'] ?></span><span class="time"><?php echo $key['post_send_name'] ?></span><span class="time">5 min read</span></div>
						    <div class="intro"><?php echo $key['post_desc'] ?></div>
						    <a class="more-link" href="<?php echo ROOT ?>post/<?php echo $key['post_seo_url'] ?>">Daha fazlası &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
						<?php  } 
							 } 
							else {
							echo '<h2> Post Bulunamadı... </h2>';
								 }?>
								
			    
		    </div>
	    </section>
		<script type="text/javascript">

					$(document).ready(function(){
					
					$("#search").keyup(function(e){
						var action='search';
						var query=$(this).val();
					
						$.ajax({
       					  url: "<?php echo ROOT.'core/ajax.php';  ?>",
         				  type:'post',
        				  data:{query:query,action:action},
        				  success:function(response){
						
							$('#postsView').html(response);
							
          }
        }); 

					
					})
					})
</script>
	
		<?php // $this->view('footer');
	        $this->view('footer');
		?>