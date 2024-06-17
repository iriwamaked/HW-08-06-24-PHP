<?php

class Controller{

    public function serve($action){
        $this->action=$action;
        $this->view_data=[
            'title'=>'Адвокатське об\'єднання',
        ];
        $method='do_'.strtolower($_SERVER["REQUEST_METHOD"]);
        if (method_exists($this,$method))
        {
            $this->do_get();
        } 
        else{
            $this->send_error('Method not implemented', 405);
        }
       
    }

    public function send_error($message = 'Mistaken request', $code = 400)
    {
        echo json_encode(
            [
                'status' => 'error',
                'code' => $code,
                'message' => $message
            ]
        );
        exit;
    }

    public function goto_view(){
        // //получаем имя от специализированной переменной движка  PHP __CLASS__, отделяем до слова Контроллер, понижаем в регистре
        // $controller_name=strtolower(substr(__CLASS__,0,(strpos(__CLASS__,'Controller'))));
        // echo "Controller name: $controller_name";
        $class_name=get_class($this);
        $controller_name=strtolower(substr($class_name,0,(strpos($class_name,'Controller'))));
        //здесь точка показывает на папку, из которой началось выполнение
        // запустился файл (program.cs). 
        //$controller_object->serve($action) - точка вызова
        $view_path = "./views/{$controller_name}/{$this->action}.php";
        //мы можем разделить наши контроллеры:
        //если указан action, который существует - значит это view contoller,
        //если указан action, который не существует то мы будем воснимать как json-запрос
        if (is_readable($view_path))
        {
            //загружаем view
            include './views/_shared/_layout.php';
        }
        else{
            echo "No view found: '$view_path'";
        }
    }
}