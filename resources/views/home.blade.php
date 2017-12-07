@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <meta http-equiv="refresh" content="120" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
        svg {width: 450px; height: 340px;}
        /*rect {width: 450px; height: 320px;}*/
        .navbar {
          margin-bottom: 10px;
      }
    </style>
    <?php
    # FileName="Connection_php_mysql.htm"
    # Type="MYSQL"
    # HTTP="true"
    //include('resources/views/db_connection_asterisk.blade.php'); 
    //@include('resources.view.db_connection_asterisk');
    $hostname_wallboard = "localhost";
    $database_wallboard = "asterisk";
    $username_wallboard = "root";
    $password_wallboard = "";
    $wallboard = mysqli_connect($hostname_wallboard, $username_wallboard, $password_wallboard) or trigger_error(mysqli_error(),E_USER_ERROR);
    
    // Live Calls
    mysqli_select_db($wallboard, $database_wallboard);
    $query_active = "SELECT Count(vicidial_auto_calls.`status`) FROM vicidial_auto_calls";
    $active = mysqli_query($wallboard, $query_active) or die(mysqli_error());
    $row_active = mysqli_fetch_assoc($active);
    $totalRows_active = mysqli_num_rows($active);
    
    // Calls in IVR OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_ivr_calls = "SELECT Count(vicidial_auto_calls.`status`) FROM vicidial_auto_calls WHERE vicidial_auto_calls.`status` = 'LIVE'";
    $ivr_calls = mysqli_query($wallboard, $query_ivr_calls) or die(mysqli_error());
    $row_ivr_calls = mysqli_fetch_assoc($ivr_calls);
    $totalRows_ivr_calls = mysqli_num_rows($ivr_calls);
    
    // Calls Waiting OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_waiting_call = "SELECT Count(vicidial_auto_calls.`status`) FROM vicidial_auto_calls WHERE vicidial_auto_calls.`status` = 'IVR'";
    $waiting_call = mysqli_query($wallboard, $query_waiting_call) or die(mysqli_error());
    $row_waiting_call = mysqli_fetch_assoc($waiting_call);
    $totalRows_waiting_call = mysqli_num_rows($waiting_call);
    
    // Calls Ringing
    mysqli_select_db($wallboard, $database_wallboard);
    $query_calling = "SELECT Count(vicidial_auto_calls.call_type) FROM vicidial_auto_calls WHERE vicidial_auto_calls.stage = 'START'";
    $calling = mysqli_query($wallboard, $query_calling) or die(mysqli_error());
    $row_calling = mysqli_fetch_assoc($calling);
    $totalRows_calling = mysqli_num_rows($calling);
    
    // Agents on Call OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_agent_in_call = "SELECT Count(vicidial_live_agents.`user`) FROM vicidial_live_agents WHERE vicidial_live_agents.`status` = 'INCALL'";
    $agent_in_call = mysqli_query($wallboard, $query_agent_in_call) or die(mysqli_error());
    $row_agent_in_call = mysqli_fetch_assoc($agent_in_call);
    $totalRows_agent_in_call = mysqli_num_rows($agent_in_call);
    
    // Agents Available OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_agent_waiting = "SELECT Count(vicidial_live_agents.`user`) FROM vicidial_live_agents WHERE vicidial_live_agents.`status` = 'READY'";
    $agent_waiting = mysqli_query($wallboard, $query_agent_waiting) or die(mysqli_error());
    $row_agent_waiting = mysqli_fetch_assoc($agent_waiting);
    $totalRows_agent_waiting = mysqli_num_rows($agent_waiting);
    
    // Agents on Pause OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_paused_agents = "SELECT Count(vicidial_live_agents.`user`) FROM vicidial_live_agents WHERE vicidial_live_agents.`status` = 'PAUSED'";
    $paused_agents = mysqli_query($wallboard, $query_paused_agents) or die(mysqli_error());
    $row_paused_agents = mysqli_fetch_assoc($paused_agents);
    $totalRows_paused_agents = mysqli_num_rows($paused_agents);
    
    // Inbound Total Calls Today
    mysqli_select_db($wallboard, $database_wallboard);
    $query_total_inbound = "SELECT sum(total_calls) from vicidial_daily_max_stats where stats_type='INGROUP' and stats_flag='OPEN' and stats_date<='".date("Y-m-d")."' group by stats_date";
    $total_inbound = mysqli_query($wallboard, $query_total_inbound) or die(mysqli_error());
    //$row_total_inbound = mysql_fetch_assoc($total_inbound);
    //$totalRows_total_inbound = mysql_num_rows($total_inbound);
    $row_total_inbound = mysqli_fetch_assoc($total_inbound); 
    $totalRows_total_inbound = $row_total_inbound['sum(total_calls)'];

   // Inbound Total Calls Total
    mysqli_select_db($wallboard, $database_wallboard);
    $query_total_inbound_total = "SELECT COUNT(closecallid) as total FROM `vicidial_closer_log`";
    $query_total_inbound_total = mysqli_query($wallboard, $query_total_inbound_total) or die(mysqli_error());
    $total_inbound_data=mysqli_fetch_assoc($query_total_inbound_total);
    $row_total_inbound_total = $total_inbound_data['total']; 
    
    /*
    // Inbound Answered Calls
    mysql_select_db($database_wallboard, $wallboard);
    $query_answered_inbound = "SELECT Count(vicidial_list.`status`) FROM `vicidial_list` WHERE vicidial_list.entry_date >= '".date("Y-m-d")."' AND vicidial_list.`status` NOT LIKE 'DROP' AND vicidial_list.`status` NOT LIKE 'cDROP' AND vicidial_list.`status` NOT LIKE 'TIMEOT' AND vicidial_list.`status` NOT LIKE 'INBND'";
    $answered_inbound = mysql_query($query_answered_inbound, $wallboard) or die(mysql_error());
    $row_answered_inbound = mysql_fetch_assoc($answered_inbound);
    $totalRows_answered_inbound_no_need = mysql_num_rows($answered_inbound);
    
    // Inbound Drop Calls
    /*mysql_select_db($database_wallboard, $wallboard);
    $query_drop_inbound = "SELECT Count(vicidial_list.`status`) FROM `vicidial_list` WHERE vicidial_list.entry_date >= '".date("Y-m-d")."' AND (vicidial_list.`status` = 'cDROP' OR vicidial_list.`status` = 'TIMEOT' OR vicidial_list.`status` = 'INBND') ";
    $drop_inbound = mysql_query($query_drop_inbound, $wallboard) or die(mysql_error());
    $row_drop_inbound = mysql_fetch_assoc($drop_inbound);
    $totalRows_drop_inbound = mysql_num_rows($drop_inbound);                   */

    $startDate = date("Y-m-d")." 00:00:00";
    $endDate = date("Y-m-d")." 23:59:59";
    mysqli_select_db($wallboard, $database_wallboard);
    $results=mysqli_query($wallboard, "SELECT caller_id_number,call_date FROM `vicidial_did_log` WHERE caller_id_number NOT IN (select phone_number from vicidial_closer_log WHERE (call_date >='$startDate 00:00:01' AND call_date <='$endDate 23:59:59') AND status !='TIMEOT' AND status !='QUEUE') AND caller_id_number NOT IN (select phone_number from user_call_log WHERE (call_date >='$startDate 00:00:01' AND call_date <='$endDate 23:59:59')) AND (call_date >='$startDate 00:00:01' AND call_date <='$endDate 23:59:59')  GROUP BY caller_id_number ORDER BY call_date DESC ");
    $num_rows_drop = mysqli_num_rows($results);

    // Outbound Total Calls OK
    mysqli_select_db($wallboard, $database_wallboard);
    $query_calls_today = "SELECT Count(vicidial_log.uniqueid) AS total_calls FROM `vicidial_log` WHERE `call_date` > '".date("Y-m-d")."'AND vicidial_log.`status` NOT LIKE 'CANCEL' AND vicidial_log.`status` NOT LIKE 'DOCCOM' AND vicidial_log.`status` NOT LIKE 'CALLBK' AND vicidial_log.`status` NOT LIKE 'WSD' AND vicidial_log.`status` NOT LIKE 'DCMX' AND vicidial_log.`status` NOT LIKE 'ADC'";
    $calls_today = mysqli_query($wallboard, $query_calls_today) or die(mysql_error());
    $row_calls_today = mysqli_fetch_assoc($calls_today);
    $totalRows_calls_today = mysqli_num_rows($calls_today);
    
    // Outbound Answered Calls Today
    mysqli_select_db($wallboard, $database_wallboard);
    $query_answered_calls = "SELECT Count(vicidial_log.`status`) FROM `vicidial_log` WHERE vicidial_log.call_date >= '".date("Y-m-d")."' AND `user` <> 'VDAD'  AND `status` != 'cDROPC'";
    $answered_calls = mysqli_query($wallboard, $query_answered_calls) or die(mysql_error());
    $row_answered_calls = mysqli_fetch_assoc($answered_calls);

    $totalRows_answered_calls = mysqli_num_rows($answered_calls);

    // Outbound Answered Calls Total
    mysqli_select_db($wallboard, $database_wallboard);
    $query_answered_calls_total = "SELECT Count(vicidial_log.`status`) FROM `vicidial_log` WHERE  `user` <> 'VDAD'  AND `status` != 'cDROPC'";
    $answered_calls_total = mysqli_query($wallboard, $query_answered_calls_total) or die(mysql_error());
    $row_answered_calls_total = mysqli_fetch_assoc($answered_calls_total);
    $totalRows_answered_calls_total = mysqli_num_rows($answered_calls_total);
   


    // Outbound Drop Calls Today
    mysqli_select_db($wallboard, $database_wallboard);
    $query_drop_calls_today = "SELECT Count(vicidial_log.uniqueid) AS total_calls FROM `vicidial_log` WHERE `call_date` >= '".date("Y-m-d")."' AND `status` = 'DROP'";
    $drop_calls_today = mysqli_query($wallboard, $query_drop_calls_today) or die(mysqli_error());
    $row_drop_calls_today = mysqli_fetch_assoc($drop_calls_today);
    $totalRows_drop_calls_today = mysqli_num_rows($drop_calls_today);
    /* 
    // Outbound BUSY Calls Today
    mysql_select_db($database_wallboard, $wallboard);
    $query_BUSY_calls_today = "SELECT Count(vicidial_log.uniqueid) AS total_calls FROM `vicidial_log` WHERE `call_date` >= '".date("Y-m-d")."' AND `status` = 'cBUSY'";
    $BUSY_calls_today = mysql_query($query_BUSY_calls_today, $wallboard) or die(mysql_error());
    $row_BUSY_calls_today = mysql_fetch_assoc($BUSY_calls_today);
    $totalRows_BUSY_calls_today = $row_BUSY_calls_today['total_calls'];
    
    // Outbound response failure Calls Today
    mysql_select_db($database_wallboard, $wallboard);
    $query_RESFA_calls_today = "SELECT Count(vicidial_log.uniqueid) AS total_calls FROM `vicidial_log` WHERE `call_date` >= '".date("Y-m-d")."' AND `status` = 'bRESFA'";
    $RESFA_calls_today = mysql_query($query_RESFA_calls_today, $wallboard) or die(mysql_error());
    $row_RESFA_calls_today = mysql_fetch_assoc($RESFA_calls_today);
    $totalRows_RESFA_calls_today = $row_RESFA_calls_today['total_calls'];
    
    // Outbound No ANS Calls Today
    mysql_select_db($database_wallboard, $wallboard);
    $query_NANS_calls_today = "SELECT Count(vicidial_log.uniqueid) AS total_calls FROM `vicidial_log` WHERE `call_date` >= '".date("Y-m-d")."' AND `status` = 'cNANS'";
    $NANS_calls_today = mysql_query($query_NANS_calls_today, $wallboard) or die(mysql_error());
    $row_NANS_calls_today = mysql_fetch_assoc($NANS_calls_today);
    $totalRows_NANS_calls_today = $row_NANS_calls_today['total_calls'];
    
    mysql_select_db($database_wallboard, $wallboard);
    $query_dead_agent = "SELECT Count(vicidial_live_agents.`user`) as `dead agent` FROM vicidial_live_agents WHERE vicidial_live_agents.callerid IS NOT NULL AND vicidial_live_agents.last_update_time > vicidial_live_agents.last_call_finish";
    $dead_agent = mysql_query($query_dead_agent, $wallboard) or die(mysql_error());
    $row_dead_agent = mysql_fetch_assoc($dead_agent);
    $totalRows_dead_agent = mysql_num_rows($dead_agent);
    
    $startDate = date("Y-m-d")." 00:00:00";
    $endDate = date("Y-m-d")." 23:59:59";
    
    
    
    
    
    //agent avg talk time
    
    $results=mysql_query("select user,sum(length_in_sec),sum(queue_seconds),COUNT(closecallid) from vicidial_closer_log where (call_date >= '$startDate' and call_date <= '$endDate')  AND user != 'VDCL' group by user ");
    $totalHamba1 = 0;
    $iCount1 = 0;
    while($data_array=mysql_fetch_row($results))
         {
   
                  $agent = $data_array[0];
          $talk = $data_array[1];
          $ring = $data_array[2];
          $total = $data_array[3];
          
          $totalHamba1 = $totalHamba1 + $talk/$total;
          $iCount1++;
          
          
      }
       
     $avgCount1 = $totalHamba1 / $iCount1."<br>";
    
    
    
    
    // Sum of Talk Time Today
    mysql_select_db($database_wallboard, $wallboard);
    $sumOfTalkTimeTodayQuery = "select user, count(*) as event_count,sum(talk_sec) as talk,sum(pause_sec),sum(wait_sec),sum(dispo_sec),sum(dead_sec) from vicidial_agent_log where (event_time >= '$startDate' and event_time <= '$endDate')";
    $sumOfTalkTimeTodayResult = mysql_query($sumOfTalkTimeTodayQuery, $wallboard) or die(mysql_error());
    $row = mysql_fetch_assoc($sumOfTalkTimeTodayResult); 
    $sumTalkTime = $row['talk'];
    
    // Max Call Length Today
    mysql_select_db($database_wallboard, $wallboard);
    $maxCallLengthTodayQuery = "select MAX(length_in_sec) from vicidial_closer_log where (call_date >= '$startDate' and call_date <= '$endDate')";
    $maxCallLengthTodayResult = mysql_query($maxCallLengthTodayQuery, $wallboard) or die(mysql_error());
    $row = mysql_fetch_assoc($maxCallLengthTodayResult); 
    $maxCallLength = $row['MAX(length_in_sec)'];
    
    // Max Call Length Today
    mysql_select_db($database_wallboard, $wallboard);
    $maxQueueTimeTodayQuery = "select MAX(queue_seconds) from vicidial_closer_log where (call_date >= '$startDate' and call_date <= '$endDate')";
    $maxQueueTimeTodayResult = mysql_query($maxQueueTimeTodayQuery, $wallboard) or die(mysql_error());
    $row = mysql_fetch_assoc($maxQueueTimeTodayResult); 
    $maxQueueTime = $row['MAX(queue_seconds)']; 
    */
    
  ?>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><code style="font-size: 25px;"><i>i</i>-Tracker Dashboard</code></div>

                <!-- <div class="panel-body" style="background-color: #7ED2FE"> -->
                <!-- <div class="panel-body" style="background-color: #E3FAFF"> -->
                <div class="panel-body" style="background-color: #b0ecf9">
                <!-- <div class="panel-body" style="background-color: rebeccapurple"> -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content green" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id="new_total" style="font-size: 32px;">{{ $userCount }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Users </h4> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading blue"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content blue" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ $ticketCount }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Total Ticket </h4></div> 
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading dark-blue"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content dark-blue" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id=""  style="font-size: 32px;">{{ $ticketStatusCount }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Ticket Status </h4></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="circle-tile ">
                                <div class="circle-tile-heading purple"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content purple" style="padding-top: 40px;">
                                    <div class="circle-tile-number text-faded" id="answered_total"  style="font-size: 32px;">{{ $ticketTypeCount }}</div>
                                    <div class="circle-tile-description text-faded"> <h4 style="margin-top: 0; margin-bottom: 0;"> Ticket Types </h4></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->


                     <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-hand-o-right"></i></span>

                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Answer</span></center>
                                    <center><span class="info-box-number" style="font-size: 39px;" id="answer_ticket">{{ $ticketStatusAnswerCount }}</span></center>
                                </div>
                            <!-- /.info-box-content -->
                            </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-bullhorn"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">New</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;" id="new_ticket">{{ $ticketStatusNewCount }}</span></center>
                                </div>    
                            </div>
                        </div>
                        <!-- /.col -->  
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple" style="color: #fff !important;"><i class="fa fa-bar-chart"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Pending</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ $ticketStatusPendingCount }}</span></center>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon "><i class="fa fa-bar-chart"></i></span>
                                <div class="info-box-content">
                                    <center><span class="info-box-text" style="font-size: 18px;">Closed</span></center>
                                    <center><span class="info-box-number" style="font-size: 33px;">{{ $ticketStatusClosedCount }}</span></center>
                                </div>
                            </div>
                        </div>
                        <!-- /.col --> 
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->


                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ $ticketType1DistributorCount }}</h3>
                                    <p><b>Distributor Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-files-o"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ $ticketType2MarketingCount }}</h3>
                                    <p><b>Marketing Campaign Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                                <div class="inner">
                                    <h3>{{ $ticketType3ProductCount }}</h3>
                                    <p><b>Product Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->
                    
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ $ticketType4RetailerCount }}</h3>
                                    <p><b>Retailer Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hand-o-right"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ $ticketType5PackageCount }}</h3>
                                    <p><b>Package Ticket</b></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-anchor"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><code style="font-size: 25px;"><i>i</i>-dialer Dashboard</code></div>

                <!-- <div class="panel-body" style="background-color: #7ED2FE"> -->
                <!-- <div class="panel-body" style="background-color: #E3FAFF"> -->
                <div class="panel-body" style="background-color: #ECF0F5">
                <!-- <div class="panel-body" style="background-color: rebeccapurple"> -->  
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 39px;"><?php echo date("h:i"); ?></span>
                                    <span class="info-box-number" style="font-size: 18px;"><?php echo date("m/d/Y"); ?></span>
                                </div>
                            <!-- /.info-box-content -->
                            </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-phone"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Live Calls</span>
                              <span class="info-box-number" style="font-size: 39px;"><?php echo $row_active['Count(vicidial_auto_calls.`status`)']; ?></span>
                            </div>
                            
                          </div>
                          
                        </div> -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-phone"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Calls in IVR</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_waiting_call['Count(vicidial_auto_calls.`status`)']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-tty"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Calls Waiting</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_ivr_calls['Count(vicidial_auto_calls.`status`)']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-bell-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Calls Ringing (Outbound)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_calling['Count(vicidial_auto_calls.call_type)']; ?></span>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-headphones"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Agents on Call</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_agent_in_call['Count(vicidial_live_agents.`user`)']; ?></span>
                                </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-hand-o-right"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Agents Available</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_agent_waiting['Count(vicidial_live_agents.`user`)']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-pause"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Agents on Pause</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_paused_agents['Count(vicidial_live_agents.`user`)']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-arrow-right"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Inbound Calls (Today)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $totalRows_total_inbound; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-share"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 16px;">Inbound Answered Calls (Today)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $totalRows_total_inbound - $num_rows_drop; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-export"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Outbound Calls (Today)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_calls_today['total_calls']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-saved"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 15px;">Outbound Answered Calls (Today)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_answered_calls['Count(vicidial_log.`status`)']; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->   
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-download-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Inbound Calls (Total)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_total_inbound_total; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-download-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Outbound Calls (Total)</span>
                                    <span class="info-box-number" style="font-size: 39px;"><?php echo $row_answered_calls_total['Count(vicidial_log.`status`)']; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link href="{{ asset('css/mohsin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_dash.css') }}" rel="stylesheet">
@endsection