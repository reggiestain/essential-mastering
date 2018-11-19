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
                                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
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
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                            <p>Fill your information</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
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
                                                        <div class="checkbox">
                                                            <label style="font-size: 1.8em">
                                                                <input type="checkbox" value="" checked>
                                                                <span class="cr"><i class="cr-icon fa fa-music"></i></span>
                                                                Mastering
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <label style="font-size: 1.8em">
                                                                <input type="checkbox" value="">
                                                                <span class="cr"><i class="cr-icon fa fa-headphones"></i></span>
                                                                Mixing
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="checkbox">
                                                            <label style="font-size: 1.8em">
                                                                <input type="checkbox" value="">
                                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-record"></i></span>
                                                                Recording
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row setup-content" id="step-2">
                                            <div class="col-xs-6 col-md-12">
                                                <div class="col-md-12">
                                                    <h3> Customize service</h3>
                                                    <div class="form-group">
                                                        <label class="control-label">Company Name</label>
                                                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Company Address</label>
                                                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
                                                    </div>
                                                    <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                                </div>
                                            </div>
                                            <div class="row setup-content" id="step-3">
                                                <div class="col-xs-6 col-md-12">
                                                    <div class="col-md-12">
                                                        <h3> Select date and slot</h3>
                                                        <div class="form-group">
                                                            <label class="control-label">Company Name</label>
                                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Company Address</label>
                                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
                                                        </div>
                                                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
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
                                                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row setup-content" id="step-5">
                                                <div class="col-xs-6 col-md-12">
                                                    <div class="col-md-12">
                                                        <h3> Confirm reservation</h3>
                                                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                                                        <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
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
                                    navListItems.removeClass('btn-primary').addClass('btn-default');
                                    $item.addClass('btn-primary');
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
                                        curInputs = curStep.find("input[type='text'],input[type='url']"),
                                        isValid = true;

                                $(".form-group").removeClass("has-error");
                                for (var i = 0; i < curInputs.length; i++) {
                                    if (!curInputs[i].validity.valid) {
                                        isValid = false;
                                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                                    }
                                }

                                if (isValid)
                                    nextStepWizard.removeAttr('disabled').trigger('click');
                            });

                            $('div.setup-panel div a.btn-primary').trigger('click');
                        });
                    </script>


