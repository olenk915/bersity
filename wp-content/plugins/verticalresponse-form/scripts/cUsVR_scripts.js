
jQuery(document).ready(function($) {
    
    var cUsVR_myjq = jQuery.noConflict();
    
    
    cUsVR_myjq(window).error(function(e){
        e.preventDefault();
    });
    
    try{
        cUsVR_myjq( "#cUs_tabs" ).tabs({active: false});
        cUsVR_myjq( "#cUs_exampletabs" ).tabs({active: false});

        cUsVR_myjq( '.options' ).buttonset();
        cUsVR_myjq( '#inlineradio' ).buttonset();

        cUsVR_myjq( "#terminology" ).accordion({
            collapsible: true,
            heightStyle: "content",
            active: false,
            icons: { "header": "ui-icon-info", "activeHeader": "ui-icon-arrowreturnthick-1-n" }
        });
        cUsVR_myjq( "#form_examples, #tab_examples" ).accordion({
            collapsible: true,
            heightStyle: "content",
            icons: { "header": "ui-icon-info", "activeHeader": "ui-icon-arrowreturnthick-1-n" }
        });
       
    }catch(err){
        cUsVR_myjq('.advice_notice').html('Oops, something wrong happened, please try again later!').slideToggle().delay(1200).fadeOut(1200);
    }
    
    try{

        cUsVR_myjq("#selectable").selectable({
            selected: function(event, ui) { 
                cUsVR_myjq(ui.selected).addClass("ui-selected").siblings().removeClass("ui-selected");           
            }                   
        });
        
    }catch(err){
        console.log('Please upadate you WP version. ['+ err +']');
    }
    
    
    //SEND API KEY AJAX CALL /////// STEP 1
    try{ 
       cUsVR_myjq('.sendUserCred').click(function() {
           
           var vrUserMail = cUsVR_myjq('#usermail').val();
           var vrUserPass = cUsVR_myjq('#userpass').val();
           
           
           if(!vrUserMail.length){
               cUsVR_myjq('.advice_notice').html('Username is a required field!').slideToggle().delay(1200).fadeOut(1200);
               cUsVR_myjq('#usermail').focus();
               cUsVR_myjq('.loadingMessage').fadeOut();
               
           }else if(!vrUserPass.length){
               cUsVR_myjq('.advice_notice').html('Password is a required field!').slideToggle().delay(1200).fadeOut(1200);
               cUsVR_myjq('#userpass').focus();
               cUsVR_myjq('.loadingMessage').fadeOut(); }
               else{
               
               cUsVR_myjq('.sendUserCred').val('Loading . . .').attr({disabled:'disabled'});
               cUsVR_myjq('.loadingMessage').show();
                
                cUsVR_myjq.ajax({ type: "POST", url: ajax_object.ajax_url, data: {action: 'checkVRuserCred', usermail:vrUserMail, userpass:vrUserPass},
                    success: function(data) {

                        switch(data){
                            case '1':
                                message = 'You are already logged into you VerticalResponse account, please continue with next steps.';
                                cUsVR_myjq('.sendUserCred').val('Connected . . .');
                                setTimeout(function(){
                                    getVRlist(vrUserMail,vrUserPass);
                                },2000)
                                
                            break;
                            case '2':
                                message = 'There something wrong with your VerticalResponse credentials, please try again!';
                                cUsVR_myjq('.advice_notice').html(message).show().delay(3000).fadeOut(800);
                                cUsVR_myjq('.sendUserCred').val('Continue to Step 2').removeAttr('disabled');
                            break;
                        }
                        
                        cUsVR_myjq('.loadingMessage').fadeOut();
//                        cUsVR_myjq('.advice_notice').html(message).show().delay(1900).fadeOut(800);

                    },
                    async: false
                });
           }
       });
       
       function getVRlist(vrUserMail, vrUserPass){     
           if(!vrUserMail && !vrUserPass) return false;
           cUsVR_myjq('.loadingMessage').show();
           cUsVR_myjq('.sendUserCred').val('Loading Lists. . .');
           cUsVR_myjq.ajax({ type: "POST", url: ajax_object.ajax_url, dataType: 'json', data: {action:'getVRList',usermail:vrUserMail, userpass:vrUserPass},
                success: function(data) {
                    switch(data.status){
                        case 2:
                            message = 'There something wrong with your VerticalResponse credential, please try again!';
                            cUsVR_myjq('.advice_notice').html(message).slideToggle().delay(1800).fadeOut(600);
                        break;
                        case 1:
                            cUsVR_myjq('#listid').html(data.options);
                            if (data.existname == 0) { 
                                cUsVR_myjq('.vr_name').show();
                            }
                            cUsVR_myjq('.step1').slideUp().fadeOut();
                            cUsVR_myjq('.step2').slideDown().delay(800);
                            break;
                    }
                    cUsVR_myjq('.loadingMessage').fadeOut();

                },
                async: false
            });
       }
       
    }catch(err){
        cUsVR_myjq('.advice_notice').html('Oops, something wrong happened, please try again later!').slideToggle().delay(1200).fadeOut(1200);
    }
    
    
    //SENT LIST ID AJAX CALL /// STEP 2
    try{
        cUsVR_myjq('.sendlistid').click(function() {
           
           var vrUserMail = cUsVR_myjq('#usermail').val();
           var vrUserPass = cUsVR_myjq('#userpass').val();
           
           var vrListID = cUsVR_myjq('#listid').val();
           var vrListName = cUsVR_myjq('#listid option:selected').text();
           
           var vrFName = cUsVR_myjq('#usr_firstname').val();
           var vrLName = cUsVR_myjq('#usr_lastname').val();

           cUsVR_myjq('.loadingMessage').show();

            if (!vrFName.length && cUsVR_myjq('#usr_firstname').is(':visible')) {
                cUsVR_myjq('.advice_notice').html('First name is a required field!').slideToggle().delay(1200).fadeOut(1200);
                cUsVR_myjq('#usr_firstname').focus();
                cUsVR_myjq('.loadingMessage').fadeOut();

            } else if (!vrLName.length && cUsVR_myjq('#usr_lastname').is(':visible')) {
                cUsVR_myjq('.advice_notice').html('Last name is a required field!').slideToggle().delay(1200).fadeOut(1200);
                cUsVR_myjq('#usr_lastname').focus();
                cUsVR_myjq('.loadingMessage').fadeOut();
            }
            else {
                cUsVR_myjq('.sendlistid').val('Loading . . .').attr({disabled: 'disabled'});
                cUsVR_myjq.ajax({type: "POST", url: ajax_object.ajax_url, data: {action: 'sendVRClientList',usermail:vrUserMail, userpass:vrUserPass, listid: vrListID, listname: vrListName , vrfname:vrFName , vrlname:vrLName},
                    success: function(data) {

                        switch(data){
                            case '1':
                                message = '<p>Welcome to ContactUs.com, and thank you for your registration.</p>';
                                message += '<p>We have sent a verification email.</b>.<br/>Please find the email, and login to your new ContactUs.com account.</p>';
                                
                                setTimeout(function(){
                                    cUsVR_myjq('.step3').slideUp().fadeOut();
                                    location.reload();
                                },2000)
                            break;
                            case '2':
                                message = 'Seems like you already have one Contactus.com Account, Please Login below!';
                                setTimeout(function(){
                                    cUsVR_myjq('.step2').slideUp().fadeOut();
                                    cUsVR_myjq('.step3').slideDown().delay(800);
                                },2000)
                            break;
                            default:
                                message = '<p>Ouch! unfortunately there has being an error during the application: <b>' + data + '</b>. Please try again!</a></p>';
                                cUsVR_myjq('.sendlistid').val('Continue to Step 3').removeAttr('disabled');
                            break;
                        }
                        
                        cUsVR_myjq('.loadingMessage').fadeOut();
                        cUsVR_myjq('.advice_notice').html(message).show().delay(1900).fadeOut(800);

                    },
                    async: false
                });
           }
           
            
        });
    }catch(err){
        cUsVR_myjq('.advice_notice').html('Oops, something wrong happened, please try again later!').slideToggle().delay(1200).fadeOut(1200);
    }
    
    
    cUsVR_myjq('#loginbtn').click(function(){//LOGIN ALREADY USERS
        var email = cUsVR_myjq('#login_email').val();
        var pass = cUsVR_myjq('#user_pass').val();
        cUsVR_myjq('.loadingMessage').show();
        
        if(!email.length){
            cUsVR_myjq('.advice_notice').html('User Email is a required and valid field!').slideToggle().delay(1200).fadeOut(1200);
            cUsVR_myjq('#login_email').focus();
            cUsVR_myjq('.loadingMessage').fadeOut();
        }else if(!pass.length){
            cUsVR_myjq('.advice_notice').html('User password is a required field!').slideToggle().delay(1200).fadeOut(1200);
            cUsVR_myjq('#user_pass').focus();
            cUsVR_myjq('.loadingMessage').fadeOut();
        }else{
            var bValid = checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. sergio@jquery.com" );  
            if(!bValid){
                cUsVR_myjq('.advice_notice').html('Please enter a valid User Email!').slideToggle().delay(1200).fadeOut(1200);
                cUsVR_myjq('.loadingMessage').fadeOut();
            }else{
                cUsVR_myjq.ajax({ type: "POST", url: ajax_object.ajax_url, data: {action:'VRloginAlreadyUser',email:email,pass:pass},
                    success: function(data) {

                        switch(data){
                            case '1':
                                message = '<p>Welcome to ContactUs.com, and thank you for your registration.</p>';
                                //message += '<p>First we’ll need to activate your account. We have sent a verification email to <b>' + email + '</b>.<br/>Please find the email, and click on the activation link in the email.  Then, come back to this page.</p>';
                                
                                setTimeout(function(){
                                    cUsVR_myjq('.step3').slideUp().fadeOut();
                                    //cUsVR_myjq('.mainWindow').slideDown().delay(800);
                                    location.reload();
                                },2000)
                                
                            break;
                            default:
                                message = '<p>Ouch! unfortunately there has being an error during the application: <b>' + data + '</b>. Please try again!</a></p>';
                                break;
                        }
                        
                        cUsVR_myjq('.loadingMessage').fadeOut();
                        cUsVR_myjq('.advice_notice').html(message).show();

                    },
                    async: false
                });
            }
        }
    });
    
    cUsVR_myjq('#logoutbtn').click(function(){
        if(confirm('Are you sure you want to quit?')){
            cUsVR_myjq('.loadingMessage').show();
            cUsVR_myjq.ajax({ type: "POST", url: ajax_object.ajax_url, data: {action:'VRlogoutUser'},
                success: function(data) {
                    cUsVR_myjq('.loadingMessage').fadeOut();
                    location.reload();
                },
                async: false
            });
        }
    });
    
    
    try{ cUsVR_myjq('.sendtemplate').click(function() {
           
           var acApiKey = cUsVR_myjq('#apikey').val();
           var acTemplateID = cUsVR_myjq('#templateid').val();
           cUsVR_myjq('.loadingMessage').show();
           
           if(!acApiKey.length){
               cUsVR_myjq('.advice_notice').html('ActiveCampaign API Key is a required field!').slideToggle().delay(1200).fadeOut(1200);
               cUsVR_myjq('#apikey').focus();
               cUsVR_myjq('.loadingMessage').fadeOut();
           }else{
                
                cUsVR_myjq.ajax({ type: "POST", url: ajax_object.ajax_url, data: {action:'sendTemplateID',templateID:acTemplateID},
                    success: function(data) {

                        switch(data){
                            case '1':
                                message = 'Template saved succesfuly . . . .';
                                
                                setTimeout(function(){
                                    cUsVR_myjq('.step3').slideUp().fadeOut();
                                    cUsVR_myjq('.step4').slideDown().delay(800);
                                },2000)
                                
                            break;
                        }
                        
                        cUsVR_myjq('.loadingMessage').fadeOut();
                        cUsVR_myjq('.advice_notice').html(message).show().delay(1900).fadeOut(800);

                    },
                    async: false
                });
           }
           
            
        });
    }catch(err){
        cUsVR_myjq('.advice_notice').html('Oops, something wrong happened, please try again later!').slideToggle().delay(1200).fadeOut(1200);
    }
    
     cUsVR_myjq('#tab_user').change(function (){
        cUsVR_myjq('.displaybtn').show();
    });
    
    cUsVR_myjq('.form_version').change(function(){
        cUsVR_myjq('.displaybtn').show();
        var val = cUsVR_myjq(this).val();
        cUsVR_myjq('.cus_versionform').fadeOut();
        cUsVR_myjq('.' + val).slideToggle();
    });
    
    cUsVR_myjq('#contactus_settings_page').change(function(){
        cUsVR_myjq('.show_preview').fadeOut();
        cUsVR_myjq('.save_page').fadeOut( "highlight" ).fadeIn().val('>> Save your settings');
    });
    
    cUsVR_myjq('.callout-button').click(function() {
        cUsVR_myjq('.getting_wpr').slideToggle('slow');
    });
    
    cUsVR_myjq('.insertShortcode').click(function() {
        contactUs_mediainsert();
    });
    
    
    cUsVR_myjq('#vr_yes').click(function() {
        cUsVR_myjq('#cUsVR_vrsettings').slideToggle('slow');
    });
    
    
    function checkLength( o, n, min, max ) {
        if ( o.val().length > max || o.val().length < min ) {
            o.addClass( "ui-state-error" );
            updateTips( "Length of " + n + " must be between " +
                min + " and " + max + "." );
            return false;
        } else {
            return true;
        }
    }

    function comparePass( o, n ) {
        if ( o.val() != n.val() ) {
            o.addClass( "ui-state-error" );
            updateTips( "Password don't match." );
            return false;
        } else {
            return true;
        }
    }

    function checkRegexp( o, regexp, n ) {
        if ( !( regexp.test( o ) ) ) {
            return false;
        } else {
            return true;
        }
    }
    
    
});

