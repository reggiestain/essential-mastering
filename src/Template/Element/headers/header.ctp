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

<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('img/background1.jpg');">
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
                        <img class="logo" src="img/es-logo.png" alt="logo">
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
                    <li class="has-dropdown"><a href="#pricing">Booking</a>
                        <ul class="dropdown">
                            <li><a href="#" class="login">&nbsp Login</a><a href="#" class="reg">&nbsp Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Our Team</a></li>
                    <li class="has-dropdown"><a href="#blog">Studio</a>
                        <ul class="dropdown">
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
                            <img src="./img/mastering.jpg" alt="Los Angeles">
                            <div class="carousel-caption">
                                <h1 class="white-text">SOOTHING SOUND TO THE EAR</h1>
                                <p class="white-text"> Professional sounds at your fingertips, let us finish what you have started.
                                </p>
                                <button class="white-btn login">CLICK TO MAKE A BOOKING</button>
                                <button class="main-btn">Learn more</button>
                            </div>
                        </div>

                        <div class="item">
                            <img src="./img/mastering.jpg" alt="Chicago">
                            <div class="carousel-caption">
                                <h1 class="white-text">SUPERIOR AUDIO ENGINEERING</h1>
                                <p class="white-text"> Professional sounds at your fingertips, let us finish what you have started.
                                </p>
                                <button class="white-btn">CLICK TO MAKE A BOOKING</button>
                                <button class="main-btn">Learn more</button>
                            </div>
                        </div>

                        <div class="item">
                            <img src="./img/mastering.jpg" alt="New York">
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