<?php

class UserEdit extends Controller
{

   public function index()
        {
            if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
            $user = new User();
            //print_r($_POST);
            $data = $user->where("id", $_SESSION['userID']);
            if(isset($_POST['submit']))
            {
                $arr['firstname'] = $_POST['firstName'];
                $arr['lastname'] = $_POST['lastName'];
                $arr['email'] = $_POST['email'];
                $arr['weight'] = $_POST['weight'];
                $user->updateObject($_SESSION['userID'], $arr);
                $this->redirect("profile");
            }
            $this->view('userEdit', ['rows'=>$data]);
            
            
        }
}