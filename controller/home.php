<?php 

  class home extends Controller{

    function index($a=''){
    
      $load=$this->loadModel('postModel');
      $data=$load->getAllPost();
        $this->view('home',$data);


    }
}

?>