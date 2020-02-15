<?php
session_start();
require_once "functions.php";
if (isset($_POST['log']) || isset($_POST['reg'])) {
    $host = $_SERVER['SERVER_ADDR'];
    $user = "users";
    $pasword = "kM4rKZ3V5zYwxYB2";
    $database = "lnq";
    $con = mysqli_connect($host, $user, $pasword, $database);
    if (mysqli_errno($con)) {
        die("Error");
    }else{
        if (isset($_POST['log'])) {
            $usename = secure($_POST['uname']);
            $pword = $_POST['pword'];
            if (!empty($usename) && !empty($pword)) {
                $select_sql = "select * from reg_details";
                $select_query = mysqli_query($con, $select_sql);
                $user_found = 0;                        
                while ($member = mysqli_fetch_assoc($select_query)) {
                    if(($member['username'] === $usename || $member['email'] === $usename)  && password_verify($pword,$member['password'])){
                        $user_found++;
                    }  
                }
                if($user_found > 0){
                    $_SESSION['user'] = $usename;
                    //echo "done";
                    header("Location:../dashboard.php");
                }else{
                    echo "not done";
                    $_SESSION['login_stat'] = "Username or Password incorrect!";
                }
            }
        }elseif (isset($_POST['reg'])) {
            $name = secure($_POST['name']);
            $uname = secure($_POST['uname']);
            $email = secure($_POST['email']);
            $phone = secure($_POST['phone']);
            $gend = secure($_POST['sex']);
            $pword = $_POST['pword'];
            $vpword = $_POST['vpword'];
            $capcha = strtoupper($_POST['captcha']);
            $_SESSION['name'] = $name; $_SESSION['uname'] = $uname; 
            $_SESSION['email'] = $email; $_SESSION['phone'] = $phone;
            $secured = validate($name,$uname,$email,intval($phone),$gend,$pword,$capcha);
            if ($secured) {
                if ($pword == $vpword) {
                    $hash_pword = password_hash($pword,PASSWORD_DEFAULT);
                    if ($capcha == $_SESSION['captext']) {
                       
            $select_sql = "select * from reg_details";
            $select_query = mysqli_query($con, $select_sql);

            if ($select_query) {
                while ($member = mysqli_fetch_assoc($select_query)) {
                    if ($member['username'] === $uname) {
                        $_SESSION['usn_exist'] = "Username already used!";
                    }elseif ($member['email'] === $email) {				
                        $_SESSION['email_exist'] = "Email exists!";
                    }elseif ($member['phone'] === $phone) {
                        $_SESSION['num_exist'] = "Phone Number exists!";
                    }else{

                    }
                }
            }
            if(!isset($_SESSION['usn_exist']) && !isset($_SESSION['email_exist']) 
            && !isset($_SESSION['num_exist'])){
                $dated = date('Y-m-d H:i:s');
                $insert_sql = "insert into `reg_details` (
                    `name`, `username`, `email`, `phone`, `gender`, `password`, `date_reg`
                    )values(
                        '{$name}', '{$uname}', '{$email}', '{$phone}', '{$gend}', '{$hash_pword}', '{$dated}')";
            $insert_query = mysqli_query($con, $insert_sql);

            if(mysqli_affected_rows($con) > 0){
                $_SESSION['user'] = $uname;
                //echo "Successful";
                header("Location:../dashboard.php");
            }else{
                echo "<span style='color:red;'>Not Successful!</span>";
            }
            }else {
            // echo "Details exist already";
                header("Location:../index.php");
            }
                            }else {
                                echo "You are a roboto";
                            }
                        }else {
                            $_SESSION['pword-mismatch'] = "Password Mismatch";
                            echo $_SESSION['pword-mismatch'];
                        }
                    }else {
                        header("Location:../index.php");
                        //echo "find out how to activate the modal - refresh";
                    }
        }else {
            # code...
        }
    }
}else {
    header("Location: ../index.php");
}
?>
   
<?php 
    foreach($_SESSION as $key=>$value){
        if($key == "captext" || $key == "user"){
            continue;
        }
        unset($_SESSION[$key]);
    }
?>