@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body" style="background-color: rebeccapurple">
                   


                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="circle-tile ">
                            <div class="circle-tile-heading green"><i class="fa fa-bar-chart fa-fw fa-3x"></i></div>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded"> <h3 style="margin-top: 0; margin-bottom: 0;"> Ticket </h3> </div>
                                <div class="circle-tile-number text-faded" id="new_total">9</div>
                                
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="circle-tile ">
                            <div class="circle-tile-heading green"><i class="fa fa-outdent fa-fw fa-3x"></i></div>
                            <div class="circle-tile-content green">
                                  <div class="circle-tile-description text-faded"> <h3 style="margin-top: 0px; margin-bottom: 0px;"> Ticket </h3> </div>
                                  <div class="circle-tile-number text-faded" id="pending_total">8</div>
                                  
                              </div>
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="circle-tile ">
                            <div class="circle-tile-heading green"><i class="fa fa-calendar fa-fw fa-3x"></i></div>
                                <div class="circle-tile-content green">
                                  <div class="circle-tile-description text-faded"> <h3 style="margin-top: 0; margin-bottom: 0;"> Ticket </h3></div>
                                  <div class="circle-tile-number text-faded" id="answered_total">7</div>
                                  
                              </div>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="circle-tile ">
                            <div class="circle-tile-heading green"><i class="fa fa-files-o fa-fw fa-3x"></i></div>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded"> <h3 style="margin-top: 0; margin-bottom: 0;"> Ticket </h3> </div>
                                <div class="circle-tile-number text-faded" id="new_total">6</div>
                                
                            </div>
                          </div>
                        </div>
                                <!-- /.col -->
                      </div> 
                                 <!-- /.row -->

                      <!-- =========================================================== -->
                    

                      <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                                    <span class="info-box-number" style="font-size: 33px;">11</span>
                                </div> 
                            </div> 
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-bullhorn"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                                    <span class="info-box-number" style="font-size: 33px;">22</span>
                                </div>    
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                                    <span class="info-box-number" style="font-size: 33px;">33</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-exchange"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                                    <span class="info-box-number" style="font-size: 33px;">44</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">55</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 16px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">66</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-area-chart"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">77</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">88</span>
                            </div> 
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-bar-chart"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">99</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-file-text"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">00</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">11</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-clipboard"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">22</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-share"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">33</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">44</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-reply"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">55</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-share"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text" style="font-size: 18px;">Ticket</span>
                              <span class="info-box-number" style="font-size: 33px;">66</span>
                            </div>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->

                      <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua" style="background-color: gray !important;">
                            <div class="inner">
                              <h3>11</h3>

                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-pencil"></i>
                            </div>
                            
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua" style="background-color: gray !important;">
                            <div class="inner">
                              <!-- <h3>00<sup style="font-size: 20px">%</sup></h3> -->
                              <h3>$22</h3>

                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-area-chart"></i>
                            </div>
                            
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua" style="background-color: gray !important;">
                            <div class="inner">
                              <h3>33</h3>

                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-edit"></i>
                            </div>
                            
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- small box -->
                          <div class="small-box bg-aqua" style="background-color: gray !important;">
                            <div class="inner">
                              <h3>44</h3>

                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-bar-chart"></i>
                            </div>
                            
                          </div>
                        </div>
                        <!-- ./col -->
                      </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->
                    
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3>77</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-hand-o-right"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3>88</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-anchor"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3>99</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-balance-scale"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3>00</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-users"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                      </div>
                      <!-- /.row -->

                      <!-- =========================================================== -->

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                            <div class="inner">
                              <h3>55</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-file-text"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                            <div class="inner">
                              <h3>66</h3>
                              <p><b>Ticket Ticket Ticket</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-files-o"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                            <div class="inner">
                              <h3>{{ date('Y') }}</h3>
                              <p>All information are shown for <b>{{ date('Y') }}</b></p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-clipboard"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua" style="background-color: #008080 !important;">
                            <div class="inner">
                              <h3>{{ date('d/m/Y') }}</h3>
                              <p><b>Date of Today</b></p>
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





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_dash.css') }}" rel="stylesheet">
@endsection