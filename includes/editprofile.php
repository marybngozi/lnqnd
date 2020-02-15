<?php include 'dashhead.php';?>

<?php
if (isset($_SESSION['user'])) {
    $host = $_SERVER['SERVER_ADDR'];
    $user = "users";
    $pasword = "kM4rKZ3V5zYwxYB2";
    $database = "lnq";
	$con = mysqli_connect($host, $user, $pasword, $database);
	if (mysqli_connect_errno()) {
		exit();
	}else{
		$sql = "select * from reg_details where username = '{$_SESSION['user']}'";
		$members = mysqli_query($con, $sql);
		if (mysqli_affected_rows($con) > 0) {
			$member = mysqli_fetch_assoc($members);
			$member_id = $member['id'];
			mysqli_free_result($members);
		}		
	}
}
?>

<div id="rightdash" class="col-sm-12">
    <div class="container fluid" style="width:80%;">
        <h4 style="color:#0c754a; font-size:20px; text-align:center; font-weight:bold;">EDIT PROFILE</h4><br><br>
        <form role="form" action="" method="post"   >
            <input type="hidden" name="user_id" value="<?php  echo $member['id']; ?>">
            <div class="form-group" >
                <div class="input-group" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="name" autofocus class="form-control" value="<?php echo $member['name'] ?>" >
                </div>
                <span id="name_span"></span>
            </div><br>

            <div class="form-group" >
                <div class="input-group" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="email" class="form-control" value="<?php echo $member['email'] ?>" >
                </div>
                <span id="email_span"></span>
            </div><br>

            <div class="form-group" >
                <div class="input-group" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone icon"></i></span>
                <input type="text" name="phone" class="form-control" value="<?php echo $member['phone'] ?>" >
                </div>
            </div><br><br>

            <center><input type="submit" style="background:#075032; color:#fff;" name="update" value="Update Profile" id="reg-btn" class="btn" ></center>
        </form>
    </div>     
</div>

<?php 

if (isset($_POST['update'])) {
    require_once "../config/functions.php";
	/* 
	Validate the input before updating the user's record
	*/
	$member_id = $_POST['user_id'];
	$name = secure($_POST['name']);
	$email = secure($_POST['email']);
	$phone = secure($_POST['phone']);

	if (!empty($member_id) && !empty($name) && !empty($email) && !empty($phone)) {
        if (filter_var($name, FILTER_SANITIZE_STRING)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($email, FILTER_SANITIZE_EMAIL)) {
                if (filter_var(intval($phone), FILTER_VALIDATE_INT)) {
                    $update_sql = "update reg_details set name = '{$name}', email = '{$email}', phone = '{$phone}' where id = '{$member_id}'";
		            $update_result = mysqli_query($con, $update_sql);
		            if ($update_result > 0) {
			        header('refresh: 1 editprofile.php');
		            }  
                }
            }
        }
	}
}
?>