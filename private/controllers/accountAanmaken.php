<?php

    class accountAanmaken extends Controller
    {
        public function index()
        {
            
            $errors = array();
            $data =  array();
            if(count($_POST) > 0 )
            {
                $user = new User();
                if(isset($_POST['submit']))
                {
                    if($user->validate($_POST))
                    {
                        $user->addUser($_POST);
                        $this->redirect('login');

                    }else{
                        $errors = $user->errors;
                    }
                }
            }
            $this->view('accountAanmaken', ['errors'=>$errors]);

        }
        
    }
