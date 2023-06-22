<?php


/**
 * Statement Model
 */
class Statement extends Model
{

    protected $allowedColumns = [
        'text',
        'political_direction'

    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check naam
        if (empty($DATA['statement'])) {
            $this->errors['statement'] = "Stelling mag alleen uit letters bestaan";
        }


        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
    public function addstelling($DATA)
    {          
        $data['text'] = $DATA['statement'];
        $data['political_direction'] = $DATA['direction'];
        $this->addObject($data);
    }

}