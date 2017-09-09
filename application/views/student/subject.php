<div class="col-md-10 mh90">
    <div class="p20 left-border mh700">
        <div class="pt20">
            <a href="<?php echo base_url().'cms/create/subject' ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Subject</a>
        </div>
        <div class="pt20">
            <?php if(!empty($error)){ ?>
                <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
            <?php } ?>
            <?php if(!empty($success)){ ?>
                <div class="alert alert-success" role="alert"><?php echo $success ?></div>
            <?php } ?>
        </div>
        <table class="table">
            <caption>Subject</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Lesson</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($result)){
                $x = 1;
                ?>

                <?php foreach($result as $item){ ?>
                    <tr>
                        <td><?php echo $x ?></td>
                        <td>
                            <?php
                            if(!empty($item['photo'])){
                                echo '<img src="'.$item['photo'] .'" class="avatar">';
                            }
                            ?>
                        </td>
                        <td><?php echo $item['ln'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['description'] ?></td>
                        <td>
                            <a href="<?php echo base_url().'cms/update/subject/'.$item['id'].'/' ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            <?php if($item['disable'] == '1'){ ?>
                                <a href="<?php echo base_url().'cms/status/subject/'.$item['id'].'/enable' ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span> Enable</a>
                            <?php }else{?>
                                <a href="<?php echo base_url().'cms/status/subject/'.$item['id'].'/disable' ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Disable</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $x++;
                } ?>
            <?php } ?>

            </tbody>
        </table>
    </div>

</div>
</div>