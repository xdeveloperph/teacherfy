    <div class="col-md-8 left-border mh700">

        <div>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">What do you teach?</h4>
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

                                <?php if(isset($result)){ ?>
                                    <?php foreach($result as $item){?>
                                        <h1> <?php echo $item['name'] ?> </h1>
                                        <div>
                                            <ul>
                                                <?php foreach($item['sub'] as $subitem){?>
                                                    <?php
                                                    $checked="";
                                                    if(array_search($subitem['id'], array_column($tsubject, 'subjectid'))>-1){
                                                        $checked="checked";
                                                    }
                                                    ?>
                                                    <li>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="data[]" value="<?php echo $subitem['id'] ?>" <?php echo $checked ?>><?php echo $subitem['name'] ?>
                                                            </label>
                                                        </div>
                                                    </li>

                                                <?php }?>

                                            </ul>

                                        </div>
                                    <?php }?>
                                <?php }?>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script>
            $( "#accordion" ).accordion({
                heightStyle: "content"
            });

        </script>
    </div>
</div>

