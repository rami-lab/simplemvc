<?php

namespace smvc\app\Controllers;

class BaseController {
protected $twig=NULL;
protected $template='index.html' ;

 function __construct(){
   $this->inittpl();
 }
 function inittpl(){
    if(!$this->twig){
     $loader = new \Twig\Loader\FilesystemLoader(TEMPLATE_BASE_DIR);
	 //if cache needed
     //$cache=['cache' => TEMPLATE_BASE_DIR.'/cache'];
     //$this->twig = new \Twig\Environment($loader ,$cache);
     $this->twig = new \Twig\Environment($loader);
    }
}

function render($template,$param=array()){
    echo $this->twig->render($template, $param );
    exit();
}



function index(){
$this->render($this->template,['name' => 'rami-lab']);
}

}

?>