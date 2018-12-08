<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Auth;

?>
<style>
    body {
        //margin-top:40px;
    }
    .stepwizard-step p {
        margin-top: 10px;
        margin-left: 70px;
        width: 120px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 50%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 26px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
        width: 100px;
    }
    .btn-circle {
        width: 50px;
        height: 50px;        
        padding: 12px 0;
        margin-left: 80px;
        text-align: center;
        font-size: 12px;
        line-height: 2.428571429;
        border-radius: 30px;
    }  

    @media only screen and (max-width: 480px) {
        .stepwizard-step p {
            margin-top: 10px;
            margin-left: 5px;
            width: 0px;
            display: none;
        }

        .stepwizard-row:before {
            top: 15px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
            border: 2px solid;
        }

        .btn-circle {
            width: 45px;
            height: 45px;        
            padding: 4px 0;
            margin-left: 20px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 15px;
            line-height: 2.428571429;
            border-radius: 45px;
            border: 2px solid;
        }  

        .h3{            
            font-size: 20px !important;
        }
        label{
            font-size: 1.4em !important; 
            font-weight: bold;
        }
    }
    .checkbox label:after, 
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }    

</style>
<body class="skin-blue">
    <div class="wrapper">      
    <?php echo $this->element('mentor/header');?>
        <!-- Left side column. contains the logo and sidebar -->
    <?php echo $this->element('mentor/sidebar');?>  
        <!-- Right side column. Contains the navbar and content of the page -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small></small>
                </h1>
                <!--  
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Tables</a></li>
                  <li class="active">Data tables</li>
                </ol>
                -->
            </section>

            <!-- Main content -->
            <section class="content">
     <?php echo $this->element('mentor/card');?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">                              
                                <div class="col-md-4 col-lg-2">
                                    <button data-toggle="collapse" data-target="#demo" class="btn btn-link btn-block"><h3 style="font-size:18px !important;font-weight: bold">Preparing Your Track for Mastering</h3></button>
                                </div>                                
                                <div id="demo" class="col-md-12 collapse">

                                    <h4>Master bus processing:</h4>
                                    <ul >
                                        <li class="">As a general rule, no effects should be placed on the master bus.</li>
                                        <li class="">Any corrective effect or processing on the master bus is better left for the mastering engineer to do.</li>
                                        <li class="">Minimal compression is permissible to glue the mix together.</li>
                                    </ul>


                                    <h4>Master bus processing:</h4>
                                    <ul >
                                        <li class="">The loudest section of the song should peak at -5db to allow enough headroom for the mastering stage.</li>
                                        <li class="">If the song is not peaking at -5db you can dial the volume faders on individual tracks to adjust the level while keeping the master fader at 0db.</li>
                                        <li class="">Although the peak level of -5db is strongly recommended, anything between -3db and -6db will still be accepted.</li>
                                    </ul>

                                    <h4>Reference song submission:</h4>
                                    <p >                                   
                                        A master needs to have a clear focus and the mastering engineer and artist should work together to develop a clear, defined vision of how they want their product to sound like at the end of the mastering process.
                                    </p>
                                    <ul >
                                        <li class="">It is best to submit files as 44100hz, 24bit WAV or AIFF file.</li>
                                        <li class="">Compressed lossy formats such as MP3 and AAC will not be accepted.</li>                                   
                                    </ul>

                                    <h4>Do not add dithering:</h4>
                                    <ul >
                                        <li class="">Dithering is best left to the mastering engineer to choose the correct settings for each song.</li>                                                                     
                                    </ul>
                                    <h4>Most importantly, eliminate noise and keep the mix clean:</h4>
                                    <ul >
                                        <li class="">Be happy with your mix before you submit for mastering.</li>             
                                        <li class="">n most cases mastering engineers will do their best to preserve your mix and not compromise it while ensuring it is appropriately loud and sonically fitting with your other tracks on the album.</li>        
                                    </ul>
                                </div>                              
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="container"></div>

                                <div class="stepwizard col-md-12 col-xs-2">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                            <p>Choose a service</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                            <p>Customize service</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                            <p>Select date and slot</p>
                                        </div>                                       
                                        <div class="stepwizard-step">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                            <p>Confirm reservation</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                            <p>Payment</p>
                                        </div>
                                    </div>
                                </div>

                                <!--<form role="form" action="" method="post">-->
                                <div class="row setup-content" id="step-1">
                                    <div class="col-md-12">
                                        <div class="col-md-12 st-1">
                                            <h3> Choose a service</h3>
                                            <div class="row"> 
                                                <div class="col-sm-4">
                                                    <div class="form-group radio">
                                                        <label style="font-size: 1.4em">
                                                            <input type="radio" name="service" value="Mastering" required="required">
                                                            <span class="cr"><i class="cr-icon fa fa-music"></i></span>
                                                            Mastering
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group radio">
                                                        <label style="font-size: 1.4em">
                                                            <input type="radio" name="service" value="Mixing" required="required">
                                                            <span class="cr"><i class="cr-icon fa fa-headphones"></i></span>
                                                            Mixing
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group radio">
                                                        <label style="font-size: 1.4em">
                                                            <input type="radio" name="service" value="Recording" required="required">
                                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-record"></i></span>
                                                            Recording
                                                        </label>
                                                    </div>
                                                </div> 
                                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-lg-12 col-sm-6 col-md-offset-3">
                                        <div>
                                            <h3> Customize service</h3>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label cust-l"> </label>
                                           <?php
                                           $track = [1=>'1 track',2=>'2 track',3=>'3 track',4=>'4 track',
                                                    5=>'5 track',6=>'6 track',7=>'7 track',8=>'8 track',
                                                    9=>'9 track',10=>'10 track',11=>'11 track',12=>'12 or more'
                                                   ];
                                           echo $this->Form->select('track', $track, ['empty' => '--Choose one--', 'class' => 'form-control', 
                                                 'label' => false, 'required' => true,'id'=>'track']);
                                           ?>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 p-table"></div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                    <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-md-12 col-sm-6 col-md-offset-3">
                                        <div >
                                            <h3> Select date and slot</h3>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div id='calendar'></div>
                                                    <input id="date" maxlength="200" type="hidden" name="date" required="required">
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                    <button class="btn btn-primary nextBtn btn-md pull-right slot" type="button">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-4">
                                    <div class="col-md-12 col-sm-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3> Confirm reservation</h3>
                                            <?php echo $this->Form->create($order,['id'=>'r-order','url' => ['controller' => 'users', 'action' => 'save_order']]);?>
                                            <!--<form id="pay-form" method="post" action="https://sandbox.payfast.co.za/eng/process">-->
                                            <input type="hidden" name="temp_service">
                                            <input type="hidden" name="temp_track">  
                                            <input type="hidden" name="temp_total">                                            
                                            <input type="hidden" name="temp_date">
                                            <div class="row">                                               
                                                <div class="form-group col-md-6">
                                                    <label for="comment">Comment</label>
                                                    <textarea class="form-control" rows="5" id="comment" name="comments"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">                                               
                                                <div class="form-group col-md-6 col-md-offset-2"> 

                                                </div>
                                            </div>
                                            <!--</form>-->                                            
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                    <button class="btn btn-primary nextBtn btn-md pull-right r-order" type="submit">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo $this->Form->end();?>
                                    </div>
                                </div>

                                <div class="row setup-content" id="step-5"><br><br><br><br>
                                    <div class="col-md-12 col-sm-6 col-md-offset-3">
                                        <div >
                                            <h3> </h3>

                                            <div >
                                                <!-- item -->
                                                <div class="form-group col-md-6 text-center">
                                                    <div class="panel panel-default panel-pricing">
                                                        <div class="panel-heading">
                                                            <!--<i class="fa fa-desktop"></i>-->
                                                            <h3>Total to pay</h3>
                                                        </div>
                                                        <div class="panel-body text-center">
                                                            <p> <h3 id="pay-button"></h3></p>
                                                            <input id="pay-amount" type="hidden" class="form-control text-center" name="total">                                                            
                                                        </div>
                                                        <!-- <ul class="list-group text-center">
                                                             <li class="list-group-item"><i class="fa fa-check"></i> Personal use</li>
                                                             <li class="list-group-item"><i class="fa fa-check"></i> Unlimited projects</li>
                                                             <li class="list-group-item"><i class="fa fa-check"></i> 27/7 support</li>
                                                         </ul>
                                                         <div class="panel-footer">
                                                             <a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
                                                         </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /item -->


                                        <div class="row">
                                            <div class="form-group col-md-6 col-md-offset-2">   <!--12022197   a9rsdm4tdzm00 -->                                            
                                                <?php echo $this->element('payfast');?>
                                            </div>
                                        </div>

                                        <div class="row">                                               
                                            <div class="form-group col-md-6">                                                
                                                <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                <!--<button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>-->
                                            </div>                                                   
                                        </div>                                           
                                    </div>
                                </div>
                                <!--</form>-->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script>
            $(document).ready(function () {

                $('[data-toggle="popover"]').popover();

                var navListItems = $('div.setup-panel div a'),
                        allWells = $('.setup-content'),
                        allNextBtn = $('.nextBtn'),
                        allPrevBtn = $('.prevBtn');
                allWells.hide();
                navListItems.click(function (e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                            $item = $(this);
                    if (!$item.hasClass('disabled')) {
                        navListItems.removeClass('btn-success').addClass('btn-default');
                        $item.addClass('btn-success');
                        allWells.hide();
                        $target.show();
                        $target.find('input:eq(0)').focus();
                    }
                });
                allPrevBtn.click(function () {
                    var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
                    prevStepWizard.removeAttr('disabled').trigger('click');
                });
                allNextBtn.click(function () {
                    var favorite = [];
                    $.each($("input[name='service']:checked"), function () {
                        favorite.push($(this).val());
                    });

                    $(".cust-l").text('How many tracks would you like to ' + favorite.join(", ") + '?');
                    $("input[name='temp_service']").val(favorite.join(", "));
                    $("input[name='item_name']").val($("input[name='temp_service']").val());
                    $("input[name='amount']").val($("input[name='total']").val());

                    var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                            curInputs = curStep.find("input[type='text'],input[type='hidden'], input[type='url'],input[type='radio'], select"),
                            isValid = true;
                    $(".form-group").removeClass("has-error");
                    for (var i = 0; i < curInputs.length; i++) {

                        if (curInputs[i].validity.valid == false) {
                            isValid = false;
                            $(curInputs[i]).closest(".form-group").addClass("has-error");
                        }

                        if (curInputs[i].validity.valid == true) {
                            nextStepWizard.removeAttr('disabled').trigger('click');
                        }

                    }


                });
                $('div.setup-panel div a.btn-success').trigger('click');

                $("#track").change(function () {
                    var track = $(this).val();
                    var service = $("input[name='temp_service']").val();
                    $("input[name='temp_track']").val(track);
                    if (track.length > 0 && service.length > 0) {
                        var url = "<?php echo Router::url('/users/pricing/');?>" + track + "/" + service;
                        $.ajax({
                            url: url,
                            type: "GET",
                            beforeSend: function () {
                                // setting a timeout
                                $(".p-table").html('loading pricing table....');
                            },
                            success: function (data, textStatus, jqXHR)
                            {
                                $(".p-table").html(data);

                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                                //location.reload();
                            }
                        });
                    }
                    return false;
                });

                $(document).on('click', '.number-spinner button', function () {
                    var btn = $(this),
                            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                            newVal = 0;

                    if (btn.attr('data-dir') == 'up') {
                        newVal = parseInt(oldValue) + 1;
                    } else {
                        if (oldValue > 1) {
                            newVal = parseInt(oldValue) - 1;
                        } else {
                            newVal;
                        }
                    }
                    btn.closest('.number-spinner').find('input').val(newVal);
                });

                $('#calendar').fullCalendar({
                    //     weekends: false // will hide Saturdays and Sundays                    
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    dayClick: function (date, jsEvent, view) {

                        //alert('Clicked on: ' + date.format());

                        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                        //alert('Current view: ' + view.name);

                        // change the day's background color just for fun
                        $("td.fc-day").css('background-color', '#fff');
                        $(this).css('background-color', '#48f442');
                        $("#date").val(date.format());
                        $("input[name='temp_date']").val(date.format())

                    },
                    height: 600,
                    width: 600
                });

                $(document).on("click", ".extra-up", function () {
                    var extra = 55;
                    if ($("input[name='temp_service']").val().trim() == 'Mixing') {
                        extra = 100;
                    }

                    var r_edit = parseInt($("input[name='radio_edit']").val().trim());
                    var b_track = parseInt($("input[name='back_track']").val().trim());
                    var instru = parseInt($("input[name='instru']").val().trim());
                    var count = r_edit + b_track + instru;
                    //alert(count);
                    if (Number.isInteger(count)) {
                        var currentTotal = extra * count;
                        var total = parseInt($("input[name='current_total']").val()) + currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    }
                    return false;
                });

                $(document).on("click", ".extra-down", function () {
                    var extra = 55;
                    if ($("input[name='temp_service']").val().trim() == 'Mixing') {
                        extra = 100;
                    }
                    var r_edit = parseInt($("input[name='radio_edit']").val().trim());
                    var b_track = parseInt($("input[name='back_track']").val().trim());
                    var instru = parseInt($("input[name='instru']").val().trim());
                    var count = r_edit + b_track + instru;
                    //alert(count);
                    if (parseInt($("input[name='total']").val()) === parseInt($("input[name='current_total']").val())) {

                    } else if (count == 0) {
                        var total = parseInt($("input[name='current_total']").val());
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                        $("input[name='amount']").val(total.toFixed(2));
                    } else {
                        //var value = $(this);
                        //count = count - parseInt(value.closest('.number-spinner').find('input').val());                       
                        var currentTotal = extra * count;
                        var total = parseInt($("input[name='current_total']").val()) + currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                        $("input[name='amount']").val(total.toFixed(2));

                    }
                });

                $(document).on("click", ".e", function () {
                    var count = parseInt($("input[name='back_track']").val().trim());
                    if (Number.isInteger(count)) {
                        var currentTotal = 55 * count;
                        var total = parseInt($("input[name='current_total']").val()) + currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    }
                    return false;
                });

                $(document).on("click", ".b-track-down", function () {
                    var count = parseInt($("input[name='back_track']").val().trim());
                    if (parseInt($("input[name='total']").val()) === parseInt($("input[name='current_total']").val())) {

                    } else if (count == 0) {
                        var currentTotal = 55 * 1;
                        var total = parseInt($("input[name='total']").val()) - currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    } else {
                        var currentTotal = 55 * count;
                        var total = parseInt($("input[name='total']").val()) - currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    }
                });

                $(document).on("click", ".instru-up", function () {
                    var count = parseInt($("input[name='instru']").val().trim());
                    if (Number.isInteger(count)) {
                        var currentTotal = 55 * count;
                        var total = parseInt($("input[name='current_total']").val()) + currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    }
                    return false;
                });

                $(document).on("click", ".instru-down", function () {
                    var count = parseInt($("input[name='instru']").val().trim());
                    if (parseInt($("input[name='total']").val()) === parseInt($("input[name='current_total']").val())) {

                    } else if (count == 0) {
                        var currentTotal = 55 * 1;
                        var total = parseInt($("input[name='total']").val()) - currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    } else {
                        var currentTotal = 55 * count;
                        var total = parseInt($("input[name='total']").val()) - currentTotal;
                        $(".t-price").text('R ' + total.toFixed(2));
                        $("input[name='total']").val(total.toFixed(2));
                    }
                });

                $(document).on("click", ".slot", function () {
                    var amount = parseInt($("input[name='total']").val());
                    $("#pay-button").text('R ' + amount.toFixed(2));
                    $("#pay-amount").val('R ' + amount.toFixed(2));
                    $("input[name='temp_total']").val(amount.toFixed(2));
                });

                $(document).on("submit", "#pay-form", function (event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    var url = $(this).attr('action');
                    alert(url);
                    $.ajax({
                        url: url,
                        type: "POST",
                        asyn: false,
                        data: formData,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                            //$('.modal-title').html('');
                            //$('.conversion').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Converting...</button>");
                        },
                        success: function (data, textStatus, jqXHR)
                        {
                            alert(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                            //location.reload();
                        }
                    });
                });

                $(document).on("click", ".pay-now", function () {
                    var amount = parseInt($("input[name='total']").val());
                    alert(amount);
                    $("#pay-button").text('R ' + amount.toFixed(2));
                    $("#pay-amount").val('R ' + amount.toFixed(2));
                });
                
                $(document).on("click", ".r-order", function () {                                       
                   $("#r-order").submit(function(event){ 
                    event.preventDefault();                    
                    var formData = $("#r-order").serialize();
                    var url = $("#r-order").attr('action');                   
                    $.ajax({
                        url: url,
                        type: "POST",
                        asyn: false,
                        data: formData,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                            //$('.modal-title').html('');
                            //$('.conversion').html("<button class='btn btn-lg btn-default'><span class='glyphicon glyphicon-refresh spinning'></span> Converting...</button>");
                        },
                        success: function (data, textStatus, jqXHR)
                        {
                            alert(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                            //location.reload();
                        }
                      });
                    });
                  });

            });
        </script>


