<?php
$model=$this->loadModel('siteModel');
$data=$model->getSiteAyar();


?>
	    <footer class="footer text-center py-5 theme-bg-dark">
		   
           <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
               <small class="copyright"><?php echo $data['site_footer'] ?>  <i class="fas fa-copyright" ></i>
          
       </footer>
   
   </div><!--//main-wrapper-->

</body>
</html> 

