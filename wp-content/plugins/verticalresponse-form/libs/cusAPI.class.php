<?php

//CONTACTUS.COM API V1.3
//www.contactus.com
//2013 copyright

/*
  Description: The VerticalResponse Form Plugin by ContactUs.com.
 */

class cUsComAPI_vr {
    
    var $v = '1.3b';
    
    public function cUsComAPI_vr(){
        $cUs_email = '';
        $cUs_formkey = '';
        
        return TRUE;
    }
    
    public function createCustomer($postData){
        
        if      ( !strlen($postData['fname']) ):      echo ' "Missing First Name, is a required field!" ' ; 
        elseif  ( !strlen($postData['lname']) ):      echo ' "Missing Last Name, is a required field!" ';
        elseif  ( !strlen($postData['email']) ):      echo ' "Missing Email, is a required field!" ';
        elseif  ( !strlen($postData['website']) ):    echo ' "Missing Website, a is required field!" ';
        else:
    
            $postData = preg_replace( '/\s+/', '%20', $postData );

            $ch = curl_init();

            $strCURLOPT  = 'https://api.contactus.com/api2.php';
            $strCURLOPT .= '?API_Account=AC11111f363ae737fb7c60b75dfdcbb306';
            $strCURLOPT .= '&API_Key=1111165fc715b9857909c062fd5ad7e3';
            $strCURLOPT .= '&API_Action=createSignupCustomer';
            $strCURLOPT .= '&First_Name='.trim($postData['fname']);
            $strCURLOPT .= '&Last_Name='.trim($postData['lname']);
            $strCURLOPT .= '&Email='.sanitize_email(trim($postData['email']));
            $strCURLOPT .= '&Website='.esc_url(trim($postData['website']));

            $strCURLOPT .= '&VerticalResponse_Delivery_User_Name='.trim($postData['usermail']);
            $strCURLOPT .= '&VerticalResponse_Delivery_User_Pass='.trim($postData['userpass']);
            $strCURLOPT .= '&VerticalResponse_Delivery_Unique_List_ID='.trim($postData['listID']);

            $strCURLOPT .= '&Auto_Activate=1';
            $strCURLOPT .= '&IP_Address='.$this->getIP();
            $strCURLOPT .= '&Template_Desktop_Form=newsletterTemplate1';
            $strCURLOPT .= '&Promotion_Code=WPVR';
            $strCURLOPT .= '&Version=vr|1.0.1';

            curl_setopt($ch, CURLOPT_URL, $strCURLOPT);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $content = curl_exec($ch);
            curl_close($ch);

            return $content;
            
        endif;
    }
    
    public function getFormKeyAPI($cUs_email, $cUs_pass){
    
        $cUs_email = preg_replace( '/\s+/', '%20', $cUs_email );

        $ch = curl_init();

        $strCURLOPT  = 'https://api.contactus.com/api2.php';
        $strCURLOPT .= '?API_Account=AC00000bb19ec0c1dd1fe715ef23afa9cf';
        $strCURLOPT .= '&API_Key=00000bb19ec0c1dd1fe715ef23afa9cf';
        $strCURLOPT .= '&API_Action=getFormKey';
        $strCURLOPT .= '&Email=' . trim($cUs_email);
        $strCURLOPT .= '&Password=' . trim($cUs_pass);

        curl_setopt($ch, CURLOPT_URL, $strCURLOPT);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);  
        curl_close($ch);

        return $content;
    }
    
    public function updateDeliveryOptions($cUs_pass, $cUs_email, $formkey, $postData ){
    
        $postData = preg_replace( '/\s+/', '%20', $postData );

        $ch = curl_init();

        $strCURLOPT  = 'https://api.contactus.com/api2.php';
        $strCURLOPT .= '?API_Account=AC00000bb19ec0c1dd1fe715ef23afa9cf';
        $strCURLOPT .= '&API_Key=00000bb19ec0c1dd1fe715ef23afa9cf';
        $strCURLOPT .= '&API_Action=updateDeliveryOptions';
        $strCURLOPT .= '&Email=' . trim($cUs_email);
        $strCURLOPT .= '&Password=' . trim($cUs_pass);
        $strCURLOPT .= '&Form_Key=' . trim($formkey);
        $strCURLOPT .= '&VerticalResponse_Delivery_Enabled=1';
        $strCURLOPT .= '&VerticalResponse_Delivery_User_Name='.trim($postData['usermail']);
        $strCURLOPT .= '&VerticalResponse_Delivery_User_Pass='.trim($postData['userpass']);
        $strCURLOPT .= '&VerticalResponse_Delivery_Unique_List_ID='.trim($postData['listID']);
        
        curl_setopt($ch, CURLOPT_URL, $strCURLOPT);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);  
        curl_close($ch);

        return $content;
    }
    
    public function getIP() {

        // Get some headers that may contain the IP address
        $SimpleIP = (isset($REMOTE_ADDR) ? $REMOTE_ADDR :getenv("REMOTE_ADDR"));

        $TrueIP = (isset($HTTP_CUSTOM_FORWARDED_FOR) ? $HTTP_CUSTOM_FORWARDED_FOR : getenv("HTTP_CUSTOM_FORWARDED_FOR"));
        if ($TrueIP == "") $TrueIP = (isset($HTTP_X_FORWARDED_FOR) ? $HTTP_X_FORWARDED_FOR : getenv("HTTP_X_FORWARDED_FOR"));
        if ($TrueIP == "") $TrueIP = (isset($HTTP_X_FORWARDED) ? $HTTP_X_FORWARDED : getenv("HTTP_X_FORWARDED"));
        if ($TrueIP == "") $TrueIP = (isset($HTTP_FORWARDED_FOR) ? $HTTP_FORWARDED_FOR : getenv("HTTP_FORWARDED_FOR"));
        if ($TrueIP == "") $TrueIP = (isset($HTTP_FORWARDED) ? $HTTP_FORWARDED : getenv("HTTP_FORWARDED"));

        $GetProxy = ($TrueIP == "" ? "0" : "1");

        if ($GetProxy == "0") {
            $TrueIP = (isset($HTTP_VIA) ? $HTTP_VIA : getenv("HTTP_VIA"));
            if ($TrueIP == "") $TrueIP = (isset($HTTP_X_COMING_FROM) ? $HTTP_X_COMING_FROM : getenv("HTTP_X_COMING_FROM"));
            if ($TrueIP == "") $TrueIP = (isset($HTTP_COMING_FROM) ? $HTTP_COMING_FROM : getenv("HTTP_COMING_FROM"));
            if ($TrueIP != "") $GetProxy = "2";
        };

        if ($TrueIP == $SimpleIP) $GetProxy = "0";

        // Return the true IP if found, else the proxy IP with a 'p' at the begining
        switch ($GetProxy) {
            case '0':
                // True IP without proxy
                $IP = $SimpleIP;
                break;
            case '1':
                $b = preg_match("%^([0-9]{1,3}\.){3,3}[0-9]{1,3}%", $TrueIP, $IP_array);
                if ($b && (count($IP_array) > 0)) {
                    // True IP behind a proxy
                    $IP = $IP_array[0];
                } else {
                    // Proxy IP
                    $IP = $SimpleIP;
                };
                break;
            case '2':
                // Proxy IP
                $IP = $SimpleIP;
        };

         if (filter_var($IP, FILTER_VALIDATE_IP) && $IP != '127.0.0.1') {
            $vIP = $IP;
        } else {
            $externalContent = file_get_contents('http://checkip.dyndns.com/');
            preg_match('/Current IP Address: ([\[\]:.[0-9a-fA-F]+)</', $externalContent, $m);
            $vIP = $m[1];
        }

        return $vIP;
    }
    
    public function resetData(){
        delete_option( 'cUsVR_settings' );
        delete_option( 'cUsVR_FORM_settings' );
        delete_option( 'cUsVR_settings_form_key' );
        delete_option( 'cUsVR_settings_inlinepages' );
        delete_option( 'cUsVR_settings_tabpages' );
        return true;
    }
}
?>