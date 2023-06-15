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
        if(isset($_POST['id']))
        {
            if(isset($_POST['delete']))
            {
                $political_party->deleteObject($_POST['id']);
                $this->redirect('login');
                die();
            }     

            $data = $political_party->where("id", $_POST['id']);
            //print_r($data); 
            
                
                if(count($_POST) > 0 )
                {
                   
                    if(isset($_POST['submit']))
                    {
                        print_r($_POST);
                        if($political_party->validate($_POST))
                        {
                                        
                            $arr['name'] = $_POST['name'];
                            $arr['abbreviation'] = $_POST['abbreviation'];
                            $arr['ideology'] = $_POST['ideology'];
                            $arr['direction'] = $_POST['direction'];
                            $arr['logo'] = $_POST['logo'];
                            $arr['summary'] = $_POST['summary'];
                            $arr['leader'] = $_POST['leader'];
                            $arr['x'] = $_POST['x'];
                            $arr['y'] = $_POST['y'];

                            $political_party->updateObject($_POST['id'], $arr);
                            $this->redirect('login');
                            
                        }else{
                            $errors = $political_party->errors;
                        }
                    }
                }
                $this->view('partijEdit', ['errors'=>$errors, 'data'=>$data]);

        }
        else{
                
            $this->redirect('login');
        }
 
    }
}