<div class="modal fade " id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModal" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content" style="width:85%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title " style="color:#0c754a; font-size:20px; text-align:center; font-weight:bold;">
                REGISTER</h4>
            </div>
            <div class="modal-body" style=" ">
                <form role="form" action="config/process.php" method="post"   >
                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" size="50" name="name" autofocus class="form-control" placeholder="Enter Name" >
                        </div>
                        <span id="name_span"></span>
                    </div>

                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag icon"></i></span>
                        <input type="text" name="uname" size="50" class="form-control" placeholder="Enter username" >
                        </div>
                        <span id="uname_span"></span>
                    </div>
    
                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" name="email" size="50" class="form-control" placeholder="Enter email" >
                        </div>
                        <span id="email_span"></span>
                    </div>

                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone icon"></i></span>
                        <input type="text" name="phone" size="50" class="form-control" placeholder="Enter phone number" >
                        </div>
                    </div><br>

                    <div class="form-group" >
                        <label for="sex">Gender</label>&nbsp; &nbsp;
                        <label class="radio-inline"><input type="radio" value="male" name="sex" checked>Male</label>
                        <label class="radio-inline"><input type="radio" value="female" name="sex">Female</label>
                    </div>

                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="pword" size="50" class="form-control" placeholder="Enter password ~ must be greater than 6 characters">
                        </div>
                        <span id="pword_span"></span>
                    </div>

                    <div class="form-group" >
                        <div class="input-group" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="vpword" size="50" class="form-control" title="Confirm password entered" placeholder="Verify password" >
                        </div>
                        <span id="vpword_span"></span>
                    </div><br>

                    <div class="form-group form-inline" >
                        <label for="captcha">Security check: &nbsp;</label>
                        <?php 
                        $_SESSION['captext'] = str_shuffle(substr(rand(1000, 9999). 
                        str_shuffle('QWERTYGSMNXZPYFH'), rand(0,5), 6)); 

                        ?>
                        <img  src="includes/captcha.php" alt="captcha/"/><br><p id="validate"><?php echo $_SESSION['captext'];?></p>
                        <div class="input-group" style="margin-top:5px;" >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" name="captcha" id="cap" size="40" class="form-control " placeholder="Type characters here" >
                        </div>
                        <label id="validError">
                        <span style="color:maroon; font-size:18px" class="glyphicon glyphicon-remove-sign"></span>
                        </label>
                        <label id="validOk">
                        <span style="color:#075032; font-size:18px" class="glyphicon glyphicon-ok-sign"></span>
                        </label>
                        <label id="validBtn" style="background:#075032;
                                font-family:Trebuchet MS;
                                font-size:10px;
                                color:white;
                                padding:5px 5px;
                                border-radius:6px;
                                cursor:pointer;
                                ">validate &nbsp;<span class="glyphicon glyphicon-ok-circle"></span>
                        </label>
                    </div>

                    <center><input type="submit" style="background:#075032; color:#fff;" name="reg" value="Register" id="reg-btn" class="btn" ></center>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$('#validate').hide();
$('#validError').hide();
$('#validOk').hide();
$('#reg-btn').hide();

$(function(){
    $('#validBtn').click(function(){

        var userInput = $('#cap').val();
        var captcha = $('#validate').text();
       
        if (userInput.toUpperCase() == captcha) {
            $('#validBtn').hide();
            $('#validError').hide();
           $('#validOk').show();
            $('#reg-btn').show();
        } else {
            $('#validError').show();
        }
    });

});
</script>