<?php

class Controller{
public function view($page,$data=[]){
            if(file_exists("./view/".$page.".view.php")){
                return require_once("./view/".$page.".view.php"); 
            }
            else{
                return require("./view/404.view.php"); 
            }
}
public function loadModel($model){
            if(file_exists("./model/".$model.".php")){

                include_once("./model/".$model.".php"); 
                        return $model = new $model();

            }
            return false;
            }
}


?>