<?php
// session_start();
// if (isset($_POST['submit']))
//{
//    if(($_POST['captchacode']) == $_SESSION['captchacode'])
//        { // Do process the other submitted form data 
//        }
//    else
//        { $_SESSION['error']= "The Captcha code is wrong. Try again.";
//        // redirect to another page or to the form page again
//        header("index.php"); // this is a link back to our regform.php
//        exit();
//    }
//}
?> 
<?php
include 
$email = $_POST['useremail'];
$password = $_POST['userpassword'];
$confirmpassword = $_POST['confirmpasswork'];
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
$confirmpassword = mysql_real_escape_string($confirmpassword);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_val($email, FILTER_VALIDATE_EMAIL))
{
    
}
else
{
    header('Location: http://f2fd.com/f2fd_main');
}
?>

