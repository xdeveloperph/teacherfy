<div class="container-fluid">
    <div class="mh700">

        <div class="pt20">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new student
            </button>

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
            <thead>
            <tr>
                <th>#</th>
                <th>Active Students</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Schedule Notification</th>
                <th>Account</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($result)){
                $x = 1;
                ?>

                <?php foreach($result as $item){ ?>
                    <tr>
                        <td><?php echo $x ?></td>
                        <td><?php echo $item['fname'] ?> <?php echo $item['lname'] ?></td>
                        <td><?php echo $item['mobile'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php $x++;
                } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Add Student</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div id="accordion">
                    <h5><strong>Student Information</strong></h5>
                        <div>
                            <div class="form-group">
                                <label for="data[]">Firs Name</label>
                                <input type="text" class="form-control"  id="data[fname]" name="data[fname]" placeholder="Firs Name" required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Last Name</label>
                                <input type="text" class="form-control"  id="data[lname]" name="data[lname]" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Mobile Number</label>
                                <input type="number" class="form-control"  id="data[mobile]" name="data[mobile]" placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Email</label>
                                <input type="email" class="form-control"  id="data[email]" name="data[email]" placeholder="Email" required>
                            </div>
                        </div>
                        <h5><strong>Guardian Information</strong></h5>
                        <div>
                            <div class="form-group">
                                <label for="data[]">Firs Name</label>
                                <input type="text" class="form-control"  id="data[gfname]" name="data[gfname]" placeholder="Firs Name">
                            </div>
                            <div class="form-group">
                                <label for="data[]">Last Name</label>
                                <input type="text" class="form-control"  id="data[glname]" name="data[glname]" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="data[]">Relation to Student</label>
                                <input type="text" class="form-control"  id="data[grelation]" name="data[grelation]" placeholder="Relation">
                            </div>
                            <div class="form-group">
                                <label for="data[]">Mobile Number</label>
                                <input type="number" class="form-control"  id="data[gmobile]" name="data[gmobile]" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                                <label for="data[]">Email</label>
                                <input type="email" class="form-control"  id="data[gemail]" name="data[gemail]" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $( "#accordion" ).accordion({
            heightStyle: "content"
        });
    });
</script>