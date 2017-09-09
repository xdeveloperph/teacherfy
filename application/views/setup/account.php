<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">What service will you use to teach online?</h4>
            </div>
            <form method="post">
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
                        <label for="data[]">Skype</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['skype'])?$result['skype'] :"" ?>" id="data[skype]" name="data[skype]" placeholder="Username / Email">
                    </div>
                    <div class="form-group">
                        <label for="data[]">Google Hangouts</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['gh'])?$result['gh'] :"" ?>" id="data[gh]" name="data[gh]" placeholder="Username / Email" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Apple FaceTime</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['af'])?$result['af'] :"" ?>" id="data[af]" name="data[af]" placeholder="Username / Email" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Others</label>
                        <input type="text" class="form-control" value="<?php echo isset($others[0]['app'])?$others[0]['app'] :"" ?>" id="sub[othersapp]" name="sub[othersapp]" placeholder="Application" required>
                        <input type="text" class="form-control" value="<?php echo isset($others[0]['username'])?$others[0]['username'] :"" ?>" id="sub[othersacc]" name="sub[othersacc]" placeholder="Username / Email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
