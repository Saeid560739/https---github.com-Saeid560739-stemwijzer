<?php

    class login extends Controller
    {
        public function index()
        {
            $errors = array();
            if(count($_POST) > 0)
            {
                $user = new User();
                if($row = $user->where("email", $_POST['email']))
                {
                    $row = $row[0];
                    //echo $row;
                    if(password_verify($_POST['password'], $row->password))
                    {
                        Auth::authen($row);
                        $_SESSION['userID'] = $row->id;
                        $this->redirect("/dashboard");
                    }
                   
                }else{
                    $errors['email'] = "verkeerde email of wachtwoord"; 
                }
            }
            $this->view('login',['errors'=> $errors]);
        }
        
    }
