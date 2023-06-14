<?php
class PartijEdit extends Controller
{
    
    public function index()
    {
        if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
        $errors = array();
        $political_party = new Political_party();
        if(isset($_GET['id']))
        {
            $data = $political_party->where("id", $_GET['id']);
            //print_r($data); 
            if(($data) > 0)
            {
                
                if(count($_POST) > 0 )
                {
                    
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
                $this->view('partijEdit', ['errors'=>$errors]);
            }
            else{
                
                $this->redirect('login');
            }
        }
 
    }
}