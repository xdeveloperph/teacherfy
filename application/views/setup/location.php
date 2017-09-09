
<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Where do you teach?</h4>
                <small>Now It's to set up your teaching locations</small>
            </div>
            <form method="post">
                <div class="modal-body">

                    <?php if(!empty($error)){ ?>
                        <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                    <?php } ?>
                    <?php if(!empty($success)){ ?>
                        <div class="alert alert-success" role="alert"><?php echo $success ?></div>
                    <?php } ?>
                    <div id="accordion">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="data[home]" value="1" <?php echo isset($setup['home'])?(($setup['home'] == 1)? "checked":"" ): ""; ?>> Your Location
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="data[studenthome]" value="1" <?php echo isset($setup['studenthome'])?(($setup['studenthome'] == 1)? "checked":"" ): ""; ?>> Student Home
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="data[online]" value="1" <?php echo isset($setup['online'])?(($setup['online'] == 1)? "checked":"" ): ""; ?>> Online
                            </label>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
