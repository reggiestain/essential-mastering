<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
?>

<body class="skin-blue">
    <div class="wrapper">      
    <?php echo $this->element('mentor/header');?>
        <!-- Left side column. contains the logo and sidebar -->
    <?php echo $this->element('mentor/sidebar');?>  
        <!-- Right side column. Contains the navbar and content of the page -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Reservation
                    <small>View</small>
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
                                <h3>Reservation View</h3>
                            </div>
                            <!-- /.box-header -->
                            <?php echo $this->Form->create($order, ['id' => 'reg-form', 'url' => ['controller' => 'users', 'action' => 'register']]); ?>        
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Service:</label>  
                                    <?php echo $this->Form->input('temp_service', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','class' => 'form-control','label' => false, 'required' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Number of tracks:</label>
                                    <?php echo $this->Form->input('temp_track', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div> 
                                <div class="row">                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Total Amount:</label>
                                     <?php echo $this->Form->input('temp_total', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Reservation Date:</label>
                                    <?php echo $this->Form->input('temp_date', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'email', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div> 
                                <div class="row">               
                                    <div class="form-group col-md-6">
                                        <label for="email">Radio Edit:</label>
                                    <?php echo $this->Form->input('radio_edit', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Back Track:</label>
                                     <?php echo $this->Form->input('back_track', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div>
                                <div class="row">               
                                    <div class="form-group col-md-6">
                                        <label for="email">Instrumental:</label>
                                    <?php echo $this->Form->input('instru', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Status:</label>
                                     <?php echo $this->Form->input('status', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div>
                                <div class="modal-footer">                                    
                                    <a href="<?php echo Router::url('/users/orders');?>" class="btn btn-default"><span class="fa fa-arrow-right"></span></a>
                                </div>
                          <?php echo $this->Form->end(); ?>
                            </div> 
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
</body>  

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>