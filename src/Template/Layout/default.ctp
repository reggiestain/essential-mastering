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
$cakeDescription = 'Essencial Mastering';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=max-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            <?php echo $cakeDescription; ?>
            <?php //echo $this->fetch('title');?>
        </title>
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?php //echo $this->Html->css('bootstrap.min.css'); ?>
        <!-- Owl Carousel -->
        <?php echo $this->Html->css('owl.carousel.css'); ?>
        <?php echo $this->Html->css('owl.theme.default.css'); ?>
        <!-- Magnific Popup -->
        <?php echo $this->Html->css('magnific-popup.css'); ?>
        <!-- Font Awesome Icon -->
        <?php echo $this->Html->css('font-awesome.min.css'); ?>
        <!-- Custom stlylesheet -->
        <?php echo $this->Html->css('bootstrap-dropdownhover.min.css'); ?>
        <?php echo $this->Html->css('cake-style.css');?>
        <?php echo $this->Html->css('style.css'); ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <style>
            .caption{
                color:#868F9B !important;  
                text-align: center;
            } 
            .login, .reg{
                text-align:center;
            }
        </style>
        <!-- /Header -->
        <?php echo $this->element('headers/header');?>
        <!-- /Header -->
        <?php echo $this->fetch('content');?>
        <!-- Footer -->
        <?php echo $this->element('footers/footer');?>
        <!-- /Footer -->
        <!-- jQuery Plugins -->
        <?php echo $this->Html->script('jquery.min.js'); ?>
        <?php echo $this->Html->script('bootstrap.min.js'); ?>
        <?php echo $this->Html->script('bootstrap-dropdownhover.min.js'); ?>
        <?php echo $this->Html->script('owl.carousel.min.js'); ?>
        <?php echo $this->Html->script('jquery.magnific-popup.js'); ?>
        <?php echo $this->Html->script('main.js'); ?>
    </body>
</html>
