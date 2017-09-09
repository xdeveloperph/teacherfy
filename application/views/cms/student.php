<div class="col-md-10 ">
    <div class="p20 left-border mh700">
        <table class="table">
            <caption>Student</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Telephone</th>
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
                        <td><?php echo $item['fname'] ?></td>
                        <td><?php echo $item['lname'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['mobile'] ?></td>
                        <td><?php echo $item['telephone'] ?></td>
                        <td></td>
                    </tr>
                    <?php $x++;
                } ?>
            <?php } ?>

            </tbody>
        </table>
    </div>

</div>
</div>