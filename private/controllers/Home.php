<?php
/**
 * home controller
 */
class Home extends Controller
{

    function index()
    {

       $statement = new statement();
       $data = $statement->findAll();


        $this->view('home',[
            'data'=>$data

        ]);
    }


}


