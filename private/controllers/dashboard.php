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
            $data = $user->where("ID", 1);
            
            $this->view('dashboard', ['data'=>$data]);
        }
}