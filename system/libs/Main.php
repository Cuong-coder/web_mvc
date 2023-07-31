<?php
class Main {
    public $url;
    // public $controllerName = "login";
    // public $methodName = "login";

    public $controllerName = "index";
    public $methodName = "index";
    public $controllerPath  = "app/controllers/";
    public $controller;


    function __construct(){
        $this->getUrl();
        $this->loadController();
        $this->callMethod();

    }

    public function getUrl(){
        //get parameter, nếu có gán vào biến $this->url
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL ;
        if($this->url != NULL){
            // cắt url bỏ vào mảng
            $this->url = rtrim($this->url, '/');
            $this->url = explode("/",filter_var($this->url, FILTER_SANITIZE_URL));
        }else{
            unset($this->url);
        }
        
    }
    // load controller
    public function loadController(){
        if(!isset($this->url[0])){
            // trường hợp mà không có url sẽ include file app/controllers/index.php
            // nhìn trên dòng 5,6 khai báo biến
            include $this->controllerPath.$this->controllerName.'.php';
            // trong app/controllers/index.php thì khởi tạo đối tượng new index();
            // để 
            $this->controller = new $this->controllerName();
            
        }else{
            // trường hợp có url thì gán controllerName = url[0]
            $this->controllerName = $this->url[0];
            // gán đường dẫn app/controllers/
            $fileName = $this->controllerPath.$this->controllerName.'.php';
            if(file_exists($fileName)){
                include $fileName;
                if(class_exists($this->controllerName)){
                    $this->controller = new $this->controllerName();
                }else{
                    // $this->controller = NULL;
                }
                
            }else{
                //$this->controller = NULL;
            }
        }
       
    }

    public function callMethod(){
        if ($this->controller !== null) {
            if (isset($this->url[2])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}($this->url[2]);
                } else {
                    header("Location:".BASE_URL."index/notfound");
                }
            } else {
                if (isset($this->url[1])) {
                    $this->methodName = $this->url[1];
                    if (method_exists($this->controller, $this->methodName)) {
                        $this->controller->{$this->methodName}();
                    } else {
                        header("Location:".BASE_URL."index/notfound");
                    }
                } else {
                    if (method_exists($this->controller, $this->methodName)) {
                        $this->controller->{$this->methodName}();
                    } else {
                        header("Location:".BASE_URL."index/notfound");
                    }
                }
            }
        } else {
            header("Location:".BASE_URL."index/notfound");
        }
    }
    
    

}




?>