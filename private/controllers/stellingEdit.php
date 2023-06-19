<?php
class StellingEdit extends Controller
{
    
    public function index()
    {
        if(!Auth::logged_in())
            {
                $this->redirect("login");
            }
        $errors = array();
        $statement = new Statement();
        if(isset($_POST['id']))
        {
            if(isset($_POST['delete']))
            {
                $statement->deleteObject($_POST['id']);
                $this->redirect('stellingen');
                die();
            }   

            $data = $statement->where("id", $_POST['id']);
            //print_r($data); 
            
                
                if(count($_POST) > 0 )
                {
                   
                    if(isset($_POST['submit']))
                    {
                        print_r($_POST);
                        if($statement->validate($_POST))
                        {
                                        
                            $arr['text'] = $_POST['statement'];
                            $arr['political_direction'] = $_POST['direction'];


                            $statement->updateObject($_POST['id'], $arr);
                            $this->redirect('stellingen');
                            
                        }else{
                            $errors = $statement->errors;
                        }
                    }
                }
                $this->view('stellingEdit', ['errors'=>$errors, 'data'=>$data]);

        }
        else{
                
            $this->redirect('stellingen');
        }
 
    }
}