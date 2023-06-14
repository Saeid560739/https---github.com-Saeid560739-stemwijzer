<?php
class dashboard extends Controller 
{
     function index()
        {
            if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
            $political_party = new Political_party();
            $data = $political_party->findAll();
            
            $this->view('dashboard', ['data'=>$data]);
        }
}