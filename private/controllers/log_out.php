<?php
class log_out extends Controller 
{

    function index()
    {    
        Auth::loguot();
        $this->redirect("login");
    } 
}


