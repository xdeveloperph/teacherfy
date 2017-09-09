<div class="col-md-8 left-border mh700">

    <div class="modal-dialog modal-lg">
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
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <div class="modal-dialog  modal-lg">
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
                        <input type="text" class="form-control" value="<?php echo isset($account['skype'])?$account['skype'] :"" ?>" id="data[skype]" name="data[skype]" placeholder="Username / Email">
                    </div>
                    <div class="form-group">
                        <label for="data[]">Google Hangouts</label>
                        <input type="text" class="form-control" value="<?php echo isset($account['gh'])?$account['gh'] :"" ?>" id="data[gh]" name="data[gh]" placeholder="Username / Email" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Apple FaceTime</label>
                        <input type="text" class="form-control" value="<?php echo isset($account['af'])?$account['af'] :"" ?>" id="data[af]" name="data[af]" placeholder="Username / Email" required>
                    </div>
                    <div class="form-group">
                        <label for="data[]">Others</label>
                        <input type="text" class="form-control" value="<?php echo isset($others[0]['app'])?$others[0]['app'] :"" ?>" id="sub[othersapp]" name="sub[othersapp]" placeholder="Application" required>
                        <input type="text" class="form-control" value="<?php echo isset($others[0]['username'])?$others[0]['username'] :"" ?>" id="sub[othersacc]" name="sub[othersacc]" placeholder="Username / Email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <div class="modal-dialog modal-lg">
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
                        <label for="address[]">Location</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['location'])?$address['location'] :"" ?>" id="address[location]" name="address[location]" placeholder="Location Name">
                    </div>
                    <div class="form-group">
                        <label for="address[]">Street Address</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['street'])?$address['street'] :"" ?>" id="address[street]" name="address[street]" placeholder="Street Address" required>
                    </div>
                    <div class="form-group">
                        <label for="address[]">Apt./Suite</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['suite'])?$address['suite'] :"" ?>" id="address[suite]" name="address[suite]" placeholder="Apt./Suite" required>
                    </div>
                    <div class="form-group">
                        <label for="address[]">Country</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['country'])?$address['country'] :"" ?>" id="address[country]" name="address[country]" placeholder="Country" required>
                    </div>
                    <div class="form-group">
                        <label for="address[]">State</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['state'])?$address['state'] :"" ?>" id="address[state]" name="address[state]" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label for="address[]">City</label>
                        <input type="text" class="form-control" value="<?php echo isset($address['city'])?$address['city'] :"" ?>" id="address[city]" name="address[city]" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label for="address[]">Zip</label>
                        <input type="number" class="form-control" value="<?php echo isset($address['zip'])?$address['zip'] :"" ?>" id="address[zip]" name="address[zip]" placeholder="Zip" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</div>

