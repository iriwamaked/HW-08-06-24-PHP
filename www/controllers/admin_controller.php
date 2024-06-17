<?php

include_once "controller.php";

class AdminController extends Controller{

    public function do_get(){
        $this->view_data['title']='Панель адміністратора';
        $this->goto_view(); 
    }
}