<?php
class Report extends Model
{
    public function addReport($DATA)
    {
                   
            
        $data['work'] = $DATA['werk'];
        $data['sport'] = $DATA['sport'];
        $data['nutrition'] = $DATA['voeding'];
        $data['alcohol'] =$DATA['alcohol'];
        $data['drugs'] = $DATA['drugs'];
        $data['sleep'] = $DATA['slaap'];
        $data['general'] = ($DATA['werk'] + $DATA['sport'] + $DATA['voeding'] + $DATA['alcohol'] + $DATA['drugs'] + $DATA['slaap'])/6;
        $data['users_id'] = $DATA['userID'];

        $this->addObject($data);
    }
    public function reportReset($id)
    {
        $this->reset($id);
    }


}