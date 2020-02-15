<?php
//ini_set('display_errors', '0');
function secure($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data; 
}

function isempty($name, $username, $email, $number, $gender,$password, $captcha ){
    if (empty($name)) {
       $_SESSION['empty_name'] = "Please input your Awesome Name";
       return false;
    }elseif (empty($username)) {
        $_SESSION['empty_uname'] = "Username cannot be Empty!";
        return false;
    }elseif (empty($email)) {
        $_SESSION['empty_email'] = "Email cannot be Empty!";
        return false;
    }elseif (empty($number)) {
        $_SESSION['empty_number'] = "Phone number cannot be Empty!";
        return false;
    }elseif (empty($gender)) {
        $_SESSION['empty_gender'] = "Please Choose your Awesome gender";
        return false;
    }elseif (empty($password)) {
        $_SESSION['empty_password'] = "Password cannot be Empty!";
        return false;
    }elseif (strlen($password) < 6) {
        $_SESSION['short_password'] = "Password too Short!";
        return false;
    }elseif (empty($captcha)) {
        $_SESSION['empty_captcha'] = "Security field Empty!";
        return false;
    }else {
        return true;
    }
}

function validate($name, $username, $email, $number, $gender, $password, $captcha){
    if(isempty($name, $username, $email, $number, $gender, $password, $captcha)){
        
        if(filter_var($name, FILTER_SANITIZE_STRING)){   
            if (filter_var($username, FILTER_SANITIZE_STRING)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($email, FILTER_SANITIZE_EMAIL)) {
                    if (filter_var($number, FILTER_VALIDATE_INT)) {
                        if (filter_var($captcha, FILTER_SANITIZE_STRING)) {
                            return true;
                        }else {
                            return false;
                        }
                    }else {
                        return false;
                    }
                }else {
                    return false;
                }
            }else {
                return false;
            }
            
        }else {
            return false;
        }
    }
}
?>
