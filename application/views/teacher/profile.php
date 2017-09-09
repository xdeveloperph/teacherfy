    <?php  ?>
    <div class="col-md-8 left-border mh700">
        <!-- About section -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">About</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Ages to Taught (Male)</td>
                                <td>
                                    <?php echo isset($about['male-from'])?$about['male-from'] :"" ?> to
                                    <?php echo isset($about['male-to'])?$about['male-to'] :"" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ages to Taught (Female)</td>
                                <td>
                                    <?php echo isset($about['female-from'])?$about['female-from'] :"" ?> to
                                    <?php echo isset($about['female-to'])?$about['female-to'] :"" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Special Need</td>
                                <td><?php echo isset($about['special'])?(($about['special'] == "1")? "Yes":"No"):"No" ?></td>
                            </tr>
                            <tr>
                                <td>Teaching Since</td>
                                <td><?php echo isset($about['start-teaching'])?$about['start-teaching'] :"" ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo isset($about['gender'])?(($about['gender'] == "0")? "Female":"Male"):"" ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo isset($about['about'])?$about['about'] :"" ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- Experience section -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Experience</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#mexperience">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($explist)){ ?>
                        <?php foreach($explist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['title'] ?></strong></h4>
                                    <div><?php echo $item['company'] ?></div>
                                    <div><?php echo $item['from'] ?> - <?php echo $item['to'] ?></div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/exp/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/exp-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <p class="col-md-12"><?php echo $item['description'] ?></p>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($explist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php }else ?>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- Languange Spoken section -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Languange Spoken</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#mlanguange">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($langlist)){ ?>
                        <?php foreach($langlist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['language'] ?></strong></h4>
                                    <div>
                                        <?php
                                        switch($item['level']){
                                            case"1":
                                                echo "Limited Proficiency";
                                                break;
                                            case"2":
                                                echo "Professional Proficiency";
                                                break;
                                            case"3":
                                                echo "Fluent / Native Proficiency";
                                                break;
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/lang/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/lang-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($langlist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- Education -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Education</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#meducation">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($edulist)){ ?>
                        <?php foreach($edulist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['degree'] ?></strong></h4>
                                    <div><?php echo $item['school'] ?></div>
                                    <div><?php echo $item['start'] ?> - <?php echo $item['end'] ?></div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/edu/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/edu-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <p class="col-md-12"><?php echo $item['details'] ?></p>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($edulist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- certification -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Certification</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#mcertification">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($certlist)){ ?>
                        <?php foreach($certlist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['certification'] ?></strong></h4>
                                    <div><?php echo $item['institute'] ?></div>
                                    <div><?php echo $item['recieved'] ?></div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/cert/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/cert-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <p class="col-md-12"><?php echo $item['dscription'] ?></p>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($certlist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- award -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Awards</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#mawards">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($awardlist)){ ?>
                        <?php foreach($awardlist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['title'] ?></strong></h4>
                                    <div><?php echo $item['issuer'] ?></div>
                                    <div><?php echo $item['recieved'] ?></div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/award/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/award-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <p class="col-md-12"><?php echo $item['description'] ?></p>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($awardlist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        <!-- affiliation -->
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-8">
                        <h4 class="modal-title">Affiliation</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-default btn-xs text-right bt-modal" data-toggle="modal" data-target="#maffiliation">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <?php if(isset($afflist)){ ?>
                        <?php foreach($afflist as $item){ ?>
                            <div class="container-fluid">
                                <div class="col-md-8">
                                    <h4><strong><?php echo $item['organization'] ?></strong></h4>
                                    <div><?php echo $item['join'] ?></div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?php echo base_url()."teacher/profile/aff/".$item['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo base_url()."teacher/profile/aff-del/".$item['id'] ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                                <hr>
                            </div>
                        <?php } ?>
                        <?php if(empty($afflist)){ ?>
                            <div class="alert alert-warning text-center" role="alert">There are no current information available.</div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div

<!-- About -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">About</h4>
            </div>
            <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                <div class="modal-body inner-data">


                    <div class="form-group">
                        <label>When did you first start teaching (prior to Teacherfy)</label>
                        <input type="date" class="form-control col-md-2" name="about[start-teaching]" value="<?php echo isset($about['start-teaching'])?$about['start-teaching'] :"" ?>">
                    </div>
                    <div class="form-group">
                        <label >Who are you comfortable teaching?</label>
                        <div class="container-fluid">
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="about[male]" value="1" <?php echo isset($about['male'])?(($about['male'] == "1")? "checked":""):"" ?>> Male
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control"  name="about[male-from]" value="<?php echo isset($about['male-from'])?$about['male-from'] :"" ?>" placeholder="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="about[male-to]" value="<?php echo isset($about['male-to'])?$about['male-to'] :"" ?>" placeholder="99">
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-md-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="about[female]" value="1" <?php echo isset($about['female'])?(($about['female'] == "1")? "checked":""):"" ?>> Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="about[female-from]" placeholder="0" value="<?php echo isset($about['female-from'])?$about['female-from'] :"" ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="about[female-to]" placeholder="99" value="<?php echo isset($about['male-to'])?$about['female-to'] :"" ?>">
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <dcciv class="checkbox">
                                    <label>
                                        <input type="checkbox" name="about[special]" value="1" <?php echo isset($about['special'])?(($about['special'] == "1")? "checked":""):"" ?>> Yes, I can teach students with special needs
                                    </label>
                                </dcciv>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What is your gender? </label>
                        <select class="form-control" name="about[gender]">
                            <option value="0" <?php echo isset($about['gender'])?(($about['gender'] == "0")? "selected":""):"" ?>>Female</option>
                            <option value="1" <?php echo isset($about['gender'])?(($about['gender'] == "1")? "selected":""):"" ?>>Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Write a few words about yourself</label>
                        <textarea class="form-control" name="about[about] rows="3"><?php echo isset($about['about'])?$about['about'] :"" ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default reset">Clear</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- experience -->
<div class="modal fade" id="mexperience" tabindex="-1" role="dialog" aria-labelledby="mexperience">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Experience</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="exp[id]" value="<?php echo isset($exp['id'])?$exp['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Job Title*</label>
                            <input type="text" class="form-control col-md-2" name="exp[title]" value="<?php echo isset($exp['title'])?$exp['title'] :"" ?>">
                        </div>
                        <div class="form-group">
                            <label>Company Name*</label>
                            <input type="text" class="form-control col-md-2" name="exp[company]" value="<?php echo isset($exp['company'])?$exp['company'] :"" ?>">
                        </div>
                        <div class="form-group">
                            <label>Time Period*</label>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="date" class="form-control col-md-2" name="exp[from]" value="<?php echo isset($exp['from'])?$exp['from'] :"" ?>">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control col-md-2" name="exp[to]" value="<?php echo isset($exp['to'])?$exp['to'] :"" ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="exp[workhere]" <?php echo isset($exp['workhere'])?(($exp['workhere'] == "1")? "checked":""):"" ?>> Currently work here
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="exp[description]"><?php echo isset($exp['description'])?$exp['description'] :"" ?></textarea>
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

    <!-- languanges -->
    <div class="modal fade" id="mlanguange" tabindex="-1" role="dialog" aria-labelledby="mlanguange">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Language Spoken</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="lang[id]" value="<?php echo isset($lang['id'])?$lang['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Language*</label>
                            <input type="text" class="form-control" name="lang[language]" value="<?php echo isset($lang['language'])?$lang['language'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Proficiency Level*</label>
                            <select class="form-control" name="lang[level]" required>
                                <option value="1" <?php echo isset($lang['level'])?(($lang['level'] == "1")? "selected":""):"selected" ?>>Limited Proficiency</option>
                                <option value="2" <?php echo isset($lang['level'])?(($lang['level'] == "2")? "selected":""):"" ?>>Professional Proficiency</option>
                                <option value="3" <?php echo isset($lang['level'])?(($lang['level'] == "3")? "selected":""):"" ?>>Fluent / Native Proficiency</option>
                            </select>
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
    <!-- Education -->
    <div class="modal fade" id="meducation" tabindex="-1" role="dialog" aria-labelledby="meducation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Education</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="edu[id]" value="<?php echo isset($edu['id'])?$edu['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Degree & Field of Study*</label>
                            <input type="text" class="form-control" name="edu[degree]" value="<?php echo isset($edu['degree'])?$edu['degree'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>School Name*</label>
                            <input type="text" class="form-control" name="edu[school]" value="<?php echo isset($edu['school'])?$edu['school'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Dates Attended*</label>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="date" class="form-control col-md-2" name="edu[start]" value="<?php echo isset($edu['start'])?$edu['start'] :"" ?>">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control col-md-2" name="edu[end]" value="<?php echo isset($edu['end'])?$edu['end'] :"" ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="edu[attending]" <?php echo isset($edu['attending'])?(($edu['attending'] == "1")? "checked":""):"" ?>> Currently work here
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="edu[details]"><?php echo isset($edu['details'])?$edu['details'] :"" ?></textarea>
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
    <!-- Certification -->
    <div class="modal fade" id="mcertification" tabindex="-1" role="dialog" aria-labelledby="mcertification">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Certification</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="cert[id]" value="<?php echo isset($cert['id'])?$cert['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Certification*</label>
                            <input type="text" class="form-control" name="cert[certification]" value="<?php echo isset($cert['certification'])?$cert['certification'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Name of Granting Institution*</label>
                            <input type="text" class="form-control" name="cert[institute]" value="<?php echo isset($cert['institute'])?$cert['institute'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Date Received*</label>
                            <input type="date" class="form-control" name="cert[recieved]" value="<?php echo isset($cert['recieved'])?$cert['recieved'] :"" ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="cert[dscription]"><?php echo isset($cert['dscription'])?$cert['dscription'] :"" ?></textarea>
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
    <!-- Award -->
    <div class="modal fade" id="mawards" tabindex="-1" role="dialog" aria-labelledby="mawards">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Award</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="award[id]" value="<?php echo isset($award['id'])?$award['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Title*</label>
                            <input type="text" class="form-control" name="award[title]" value="<?php echo isset($award['title'])?$award['title'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Issuer*</label>
                            <input type="text" class="form-control" name="award[issuer]" value="<?php echo isset($award['issuer'])?$award['issuer'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Date Received*</label>
                            <input type="date" class="form-control" name="award[recieved]" value="<?php echo isset($award['recieved'])?$award['recieved'] :"" ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="award[description]"><?php echo isset($award['description'])?$award['description'] :"" ?></textarea>
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

    <!-- affiliation -->
    <div class="modal fade" id="maffiliation" tabindex="-1" role="dialog" aria-labelledby="maffiliation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Affiliation</h4>
                </div>
                <form method="post" action="<?php echo base_url()."teacher/profile/" ?>">
                    <input type="hidden" name="aff[id]" value="<?php echo isset($aff['id'])?$aff['id'] :"" ?>">
                    <div class="modal-body inner-data">
                        <div class="form-group">
                            <label>Name of Organization*</label>
                            <input type="text" class="form-control" name="aff[organization]" value="<?php echo isset($aff['organization'])?$aff['organization'] :"" ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Date Received*</label>
                            <input type="date" class="form-control" name="aff[join]" value="<?php echo isset($aff['join'])?$aff['join'] :"" ?>">
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
            if(isset($exp['id'])){
                echo "$('#mexperience').modal('show');";

            }
            if(isset($lang['id'])){
                echo "$('#mlanguange').modal('show');";
            }
            if(isset($edu['id'])){
                echo "$('#meducation').modal('show');";
            }
            if(isset($cert['id'])){
                echo "$('#mcertification').modal('show');";
            }
            if(isset($award['id'])){
                echo "$('#mawards').modal('show');";
            }
            if(isset($aff['id'])){
                echo "$('#maffiliation').modal('show');";
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