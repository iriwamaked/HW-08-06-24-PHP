<?php

include_once "controller.php";

class MainController extends Controller{

    public function do_get(){
        $this->view_data['title'].='. Головна сторінка';
        $this->goto_view(); 
    }
}