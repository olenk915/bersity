<?php

// checkVRuserCred handler function...
add_action('wp_ajax_checkVRuserCred', 'checkVRuserCred_callback');

function checkVRuserCred_callback() {

    $user_mail = $_REQUEST[usermail];
    $user_pass = $_REQUEST[userpass];

    try {
        $VR_api = new VerticalResponse($user_mail, $user_pass);

        if ($VR_api->s_id) {
            echo 1;
            update_option('cUsVR_settings_api_mail', $VR_api->usermail);
            update_option('cUsVR_settings_api_pass', $VR_api->userpass);
        } 
    } catch (SoapFault $exception) {
        echo 2;
    }

    die();

}

// getVRlist handler function...
add_action('wp_ajax_getVRList', 'getVRList_callback');

function getVRList_callback() {

    $data['status'] = 2;
    $data['options'] = "";
    $data['existname'] = "0";

    $user_mail = $_REQUEST[usermail];
    $user_pass = $_REQUEST[userpass];
    
    try {
        $VR_api = new VerticalResponse($user_mail, $user_pass);
        $lists = $VR_api->getEnumerateLists(70);
        
        foreach ($lists as $list) {
            $data['options'] .= "<option value='{$list->id}'>{$list->name}</option>";
        }
        $data['status'] = 1;
        
    } catch (SoapFault $exception) {
        $data['status'] = 2;
    }
    echo json_encode($data);
    die();
}

// sendClientList handler function...
add_action('wp_ajax_sendVRClientList', 'sendClientListVR_callback');
function sendClientListVR_callback() {
    
    $user_mail = $_REQUEST[usermail];
    $user_pass = $_REQUEST[userpass];
    
    $cUs_api = new cUsComAPI_vr();
    $postData = array(
        'usermail'=>$user_mail,
        'userpass'=>$user_pass,
        'fname' => $_REQUEST[vrfname],
        'lname' => $_REQUEST[vrlname],
        'email' => $user_mail,
        'website' => $_SERVER['HTTP_HOST'],
        'listID' => $_REQUEST[listid],
        'vrListName' => $_REQUEST[listname]
    );
    
    update_option('cUsVR_settings', $postData);

    $cusAPIresult = $cUs_api->createCustomer($postData);

    if($cusAPIresult) :

        $cUs_json = json_decode($cusAPIresult);

        switch ( $cUs_json->status  ) :

            case 'success':
                echo 1;//GREAT
                update_option('cUsVR_settings_form_key', $cUs_json->form_key );
                $aryFormOptions = array( //DEFAULT SETTINGS / FIRST TIME
                    'tab_user'          => 1,
                    'cus_version'       => 'tab'
                ); 
                update_option('cUsVR_FORM_settings', $aryFormOptions );//UPDATE FORM SETTINGS
                
            break;

            case 'error':

                if($cUs_json->error[0] == 'Email exists'):
                    echo 2;//ALREDY CUS USER
                else:
                    //ANY ERROR
                    echo $cUs_json->error;
                    $cUs_api->resetData(); //RESET DATA
                endif;
            break;

        endswitch;
     else:
         //echo 3;//API ERROR
         echo $cUs_json->error;
         $cUs_api->resetData(); //RESET DATA
     endif;
    
    die();
}

// VRloginAlreadyUser handler function...
add_action('wp_ajax_VRloginAlreadyUser', 'loginAlreadyUserVR_callback');
function loginAlreadyUserVR_callback() {
    $cUs_api = new cUsComAPI_vr();
    $cUs_email = $_REQUEST['email'];
    $cUs_pass = $_REQUEST['pass'];
    $postData = get_option('cUsVR_settings'); //get the saved user data
    $cusAPIresult = $cUs_api->getFormKeyAPI($cUs_email, $cUs_pass); 
    if($cusAPIresult){
        $cUs_json = json_decode($cusAPIresult);

        switch ( $cUs_json->status  ) :
            case 'success':
                
                $cUs_API_UPDATE = $cUs_api->updateDeliveryOptions($cUs_pass, $cUs_email, $cUs_json->form_key, $postData); //UPDATE DELIVERY OPTIONS;
                
                update_option('cUsVR_settings_form_key', $cUs_json->form_key);
                $aryFormOptions = array( //DEFAULT SETTINGS / FIRST TIME
                    'tab_user'          => 1,
                    'cus_version'       => 'tab'
                ); 
                update_option('cUsVR_FORM_settings', $aryFormOptions );//UPDATE FORM SETTINGS
                echo 1;
                break;

            case 'error':
                echo $cUs_json->error;
                $cUs_api->resetData(); //RESET DATA
                break;
        endswitch;
    }
    
    die();
}

// VRlogoutUser handler function...
add_action('wp_ajax_VRlogoutUser', 'logoutUserVR_callback');
function logoutUserVR_callback() {
    $cUs_api = new cUsComAPI_vr();
    echo 1; //none list
    $cUs_api->resetData(); //RESET DATA
    
    die();
}
// sendTemplateID handler function...
add_action('wp_ajax_sendTemplateID', 'sendTemplateIDVR_callback');
function sendTemplateIDVR_callback() {
    echo 1; //none list
    
    die();
}


?>
