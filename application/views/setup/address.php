<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Whats your teaching address?</h4>
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
                        <label for="data[]">Location</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['location'])?$result['location'] :"" ?>" id="data[location]" name="data[location]" placeholder="Location Name">
                    </div>
                    <div class="form-group">
                        <label for="data[]">Street Address</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['street'])?$result['street'] :"" ?>" id="data[street]" name="data[street]" placeholder="Street Address" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Apt./Suite</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['suite'])?$result['suite'] :"" ?>" id="data[suite]" name="data[suite]" placeholder="Apt./Suite" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Country</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['country'])?$result['country'] :"" ?>" id="data[country]" name="data[country]" placeholder="Country" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">State</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['state'])?$result['state'] :"" ?>" id="data[state]" name="data[state]" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">City</label>
                        <input type="text" class="form-control" value="<?php echo isset($result['city'])?$result['city'] :"" ?>" id="data[city]" name="data[city]" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Zip</label>
                        <input type="number" class="form-control" value="<?php echo isset($result['zip'])?$result['zip'] :"" ?>" id="data[zip]" name="data[zip]" placeholder="Zip" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
