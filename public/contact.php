<?php
require_once('inc/recaptchalib.php');
$scripts = '';
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LeT3AgUAAAAAOxf76luFjXyHCQC6FYg8tkjCCdV';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['firstname'])?$_POST['firstname']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            
            $to = 'testing3128@gmail.com';
            $subject = 'New contact form have been submitted';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            
            $msg = 'Thanks for your message. We will contact you soon..';
            $scripts =  '<script type="text/javascript">';
            //$scripts .=  'jQuery(function(){'."\r\n";
            $scripts .=  '  var hash = location.hash.replace("#","");'."\r\n";
            $scripts .=  '  if(hash != ""){'."\r\n";
            $scripts .=  '     location.hash = "";'."\r\n";
            $scripts .=  '  }'."\r\n";
            $scripts .=  'document.getElementById("frmContact").reset();';
            $scripts .=  '  alert("' . $msg . '");'."\r\n";
            //$scripts .= '})'."\r\n";
            $scripts .=  '</script>'."\r\n";
        else:
            $msg = 'Robot verification failed, please try again.';
            $scripts = '<script type="text/javascript">alert("' . $msg . '")</script>';
        endif;

    else:
        $msg = 'Please click on the reCAPTCHA box.';
        $scripts = '<script type="text/javascript">alert("' . $msg . '")</script>';
    endif;
else:
    $msg = '';
endif;
?>
<?php include('views/shared/header-meta.php') ?>
    <title>Contact AMPC</title>
    <?php include('views/shared/header.php') ?>    
    <div id="page-content-wrapper">
        <?php include('views/shared/headerPartial.php') ?>                                        
        <div class="main-ampc">            
            <?php include('views/partials/contact.php') ?>                       
        </div>
        <?php include('views/shared/footerPartial.php') ?>
        <?php include('views/shared/loadingPartial.php') ?>
    </div>
    <?php echo $scripts; ?>
<?php include('views/shared/footer.php') ?>