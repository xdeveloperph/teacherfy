
<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">When can you teach Online?</h4>
            </div>
            <form method="post">
                <div class="modal-body inner-data">
                    <?php if(!empty($error)){ ?>
                        <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                    <?php } ?>
                    <?php if(!empty($success)){ ?>
                        <div class="alert alert-success" role="alert"><?php echo $success ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label>When did you first start teaching (prior to Teacherfy)</label>
                        <input type="date" class="form-control col-md-2" name="data[start-teaching]" value="<?php echo isset($result['start-teaching'])?$result['start-teaching'] :"" ?>">
                    </div>
                    <div class="form-group">
                        <label >Who are you comfortable teaching?</label>
                        <div class="container-fluid">
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="data[male]" value="1" <?php echo isset($result['male'])?(($result['male'] == "1")? "checked":""):"" ?>> Male
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control"  name="data[male-from]" value="<?php echo isset($result['male-from'])?$result['male-from'] :"" ?>" placeholder="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="data[male-to]" value="<?php echo isset($result['male-to'])?$result['male-to'] :"" ?>" placeholder="99">
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="data[female]" value="1" <?php echo isset($result['female'])?(($result['female'] == "1")? "checked":""):"" ?>> Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="data[female-from]" placeholder="0" value="<?php echo isset($result['female-from'])?$result['female-from'] :"" ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="data[female-to]" placeholder="99" value="<?php echo isset($result['male-to'])?$result['female-to'] :"" ?>">
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <dcciv class="checkbox">
                                    <label>
                                        <input type="checkbox" name="data[special]" value="1" <?php echo isset($result['special'])?(($result['special'] == "1")? "checked":""):"" ?>> Yes, I can teach students with special needs
                                    </label>
                                </dcciv>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What is your gender? </label>
                        <select name="" class="form-control" name="data[gender]">
                            <option value="0">Female</option>
                            <option value="1">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Write a few words about yourself</label>
                        <textarea class="form-control" name="data[about] rows="3"><?php echo isset($result['about'])?$result['about'] :"" ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>