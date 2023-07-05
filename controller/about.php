<?php 

  class about extends Controller{

    function index(){
      $stm=$this->loadModel('aboutModel');
        $data=$stm->getAbout();
        $this->view('about',$data);


    }
}

?>