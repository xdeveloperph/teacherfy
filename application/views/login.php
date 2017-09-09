<form method="post">
<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h3 class="modal-title"><strong>Teacherfy Login</strong></h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <?php if(!empty($error)){ ?>
                    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                <?php } ?>
                <?php if(!empty($success)){ ?>
                    <div class="alert alert-success" role="alert"><?php echo $success ?></div>
                <?php } ?>
            </div>
            <div class="form-group">
                <div class="input-group">

                    <input type="email" class="form-control" id="user[email]" name="user[email]" placeholder="Email">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" id="user[password]" name="user[password]" placeholder="Password">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Login</button>

        </div>
    </div>
</div>

</form>
