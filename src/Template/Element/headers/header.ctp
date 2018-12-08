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

?>
<style>
/* The container <div> - needed to position the dropdown content */
.dropdown-c {
    position: relative;
    display: inline-block;
}

.dropdown-c>a:before {
        font-family: 'FontAwesome';
        content: "\f054";
        font-size: 6px;
        //margin-left: 6px;
        float: right;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-transition: 0.2s transform;
        transition: 0.2s transform;
    }

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #E1C275;}

/* Show the dropdown menu on hover */
.dropdown-c:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown-c:hover .dropbtn {background-color: #3e8e41;}
</style>
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../img/background1.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="index.html">                      
                        <?php echo $this->Html->image('es-logo.png',['class'=>'logo','alt'=>'logo']);?>
                        <!--<img class="logo-alt" src="img/logo-alt.png" alt="logo">-->
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span></span>
                    </button>
                </div>
                <!-- /Collapse nav button -->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <!--  Main navigation  -->
                <ul class="nav navbar-nav navbar-right" id="myNavbar">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">Who We Are</a></li>                       
                    <li><a href="#service">Services</a></li>
                    <li class="dropdown-c"><a href="#pricing">Booking</a>
                        <ul class="dropdown-content">
                            <li><a href="#" class="login">&nbsp Login</a></li>
                            <li><a href="#" class="reg">&nbsp Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Our Team</a></li>
                    <li class="dropdown-c"><a href="#blog">Studio</a>
                        <ul class="dropdown-content">
                            <li><a href="#">&nbsp How to upload / send track</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <!-- /Main navigation -->
            </div>
        </div>
    </nav>
    <!-- /Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div id="Container_Carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <?php echo $this->Html->image('mastering.jpg',['alt'=>'logo']);?>
                            <div class="carousel-caption">
                                <h1 class="white-text">SOOTHING SOUND TO THE EAR</h1>
                                <p class="white-text"> Professional sounds at your fingertips, let us finish what you have started.
                                </p>
                                <button class="white-btn login">CLICK TO MAKE A BOOKING</button>
                                <button class="main-btn">Learn more</button>
                            </div>
                        </div>

                        <div class="item">
                            <?php echo $this->Html->image('mastering.jpg',['alt'=>'logo']);?>
                            <div class="carousel-caption">
                                <h1 class="white-text">SUPERIOR AUDIO ENGINEERING</h1>
                                <p class="white-text"> Professional sounds at your fingertips, let us finish what you have started.
                                </p>
                                <button class="white-btn">CLICK TO MAKE A BOOKING</button>
                                <button class="main-btn">Learn more</button>
                            </div>
                        </div>

                        <div class="item">
                            <?php echo $this->Html->image('mastering.jpg',['alt'=>'logo']);?>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- home content -->
            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>