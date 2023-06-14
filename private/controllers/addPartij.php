<?php
class addpartij extends Controller
{
    
        public function index()
        {
            if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
            
            $errors = array();
            $data =  array();
            if(count($_POST) > 0 )
            {
                $political_party = new Political_party();
                if(isset($_POST['submit']))
                {
                    if($political_party->validate($_POST))
                    {
                        $political_party->addPartij($_POST);
                        $this->redirect('login');

                    }else{
                        $errors = $political_party->errors;
                    }
                }
            }
            $this->view('addPartij', ['errors'=>$errors]);

        }
}
