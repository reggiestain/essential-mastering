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
<style>
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; font-size: 18px; font-weight: bold}
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
    .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    .tab-pane { padding: 15px 0; }
    .tab-content{padding:20px}

    .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
    body{ background: #EDECEC; padding:50px}
</style>
<body class="skin-blue">
    <div class="wrapper">      
        <?php echo $this->element('mentor/header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php echo $this->element('mentor/sidebar'); ?>  
        <!-- Right side column. Contains the navbar and content of the page -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Content
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
                <?php echo $this->element('mentor/card'); ?>  
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header"> 
                                <h3>Content</h3>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Nav tabs --><div class="card">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
                                                <li role="presentation"><a href="#mission" aria-controls="mission" role="tab" data-toggle="tab">Mission</a></li>
                                                <li role="presentation"><a href="#vision" aria-controls="vision" role="tab" data-toggle="tab">Vision</a></li>
                                                <li role="presentation"><a href="#values" aria-controls="values" role="tab" data-toggle="tab">Values</a></li>
                                                <li role="presentation"><a href="#services" aria-controls="values" role="tab" data-toggle="tab">Services</a></li>
                                                <!--<li role="presentation"><a href="#price" aria-controls="values" role="tab" data-toggle="tab">Pricing</a></li>-->
                                                <li role="presentation"><a href="#terms" aria-controls="values" role="tab" data-toggle="tab">Terms</a></li>
                                                <li role="presentation"><a href="#policy" aria-controls="values" role="tab" data-toggle="tab">Policy</a></li>
                                                <li role="presentation"><a href="#track" aria-controls="values" role="tab" data-toggle="tab">Prepare Your Track</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <?php echo $this->Form->create($content, ['id' => 'form', 'url' => ['controller' => 'users', 'action' => 'content']]); ?>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="about">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('about', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'about-c', 'required' => false, 'error' => true]); ?>   
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="mission">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('mission', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'mission-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="vision">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('vision', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'vision-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="values">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('our_values', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'values-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="services">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('services', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'service-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="terms">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('terms', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'terms-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="policy">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('policy', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'policy-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="track">
                                                    <div><?php echo $this->Flash->render(); ?></div>
                                                    <div class="form-group">
                                                        <?php echo $this->Form->textarea('track_info', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'track-c', 'required' => false, 'error' => true]); ?>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </div> 
                                            </div>
                                            <?php echo $this->Form->end(); ?>
                                        </div>
                                    </div>
                                </div>                                                               
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
        $('#about-c').summernote();
        $('#mission-c').summernote();
        $('#vision-c').summernote();
        $('#values-c').summernote();
        $('#service-c').summernote();
        $('#terms-c').summernote();
        $('#policy-c').summernote();
        $('#track-c').summernote();
    });
</script>