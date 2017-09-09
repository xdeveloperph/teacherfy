<div class="col-md-10 ">
    <div class="p20 left-border mh700">
        <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
                <h3>Lesson Form</h3>
            </div>
            <?php if(!empty($error)){ ?>
                <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
            <?php } ?>
            <?php if(!empty($success)){ ?>
                <div class="alert alert-success" role="alert"><?php echo $success ?></div>
            <?php } ?>
            <form method="post" enctype="multipart/form-data" >
                <input name="data[id]" id="data[id]" value="<?php if(isset($result)) echo $result['id']; ?>" type="hidden" >
                <div class="form-group">
                    <label>Subject</label>
                    <input id="data[name]" name="data[name]" placeholder="Subject" type="text" class="form-control" value="<?php if(isset($result)) echo $result['name']; ?>" >
                </div>
                <div class="form-group">
                    <label>Lesson</label>
                    <select id="data[lesson_id]" name="data[lesson_id]" placeholder="Lesson" class="form-control">
                        <?php if(isset($lessonlist)){ foreach($lessonlist as $item){?>
                            <option value="<?php echo $item['id'] ?>" <?php if(isset($result)) if($result['lesson_id']==$item['id']) echo 'selected' ?>><?php echo $item['name'] ?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="data[description]" name="data[description]" placeholder="Description" class="form-control" ><?php if(isset($result)) echo $result['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="photo" name="photo">
                    <p class="help-block">Supported Format: JPG and PNG.</p>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>