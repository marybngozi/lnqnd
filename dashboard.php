<?php 
ob_start();
include 'includes/head.php';
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", "LnQ - Dashboard", $buffer);
echo $buffer; 
?>

<div class="container-fluid" id="dashbody" >
    <div id="above" class="col-sm-12">
    <p>
    <?php
        if(isset($_SESSION['user'])){
            echo "<b>Welcome <em>{$_SESSION['user']}</em></b>";
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
                    //$member_id = $member['id'];
                    mysqli_free_result($members);
                }		
            }
        }else {
            header("Location: index.php");
        }
    ?>
    &nbsp; &nbsp; &nbsp;&nbsp; 
    &curren;<span id="status">&nbsp;<?php if($member['status']){echo $member['status'];}
    else{echo " Hey am lnQing... ";}?></span> &curren;
    <button data-target="#statModal" data-toggle="modal" class="btn btn-sm">Update Status</button>
    </p>
    </div>

<div class="modal fade " id="statModal" tabindex="-1" role="dialog" aria-labelledby="regModal" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
            <button type="button" style="margin-right:5px;" class="close" data-dismiss="modal">&times;</button>
            <br>
            <div class="modal-body">
                <form role="form" action="" method="post"   >
                    <div class="form-group" >
                        Something you want to share...
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <input type="text" name="status" autofocus class="form-control" placeholder="How do you feel?" >
                        </div>
                    </div>

                    <center><input type="submit" style="background:#075032; color:#fff;" name="update" value="Update Status" id="reg-btn" class="btn" ></center>
                </form>
            </div>
        </div>
    </div>
</div> 

    <div id="frames" >
    <iframe src="includes/dashnav.php" id="leftframe" frameborder="0"></iframe>
    <iframe src="" name="rightframe" id="rightframe" frameborder="0"></iframe>
    </div>

</div>
<?php 
if (isset($_POST['update'])) {
    require_once "config/functions.php";
	$stat = secure($_POST['status']);
	if (!empty($stat)) {
        if (filter_var($stat, FILTER_SANITIZE_STRING)) {
            $update_sql = "update reg_details set status = '{$stat}' where username = '{$_SESSION['user']}'";
		    $update_result = mysqli_query($con, $update_sql);
		    if ($update_result > 0) {
			    header('Location: dashboard.php');
		    }
        }
	}
}
?>
<?php include "includes/footer.php";?>
