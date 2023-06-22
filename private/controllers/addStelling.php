<?php
class Addstelling extends Controller
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
                //print_r($_POST);
                $statement = new Statement();
                if(isset($_POST['submit']))
                {
                    if($statement->validate($_POST))
                    {
                        $statement->addstelling($_POST);
                        $this->redirect('stellingen');

                    }else{
                        $errors = $statement->errors;
                    }
                }
            }
            $this->view('addstelling', ['errors'=>$errors]);

        }
}
