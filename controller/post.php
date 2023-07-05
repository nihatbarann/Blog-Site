<?php 

  class Post extends Controller{

    function index($a=''){      
          $load=$this->loadModel('postModel');
         $data=$load->getOnePost($a);
        if($data){
          $this->view('blog-post',$data);

        }
        else{
        
          $data=$load->getAllPost();
          $this->view('home',$data);

        }


    }
}

?>