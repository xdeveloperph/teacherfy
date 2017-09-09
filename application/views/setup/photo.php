
<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show your smile!</h4>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body inner-data">
                    <?php if(!empty($error)){ ?>
                        <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                    <?php } ?>
                    <?php if(!empty($success)){ ?>
                        <div class="alert alert-success" role="alert"><?php echo $success ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Primary Photo:</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>