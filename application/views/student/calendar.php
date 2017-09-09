
<style>

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>
<div class="container-fluid p20">
    <div id='calendar'></div>
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