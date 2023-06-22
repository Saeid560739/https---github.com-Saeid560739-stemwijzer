<?php
/**
 * result controller
 */
class Result extends Controller
{

    function index()
    {
        $party = new political_party();
        $data = $party->findAll();

        $this->view('result',[
            'data'=>$data
        ]);
    }
}


