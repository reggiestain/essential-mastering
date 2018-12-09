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
                    Edit User
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
                                <h3>Edit User</h3>
                            </div>
                            
                            <!-- /.box-header -->
                            <?php echo $this->Form->create($users, ['id' => 'reg-form', 'url' => ['controller' => 'users', 'action' => 'edit']]); ?>        
                            <div class="box-body">
                                <div><?php echo $this->Flash->render();?></div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">First Name:</label>  
                                    <?php echo $this->Form->input('first_name', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','class' => 'form-control','label' => false, 'required' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Surname:</label>
                                    <?php echo $this->Form->input('surname', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div> 
                                <div class="row">                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Email:</label>
                                     <?php echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'email', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Mobile:</label>
                                    <?php echo $this->Form->input('mobile', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                </div> 
                                <div class="row">               
                                    <div class="form-group col-md-6">
                                        <label for="email">Gender:</label>
                                        <?php
                                        $gender = ['male' => 'Male', 'female' => 'Female'];
                                        echo $this->Form->select('gender', $gender, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                                       ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Race:</label>
                                    <?php
                                    $race = ['Black'=>'Black','Coloured'=>'Coloured','Indian'=>'Indian','White'=>'White','Other'=>'Other'];
                                    echo $this->Form->select('race', $race, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                                    ?>
                                     </div>
                                </div>
                                <div class="row">               
                                    <div class="form-group col-md-6">
                                        <label for="email">Username:</label>
                                    <?php echo $this->Form->input('username', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="email">User Group:</label>
                                     <?php
                                     $group = [1=>'Client',2=>'Admin'];
                                     echo $this->Form->select('user_group_id', $group, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                                     ?>
                                    </div>
                                </div>
                                <div class="modal-footer">                                    
                                    <button type="submit" class="btn btn-primary">Update</button>
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