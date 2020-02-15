<?php include 'dashhead.php';?>
<div id="leftdash" class="">
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
                //var_dump($member_pp);
                $_SESSION['user_pic'] = $member_pp;
                mysqli_free_result($members);
            }		
        }
    }
    ?>
    <div id="leftimg">
        <center>
            <img src="../uploads/<?php if(isset($_SESSION['user_pic'])){
                echo $_SESSION['user_pic']; }
                else{echo "{$member['gender']}.png";} ?>" alt="profiile-pics" class="img-thumbnail img-responsive">      
        </center>
    </div>   
    <div class="row" id="leftnav">
        <nav class="col-sm-2" id="myScrollspy">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="uploadpic.php" target="rightframe">Upload Profile Picture</a></li>
                <li><a href="editprofile.php" target="rightframe">Edit Profile</a></li>
                <li><a href="#" target="rightframe">Active Chats<span class="badge">5</span></a></li>
                <li><a href="#" target="rightframe">Inbox<span class="badge">5</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1"> Groups 
                        <span class="badge">5</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu " role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" target="rightframe" href="#">HTML</a></li>
                        <li role="presentation"><a role="menuitem" target="rightframe" href="#">CSS</a></li>
                        <li role="presentation"><a role="menuitem" target="rightframe" href="#">JavaScript</a></li>
        
                    </ul>
                </li>
                <li><a href="#" target="rightframe">Archive<span class="badge">5</span></a></li>
               
        
            </ul>
        </nav>
    </div>
</div>

 