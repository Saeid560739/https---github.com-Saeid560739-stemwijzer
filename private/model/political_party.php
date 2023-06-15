<?php
class Political_party extends Model
{
    public function validate($data)
    {
        $this->errors = array();

        if(empty($data['name']) )
        {
            $this->errors['name'] = "vul de partij naam in";
        }

        if(empty($data['abbreviation']))
        {
            $this->errors['abbreviation'] = "Vul de afkorting in";
        }
        if(empty($data['ideology']))
        {
            $this->errors['ideology	'] = "Vul de ideologie in";
        }
        if(empty($data['direction']) != null)
        {
            $this->errors['direction'] = "kies de richting";
        }
        if(empty($data['leader']))
        {
            $this->errors['leader'] = "leader mag alleen uit letters bestaan";
        }
        if(empty($data['logo']))
        {
            $this->errors['logo'] = "Kies een logo";
        }
        if(empty($data['summary']))
        {
            $this->errors['summary'] = "Vul een samenvatting in";
        }
        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
    public function addPartij($DATA)
    {
              //    
            
        $data['name'] = $DATA['name'];
        $data['abbreviation'] = $DATA['abbreviation'];
        $data['ideology'] = $DATA['ideology'];
        $data['direction'] = $DATA['direction'];
        $data['logo'] = $DATA['logo'];
        $data['summary'] = $DATA['summary'];
        $data['leader'] = $DATA['leader'];
        $data['x'] = $DATA['x'];
        $data['y'] = $DATA['y'];

        $this->addObject($data);
    }




}