<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacherfy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/chart/dist/Chart.bundle.js"></script>


    <link href='<?php echo base_url(); ?>css/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo base_url(); ?>css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='<?php echo base_url(); ?>js/lib/moment.min.js'></script>
    <script src='<?php echo base_url(); ?>js/lib/jquery.min.js'></script>
    <script src='<?php echo base_url(); ?>js/fullcalendar.min.js'></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>

<body>

<div class="box-shadow">
        <header>
            <nav>
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url().'teacher' ?>">Teacherfy</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav ">

                            <li class="<?php echo $hdashboard?>"><a href="<?php echo base_url().'student/dashboard'?>" >Dashboard</a></li>
                            <li class="<?php echo $hcalendar?>"><a href="<?php echo base_url().'student/calendar'?>" >Calendar</a></li>
                            <!--<li class="<?php echo $hprofile?>"><a href="<?php echo base_url().'teacher/profile'?>" >Profile</a></li>-->
                            <!--<li class="<?php echo $hearnings?>"><a href="<?php echo base_url().'teacher/earnings'?>" >Earnings</a></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown drphead">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img class="icon" src="<?php echo base_url().'images/icon.png' ?>"><?php echo $user['fname'].' '.$user['lname']?></a>
                                <ul class="dropdown-menu">
                                    <li>

                                        <a href="<?php echo base_url().'cms/logout/'?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>



                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

</div>
