
<?php include 'dashhead.php';?>
<div id="rightdash" class="col-sm-12">
    
    <div class="container" >
    <img id="imgbox" class="img-thumbnail img-responsive" src="<?php if(isset($_SESSION['user_pix'])){ echo $_SESSION['user_pix']; } ?>">
    </div>

    <form role="form" id="picform" action="" method="post" enctype="multipart/form-data">
    <div class="form group">
        <input type="file" class="form-control" name="profile_pix" title="Upload Profile Picture">
        <span class="help-block">image type: jpeg/png/jpg</span>
    </div> 
    <div class="form group">
        <input type="submit" class="btn" name="uploadpic" value="Update Picture" style="margin-left:140px; background:#075032; color:#fff;">   
        <span class="help-block"><?php if(isset($_SESSION['pic_err'])){echo $_SESSION['pic_err']; } ?></span>
    </div>
    </form>        
</div>
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
            $member_pp = $member['profile_picture'];
            $_SESSION['user_pix'] = "../uploads/".$member_pp;
			mysqli_free_result($members);
		}		
	}
}
?>
<?php 
if (isset($_POST['uploadpic']) && !empty($_POST['uploadpic'])) {

	//Uploading Profile Pic
	$dir = "../uploads/";
	$path = $dir.basename($_FILES['profile_pix']['name']);
    $file_type = $_FILES['profile_pix']['type'];
	if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/gif") {
		if (move_uploaded_file($_FILES['profile_pix']['tmp_name'], $path)) {
			$image_update_sql = "update reg_details set profile_picture = '{$_FILES['profile_pix']['name']}' where id = '{$member_id}'";
			$image_update_result = mysqli_query($con, $image_update_sql);
			if ($image_update_result > 0) {
                $_SESSION['user_pix'] = $path;
                echo $path;
                //echo "<script>alert('File upload successful');</script>";
                header("Refresh:3; url=uploadpic.php"); 
			}else{
				$_SESSION['pic_err'] = "File not uploaded";
			}			
        }else{
            $_SESSION['pic_err'] = "File not uploaded moved";
        }
	}else{
		$_SESSION['pic_err'] = "Select a Picture!";
	}
}  
?>
<?php 
    foreach($_SESSION as $key=>$value){
        if($key == "user" || $key == "user_pix"){
            continue;
        }
        unset($_SESSION[$key]);
    }
?>