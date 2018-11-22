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
                                <h3>Preparing Your Track for Mastering</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="container"></div>

                                <div class="stepwizard col-md-12">
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
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                            <p>Fill your information</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                            <p>Confirm reservation</p>
                                        </div>
                                    </div>
                                </div>

                                <form role="form" action="" method="post">
                                    <div class="row setup-content" id="step-1">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <h3> Choose a service</h3>
                                                <div class="row"> 
                                                    <div class="col-sm-4">
                                                        <div class="form-group radio">
                                                            <label style="font-size: 1.8em">
                                                                <input type="radio" name="o3" value="Mastering" required="required">
                                                                <span class="cr"><i class="cr-icon fa fa-music"></i></span>
                                                                Mastering
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group radio">
                                                            <label style="font-size: 1.8em">
                                                                <input type="radio" name="o3" value="Mixing" required="required">
                                                                <span class="cr"><i class="cr-icon fa fa-headphones"></i></span>
                                                                Mixing
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group radio">
                                                            <label style="font-size: 1.8em">
                                                                <input type="radio" name="o3" value="Recording" required="required">
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
                                        <div class="col-xs-6 col-md-12">
                                            <div class="col-md-12">
                                                <h3> Customize service</h3>
                                                <div class="form-group">
                                                    <label class="control-label">How many tracks would you like to master?</label>
                                           <?php
                                           $track = [1=>'1 track',2=>'2 track',3=>'3 track',4=>'4 track',
                                                    5=>'5 track',6=>'6 track',7=>'7 track',8=>'8 track',
                                                    9=>'9 track',10=>'10 track',11=>'11 track',12=>'12 or more'
                                                   ];
                                           echo $this->Form->select('track', $track, ['empty' => '--Choose one--', 'class' => 'form-control', 
                                                 'label' => false, 'required' => true,'id'=>'track']);
                                           ?>
                                                </div>  
                                                <div class="p-table"></div>
                                                <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row setup-content" id="step-3">
                                        <div class="col-xs-6 col-md-12">
                                            <div class="col-md-12">
                                                <h3> Select date and slot</h3><br>
                                                <div id='calendar'></div>
                                                <div id='datepicker'></div>
                                                <div class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Create new event</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <label class="col-xs-4" for="title">Event title</label>
                                                                        <input type="text" name="title" id="title" />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <label class="col-xs-4" for="starts-at">Starts at</label>
                                                                        <input type="text" name="starts_at" id="starts-at" />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <label class="col-xs-4" for="ends-at">Ends at</label>
                                                                        <input type="text" name="ends_at" id="ends-at" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <br>
                                                <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row setup-content" id="step-4">
                                        <div class="col-xs-6 col-md-12">
                                            <div class="col-md-12">
                                                <h3> Fill your information</h3>
                                                <div class="form-group">
                                                    <label class="control-label">Company Name</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Company Address</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
                                                </div>
                                                <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row setup-content" id="step-5">
                                        <div class="col-xs-6 col-md-12">
                                            <div class="col-md-12">
                                                <h3> Confirm reservation</h3>
                                                <button class="btn btn-default prevBtn btn-md pull-left" type="button">Previous</button>
                                                <button class="btn btn-primary btn-md pull-right" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                    var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='radio'], select"),
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
                    var url = "<?php echo Router::url('/users/pricing/');?>" + track;
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
                            newVal = 1;
                        }
                    }
                    btn.closest('.number-spinner').find('input').val(newVal);
                });

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    height: 650,
                    navLinks: true, // can click day/week names to navigate views
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end) {
                        // Display the modal.
                        // You could fill in the start and end fields based on the parameters
                        $('.modal').modal('show');

                    },
                    eventClick: function (event, element) {
                        // Display the modal and set the values to the event values.
                        $('.modal').modal('show');
                        $('.modal').find('#title').val(event.title);
                        $('.modal').find('#starts-at').val(event.start);
                        $('.modal').find('#ends-at').val(event.end);

                    },
                    editable: true,
                    eventLimit: true // allow "more" link when too many events

                });

                // Bind the dates to datetimepicker.
                // You should pass the options you need
                $("#starts-at, #ends-at").datepicker();

                // Whenever the user clicks on the "save" button om the dialog
                $('#save-event').on('click', function () {
                    var title = $('#title').val();
                    if (title) {
                        var eventData = {
                            title: title,
                            start: $('#starts-at').val(),
                            end: $('#ends-at').val()
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    $('#calendar').fullCalendar('unselect');

                    // Clear modal inputs
                    $('.modal').find('input').val('');

                    // hide modal
                    $('.modal').modal('hide');
                });

            });
        </script>


