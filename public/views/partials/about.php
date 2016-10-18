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
            
            $msg = 'Thanks for your message. We will contact you soon.';
            $scripts =  '<script type="text/javascript">';
            $scripts .=  'jQuery(function(){'."\r\n";
            // $scripts .=  '  var hash = location.hash.replace("#","");'."\r\n";
            // $scripts .=  '  if(hash != ""){'."\r\n";
            // $scripts .=  '     location.hash = "";'."\r\n";
            // $scripts .=  '  }'."\r\n";
            $scripts .=  '$("#frmContact").find("input[type=\'text\'], textarea").val("");';
            $scripts .=  '  alertmessage("' . $msg . '");'."\r\n";
            $scripts .=  '$(".projectLightbox__closeButton").trigger("click");'."\r\n";
            $scripts .=  '})'."\r\n";
            $scripts .=  '</script>'."\r\n";
        else:
            $msg = 'Robot verification failed, please try again.';
            $scripts = '<script type="text/javascript">$(function(){ $("#getintouch").trigger("click"); alertmessage("' . $msg . '"); }) </script>';
        endif;

    else:
        $msg = 'Please click on the reCAPTCHA box.';
        $scripts = '<script type="text/javascript">$(function(){ $("#getintouch").trigger("click"); alertmessage("' . $msg . '"); }) </script>';
    endif;
else:
    $msg = '';
endif;
?>
<div class="sub_folder fullHeight">
	<div class="page_txt">
		<div class="page_in">
			<h4>About AMPC</h4>
			<p class="pph-1">The Australian Meat Processor Corporation supports the red meat processing industry across Australia. Our mandate is to provide research, development and extension services that improve the sustainability and efficiency of the sector. Our 106 members represent 97% of Australia’s red meat processors.</p>
		</div>		
	</div>
	<div class="meat_industry">
		<h4>About the Australian red meat industry</h4>
		<!-- list on desktop -->
		<div class="items_meat">
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We contribute</p>
		  				<p class="pph-3">$23 BILLION</p>
		  				<p class="pph-2">To AU GDP</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We employ</p>
		  				<p class="pph-3">135,000</p>
		  				<p class="pph-2">Australians</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">Meat processing is</p>
		  				<p class="pph-3">Australia’s Largest </p>
		  				<p class="pph-2">food product manufacturing industry</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We are the</p>
		  				<p class="pph-3">World’s 7th Largest beef Producer</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We export to</p>
		  				<p class="pph-3">86 countries</p>
		  			</div>
		  		</div>
		  	</div>
		</div>
		<!-- slide on mobile -->
		<div class="items_meat slide_meat">
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We contribute</p>
		  				<p class="pph-3">$23 BILLION</p>
		  				<p class="pph-2">To AU GDP</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We employ</p>
		  				<p class="pph-3">135,000</p>
		  				<p class="pph-2">Australians</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">Meat processing is</p>
		  				<p class="pph-3">Australia’s Largest </p>
		  				<p class="pph-2">food product manufacturing industry</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We are the</p>
		  				<p class="pph-3">World’s 7th Largest beef Producer</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="item_meat">
		  		<div class="in_item_meat">
		  			<div class="content_item">
		  				<p class="pph-2">We export to</p>
		  				<p class="pph-3">86 countries</p>
		  			</div>
		  		</div>
		  	</div>
		</div>
	</div>
	<div class="product-div">
		<div class="product-in">
			 <div class="producing">
			 	<div class="title_product">
			 		<h5>Producing</h5>
			 	</div>
			 	<div class="pro-body">
			 		<div class="pro-line">
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/product_1.png">
			 				</a>
			 				<p class="pph-2">
			 					<a >Primary <br/>Producers</a>
			 				</p>
			 			</div>
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/product_2.png">
			 				</a>
			 				<p class="pph-2">
			 					<a >Feed<br/>Lotting</a>
			 				</p>
			 			</div>
			 		</div>
			 	</div>
			 </div>
			 <div class="processing">
			 	<div class="title_product">
			 		<h5>Processing</h5>
			 	</div>
			 	<div class="pro-body">
			 		<div class="pro-line">
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_1.png">
			 				</a>
			 				<p class="pph-2">
			 					<a >Live <br/>Transport</a>
			 				</p>
			 			</div>
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_2.png">
			 				</a>
			 				<p class="pph-2 oneline" >
			 					<a >Processors</a>
			 				</p>
			 			</div>
			 		</div>

			 		<div class="pro-line">
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_3.png">
			 				</a>
			 				<p class="pph-2">
			 					<a >Cold <br/>Transport</a>
			 				</p>
			 			</div>
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_4.png">
			 				</a>
			 				<p class="pph-2" >
			 					<a >Marketing &<br/>Distribution</a>
			 				</p>
			 			</div>
			 		</div>

			 		<div class="pro-line">
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_5.png">
			 				</a>
			 				<p class="pph-2 oneline">
			 					<a >Wholesale</a>
			 				</p>
			 			</div>
			 			<div class="pro-item">
			 				<a >
			 					<img src="<?php echo $rootimg ?>icons/process_6.png">
			 				</a>
			 				<p class="pph-2 oneline" >
			 					<a >Retail</a>
			 				</p>
			 			</div>
			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
	<div class="other-info" style="position: relative;" id="contact-form">
		<div class="sub-info">
			<div class="getintouch">
				<div class="getintouch_in">
					<h4>Get in touch</h4>
					<p class="p_getintouch">
						<a href="http://www.ampc.com.au/" class="btn-start btn-am">Go to our website</a>
					</p>
					<p class="p_getintouch">
						<a href="tel:02 8908 5500" title="tel:02 8908 5500" class="btn-start btn-am">Call us</a>
					</p>
					<p class="p_getintouch">
						<a href="#" class="btn-start btn-am" id="getintouch">Email us</a>
					</p>
				</div>
			</div>
		</div>
		<div class="sub-info">
			<div class="download_now">
				<div class="txt_inner">
					<p class="pph-1">Read more in our</p>
					<h4>Sustainability report</h4>
					<img src="<?php echo $rootimg ?>/bg/inter_0.png">
					<div class="download_report">
	                    <a href="<?php echo $root?>assets/src/AMPC-SR16-Sustainability-Report.pdf" class="btn-now btn-am"  target="_blank">Download Now</a>
	                </div>
				</div>
			</div>
		</div>

		<div class="div-contact" style="position: absolute; top: 0; left: 0; width: 100%; z-index:10; display: none;">
			<div class="contact_in">
				<h4>Get in touch<button class="projectLightbox__closeButton pull-right" style="border: none; background:transparent;">×</button></h4>
				<form class="validate" action="/about" method="post" id="frmContact">
				<?php
					$name = !empty($_POST['firstname'])?$_POST['firstname']:'';
		            $email = !empty($_POST['email'])?$_POST['email']:'';
		            $message = !empty($_POST['message'])?$_POST['message']:'';
				?>	
					<div class="two-contact">
						<div class="col_contact">
							  <div class="line-contact">
							  	<p class="lbl">Name</p>
							   	<input type="text" class="input_ct" data-validation="required" name="firstname" id="firstname" data-validation-error-msg-required="Please enter a first name"  value="<?php echo $name; ?>"/>
							  </div>
							  <div class="line-contact">
							  	<p class="lbl">Email</p>
							   	<input name="email" type="text" class="input_ct" data-validation="required,email" data-validation-error-msg-required="Please enter an email" data-validation-error-msg-email="Please enter valid email" value="<?php echo $email; ?>"/>
							  </div>
							  <div class="line-contact">
							  	<div class="g-recaptcha" data-sitekey="6LeT3AgUAAAAADDuN5WLSfQhitOzH8GGeo3JJCJ8" style="transform:scale(0.83);-webkit-transform:scale(0.83);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
							  </div>					 
						</div>
						<div class="col_contact">
							  <div class="line-contact">
							    <p class="lbl">Message</p>
							    <textarea class="area_ct" name="message" data-validation="required" data-validation-error-msg-required="Please enter message"><?php echo $message; ?></textarea>
							  </div>
						</div>
						<p class="p-submit">
						    <input type="submit" class="btn-submit" name="submit" value="Submit">
						</p>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>

<script type="text/javascript">
	function alertmessage(msg){
		alert(msg);
	}
	$(function(){
		$('#getintouch').click(function(e){
			e.preventDefault();
			$('.div-contact').show(function(){
				$('body').append("<div id='mask' style='position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 5; background-color: rgba(0, 0, 0, .5);'></div>");
				$('html, body').animate({
                    scrollTop: $(".div-contact").offset().top
                }, 400);			
			});
		});

		$('.projectLightbox__closeButton').click(function(e){
			e.preventDefault();
			$('.div-contact').hide(function (){
				$('#mask').remove();
			})
		})
	})
</script>
<?php echo $scripts; ?>