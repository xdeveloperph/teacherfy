
<style>

    #calendar {

        margin: 0 auto;
    }
</style>

<div class="container-fluid p20">

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Lesson
    </button>

    <div id='calendar'></div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Add Lesson</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div id="accordion">

                        <div>
                            <div class="form-group">
                                <label for="data[]">Date</label>
                                <input type="date" class="form-control"  id="data[day]" name="data[day]"  required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Time Start</label>
                                <input type="time" class="form-control"  id="data[start]" name="data[start]"  required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Time End</label>
                                <input type="time" class="form-control"  id="data[end]" name="data[end]"  required>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Student</label>
                                <select class="form-control" name="data[userid]">
                                    <?php foreach($student as $item){ ?>
                                       <option value="<?php echo $item['userid'] ?>"><?php echo $item['fname'] ?> <?php echo $item['lname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Subject</label>
                                <select class="form-control" name="data[subjectid]">
                                    <?php foreach($subject as $item){ ?>
                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data[]">Price</label>
                                <input type="number" class="form-control"  id="data[price]" name="data[price]" required>
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
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            defaultView: 'agendaWeek',
            events: [
                <?php foreach($calendar as $item){ ?>
                {
                    "id":"<?php echo $item['info']['id'] ?>",
                    "title":"<?php echo $item['user']['fname'] ?> <?php echo $item['user']['lname'] ?>-<?php echo $item['subject']['name'] ?>",
                    "start":"<?php echo $item['info']['day'] ?>T<?php echo $item['info']['start'] ?>Z",
                    "end":"<?php echo $item['info']['day'] ?>T<?php echo $item['info']['end'] ?>Z",


                },
                <?php } ?>


            ],
            resources: [
                // resources go here
            ]
            // other options go here...
        });

    });
</script>