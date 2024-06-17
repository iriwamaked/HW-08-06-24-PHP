<?php
// echo "<pre>";
// print_r($_SERVER);
$uri=$_SERVER['REQUEST_URI'];

//проверяем, не является ли это запросом на существующий файл
//НО для защиты от прямого доступа файлов произодим поиск 
//только в директори wwwroot
$path = "./wwwroot{$uri}";
if(is_file($path)){
    //находим расширение файла (pathinfo возвращает расширение без точки)
    //если не указать расширение в запросе - возвращает пустую строку
    $ext=pathinfo($uri, PATHINFO_EXTENSION);
    // var_dump($ext);  
    //нам нужен content type
    //помним, что switch - это оператор с проваливанием 
    //выполняется первый case, который совпадают, а потом все до конца
    //поэтому существуют break, чтобы останавливать остальные инструкции
    //но в данном случае мы пользуемся этим, чтобы не дублировать код
    switch($ext)
    {
        case 'jpg': $ext='jpeg';
        case 'jpeg':
        case 'bmp':
        case 'png': 
        case 'ico':
           $content_type="image/$ext";
            break;
        case 'js': $ext='javascript';
        case 'txt':
        case 'html':
        case 'css':
            $content_type="text/$ext";
            break;
    }
    if(empty($content_type))
    {
        http_response_code(403);
        echo "File forbidden";
        exit;
        //т.е. если кто-то запросил файл не из перечня расширения, 
        // то получит ошибку (например если попытаться exe - не пропустит, например)
    }
    header("Content-Type: $content_type");
    //у PHP  есть специальный метод, который его сразу и читает, 
    //и сразу перекидывает на ответ
    readfile($path);
    exit;
    
}

$uridata_position=strpos($uri, '?');
// echo $uridata_position;
// var_dump($uridata_position);
if ($uridata_position !== false){
    $uri=substr($uri, 0, $uridata_position);
}
// echo($uri);
$uri_components=explode('/', $uri);
// echo "<pre>";
// print_r($uri_components);
//если есть такая часть (после первого слеша, который всегда пустой элемент)
$controller = empty($uri_components[1]) ? 'main' : $uri_components[1];
$action = empty($uri_components[2]) ? 'index' : $uri_components[2];
$id = empty($uri_components[3]) ? false : $uri_components[3];

// echo "controller: $controller, action: $action, id: $id";

$controller_filename="./controllers/{$controller}_controller.php";
//проверяем, является ли параметр файлом и яявляется ли он читаемім
if (is_readable($controller_filename))
{
    // echo $controller_filename, " is readable<br/>";
    //нам нужно открыть этот файл и создать класс
    include_once($controller_filename);
    //есть специальная функция ucfirst (UpperCase First)
    //соединение строк в PHP осуществляется через точку
    //!! "+" = исключительно арифметический, конкатенация строк - "."
    $controller_classname = ucfirst($controller).'Controller';
    if(class_exists($controller_classname)){
        // echo $controller_filename, " exists<br/>";
        $controller_object=new $controller_classname();
        //делаем еще одну проверку (если метод существует, serve - будет общим СТАРТОВЫМ методом)
        if(method_exists($controller_object, "serve"))
        {
            $controller_object->serve($action);
        }
        else{
            echo "$controller_classname has no 'serve' method";
        }
    }
    else{
        echo $controller_filename, " not exists";
    }
}
else
{
    echo "404";
}


