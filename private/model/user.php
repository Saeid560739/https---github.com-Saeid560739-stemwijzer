<?php
class User extends Model
{
    public function validate($data)
    {
        $this->errors = array();

        if(empty($data['username']) || !preg_match('/^[a-zA-Z]+$/', $data['username']))
        {
            $this->errors['username'] = "Voornaam mag alleen uit letters bestaan";
        }

        if(empty($data['email']))
        {
            $this->errors['email'] = "Vul uw email in";
        }

        if($data['password'] != $data['password1'])
        {
            $this->errors['password'] = "De wachtwoord is onjust";
        }
        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
    public function addUser($DATA)
    {
              //    
            
        $data['username'] = $DATA['username'];
        $data['email'] = $DATA['email'];
        $data['password'] = password_hash($DATA['password'], PASSWORD_DEFAULT) ;
        $this->addObject($data);
    }

}
