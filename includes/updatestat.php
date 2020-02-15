<?php include 'dashhead.php';?>
<div class="modal fade " id="statModal" tabindex="-1" role="dialog" aria-labelledby="regModal" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content" style="width:85%;">
            <div class="modal-body" style=" ">
                <div id="rightdash" class="col-sm-12">
                    <div class="container fluid" style="width:80%;">
                        <h5 style="color:#0c754a; font-size:20px; font-weight:bold;">Edit Status</h5>
                        
                        <form role="form" action="" method="post"   >
                            <div class="form-group" >
                                <div class="input-group" >
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <input type="text" name="status" autofocus class="form-control" placeholder="How do you feel?" >
                                </div>
                                <span id="name_span"></span>
                            </div>

                            <center><input type="submit" style="background:#075032; color:#fff;" name="update" value="Update Status" id="reg-btn" class="btn" ></center>
                        </form>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>