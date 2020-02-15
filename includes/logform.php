<div class="modal fade " id="logModal" tabindex="-1" role="dialog" aria-labelledby="logModal" aria-hidden="true" >
    <div class="modal-dialog modal-sm" >
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title " style="color:#0c754a; font-size:20px; text-align:center; font-weight:bold;">LOGIN</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="config/process.php" method="post"   > 
                <div class="form-group" >
                    <div class="input-group" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="uname" class="form-control" placeholder="Enter username or email" >
                    </div>
                </div><br>

                <div class="form-group" >
                    <div class="input-group" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                    <input type="password" name="pword" class="form-control" placeholder="Enter password" >
                    </div>
                </div><br>

                <center><input type="submit" name="log" style="background:#075032; color:#fff;" value="Login" id="reg-btn" class="btn" ></center>
                </form>
            </div>
        </div>
    </div>
</div>