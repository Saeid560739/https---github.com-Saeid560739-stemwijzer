<?php
class dashboard extends Controller 
{
     function index()
        {
            if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
            $user = new User();
            $this->view('dashboard');
        }
}