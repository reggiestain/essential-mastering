<?php
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">             
              <?php echo $this->Html->image('afro.jpg',['class'=>'img-circle']);?>
            </div>
            <div class="pull-left info">
              <p><?php echo $user->user('username');?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <!--<li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>-->
           <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li>
           
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>My Profile</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-user"></i> <span>Profile</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            
             <?php if($user->user_group_id == 2) {?>
            <li class="treeview" data-toggle="collapse" data-target="#">
              <a href="#">
                <i class="fa fa-plus"></i>
                <span>Careers</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>              
              <ul class="treeview-menu">
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/admin/index');?>"><i class="fa fa-circle-o"></i> All Careers</a></li>
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/admin/create');?>"><i class="fa fa-circle-o"></i> Create Career</a></li>
                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
              </ul>
              </li>
              <?php } ?>                         
            
             <?php if($user->user_group_id == 3) {?>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Programs</span>
                <i class="fa fa-angle-left pull-right" ></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/mentors/list_progam');?>"><i class="fa fa-circle-o"></i> All Programs</a></li>
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/mentors/create_program');?>"><i class="fa fa-circle-o"></i> Create Program</a></li>
                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
              </ul>
            </li>  
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-word-o" aria-hidden="true"></i>
                <span>Contents</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/mentors/list_progam');?>"><i class="fa fa-circle-o"></i> All content</a></li>
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/mentors/create_program');?>"><i class="fa fa-circle-o"></i> Create Create</a></li>
                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
              </ul>
             </li>   
             <li class="treeview">
              <a href="#">
                <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                <span>Tests</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/tests/index');?>"><i class="fa fa-circle-o"></i> All Test</a></li>
                <li><a href="<?php echo Cake\Routing\Router::url('/career3-d/tests/add');?>"><i class="fa fa-circle-o"></i> Create Test</a></li>
                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
              </ul>
               </li>
             <?php } ?>
           
            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
            -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>