    <div class="col-md-8">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Student Questionnaire</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#meducation">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($sqlist)){
                        $qcount= 1;
                        ?>

                        <?php foreach($sqlist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                   <strong><?php echo $qcount ?>. <?php echo $item['question'] ?></strong>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/questionnaire/sq/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/questionnaire/sq-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <hr>
                            </div>
                        <?php  $qcount++;} ?>
                        <?php if(empty($sqlist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
    <div class="modal fade" id="meducation" tabindex="-1" role="dialog" aria-labelledby="meducation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Student Questionnaire</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/questionnaire/" ?>">
                    <input type="hidden" name="sq[id]" value="<?php echo isset($sq['id'])?$sq['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Question*</label>
                            <input type="text" class="form-control" name="sq[question]" value="<?php echo isset($sq['question'])?$sq['question'] :"" ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default reset">Clear</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            <?php
                if(isset($sq['id'])){
                    echo "$('#meducation').modal('show');";
                }

            ?>

            $('.bt-modal').click(function() {
                clear_form_elements('modal-content');
            });

            $('.reset').click(function() {
                clear_form_elements('modal-content');
            });

            function clear_form_elements(class_name) {
                jQuery("."+class_name).find(':input').each(function() {
                    switch(this.type) {
                        case 'password':
                        case 'text':
                        case 'textarea':
                        case 'file':
                        case 'select-one':
                        case 'hidden':
                        case 'select-multiple':
                            jQuery(this).val('');
                            break;
                        case 'checkbox':
                        case 'radio':
                            this.checked = false;
                    }
                });
            }
        });
    </script>