<?php
  /**
   *
   */
  class AbsoluteAddress
  {
    public $controller="controller";
    public $method="index";



    function __construct()
    {

      //check url
      if (isset($_GET['url'])) {
        $url=$_GET['url'];
        $url=$this->Explode($url);
        $this->controller=$url[0];
        $this->method=$url[1];
      }
      //check dierctory url
      $path=$this->controller.'/'.$this->method.'.php';
      if (file_exists($path)) {
        require $path;
      }else {
        //call html and css with header page Not Found Absolute Url
        header('Location: ./style/pageNotFound.html');
      }
    }
    //function with remmove "/"
    public function Explode($url){
      $url=explode("/",$url);
      return $url;
    }

  }
  new AbsoluteAddress;

?>
