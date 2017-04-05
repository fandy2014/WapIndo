<?php 
$your_email ='hostid.us@gmail.com';

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="Website activity";
		$from = $visitor_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $name submitted the contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		echo '<script type="text/javascript">alert("INFO: Success!!");</script>';

	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<?php
$title='Contact Us WapIndo.Net';
include 'inc/head.php';
echo'<link rel="stylesheet" type="text/css" href="/css/contact.css"/>';
?><h3 class="biru"> Contact Us WapIndo.Net </h3>
<div class="menu"><h1 class="title"> Admin WapIndo </h1></div><div class="menu" style="display: block !important; visibility: visible !important;"><a href="http://www.google.com/search?sitesearch=wapindo.net" target="_blank"><img src="http://www.google.com/uds/css/small-logo.png" style="float:right;"></a><br><br><b>
<div id="contact-area">
<div id='contact_form_errorloc' class='err'></div>
<form method="POST" name="contact_form" 
action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
<?php
if(!empty($errors)){
echo "<div class='err'><font color='red'><b>".nl2br($errors)."</font></b>";
}
?>
</br>
<input type="text" name="name" placeholder='Name' value='<?php echo htmlentities($name) ?>'>
</br>
<input type="text" name="email" placeholder='Email' value='<?php echo htmlentities($visitor_email) ?>'>
</br>
<textarea name="message" placeholder='Your Message' rows=8 cols=30><?php echo htmlentities($user_message) ?></textarea>
</br>
<img src="/inc/captcha.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
<label for='message'>Enter the code :</label><br>
<input id="6_letters_code" name="6_letters_code" type="text"><br>
<small>Click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
</br>
<input type="submit" value="Submit" name='submit'>
</form>
<script language="JavaScript">
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</div>
</div>
<?php
include 'inc/foot.php';
?>