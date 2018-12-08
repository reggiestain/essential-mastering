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
                    Reservations
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
                                <h3>Reservations</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service</th>
                                            <th>Number of tracks</th>                       
                                            <th>Total Amount</th>                                           
                                            <th>Comment</th>                                            
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td><?php echo $order->id;?></td>
                                            <td><?php echo $order->temp_service;?></td>
                                            <td><?php echo $order->temp_track;?></td>                                            
                                            <td><?php echo $order->temp_total;?></td>
                                            <td><?php echo $order->comments;?></td>
                                            <td><?php echo $order->temp_date;?></td>
                                            <td><?php echo $order->status;?></td>
                                            <td>
                                            <?php if($user->user('id') == 1){?>
                                            <a href="<?php echo Router::url('/users/view_order/'.$order->id);?>" class="btn btn-primary btn-xs">View</a>                                                                                        
                                            <?php } else { ?>
                                            <a href="<?php echo Router::url('/users/view_order/'.$order->id);?>" class="btn btn-primary btn-xs">View</a>
                                            <button class="btn btn-danger btn-xs">Cancel</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>                                    
                                </table>

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
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>