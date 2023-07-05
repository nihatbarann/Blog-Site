<?php
class app{
    private $class="home";
    private $method="index";
    private $param=[];
   public function __construct(){
        $url=$this->splitUrl();
        if(file_exists("./controller/$url[0].php")){    
                    $this->class=$url[0];
                    unset($url[0]);
                }
      require ("./controller/$this->class.php");
        $this->class = new $this->class;
        if(isset($url[1])){

                    if(method_exists($this->class,$url[1])){
                            $this->method=$url[1];
                            unset($url[1]);
                    }
        }   
          if(is_array($url)){
            $this->param=(array_values($url));
          } 
        call_user_func_array([$this->class,$this->method],$this->param);

    }
function splitUrl(){

    if(isset($_GET['url'])){
        $url=explode("/",trim($_GET['url'],"/"));
    
        return $url;
        }
        return 'home';
               
}
}
?>