<?php
class Stellingen extends Controller 
{
     function index()
        {
            if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
            $statement = new Statement();
            $data = $statement->findAll();
            
            $this->view('stellingen', ['data'=>$data]);
        }
}