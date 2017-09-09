
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
                    <input type="hidden" name="data[id][]" value="" >
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Day</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="data[day][]">
                                    <option value="m">Monday</option>
                                    <option value="t">Tuesday</option>
                                    <option value="w">Wednesday</option>
                                    <option value="th">Thursday</option>
                                    <option value="f">Friday</option>
                                    <option value="sa">Saturday</option>
                                    <option value="su">Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Start Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="data[start][]" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">End Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="data[end][]" >
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addsched" >Add Schedule</button>
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="hide template-main">
    <div class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Day</label>
            <div class="col-sm-10">
                <select class="form-control" name="data[day][]">
                    <option value="m">Monday</option>
                    <option value="t">Tuesday</option>
                    <option value="w">Wednesday</option>
                    <option value="th">Thursday</option>
                    <option value="f">Friday</option>
                    <option value="sa">Saturday</option>
                    <option value="su">Sunday</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Start Time</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" name="data[start][]" >
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">End Time</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" name="data[end][]" >
            </div>
        </div>
    </div>
    <hr>
</div>
<script>
    $( document ).ready(function() {
        $( "#addsched" ).click(function() {
            $( ".inner-data" ).append( $( ".template-main" ).html());
        });
    });
</script>