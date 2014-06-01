<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class VerticalResponse {

    public $usermail;
    public $userpass;
    public $s_id;
    public $ses_time = 10;  // duration of session in minutes
    public $vr_api = "https://api.verticalresponse.com/wsdl/1.0/VRAPI.wsdl";
    public $vr_client;

    function __construct($user_mail, $user_pass) {
        
        $this->usermail = $user_mail;
        $this->userpass = $user_pass;
        
        $this->vr_client = new SoapClient($this->vr_api);
        
        $this->s_id = $this->vr_client->login(
                array(
                    'username' => $this->usermail,
                    'password' => $this->userpass,
                    'session_duration_minutes' => $this->ses_time
                )
        );
    }

    public function getUserByEmailAdress() {

        $users = $this->vr_client->getUserByEmailAddress(array(
            'session_id' => $this->s_id,
            'email_address' => $this->usermail
        ));

        return $users;
    }

    public function getEnumerateLists($limit) {
        
        $lists = $this->vr_client->enumerateLists(array(
            'session_id' => $this->s_id,
            'type' => 'email',
            'include_field_info' => true,
            'limit' => $limit,
        ));
        
        return $lists;
    }

}

?>
