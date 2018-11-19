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

<!-- About -->
<div id="about" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Welcome</h2>
                <p>
                    <b>Essential Mastering</b> offers a highly advanced audio post-production service in pursuit of delivering professional quality tracks to the client. The company also offers professional audio production and recording services in the creation of jingles, adverts, audio flyers and other related products.    
                </p>
                <p>
                    Based in South Africa, Essential Mastering exemplifies quality and value for money, providing our clients with the highest standards of audio post-production services available in the country.
                    <a href="#contact" class="main-btn">Contact Us</a>
                </p>
            </div>
            <!-- /Section header -->

            <!-- about -->
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="./img/v-1.jpg" alt="Lights" style="width:100%">
                    <div class="caption">
                        <h3> OUR MISSION </h3>
                        <p>
                            We endeavour to reach our goals by leveraging our expertise, experience and state-of-the -art resources to produce work that is of the highest international standard, ensuring outcomes that consistently exceed client expectations. 
                            We are committed to delivering high level of efficiency.    
                        </p>
                    </div>
                    <!-- <a href="#">Read more</a>-->
                </div>   
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="./img/v-2.jpg" alt="Lights" style="width:100%">
                    <div class="caption">
                        <h3>OUR VALUES</h3>
                        <p>
                            Quality and Reliability in all services that are carried out. Dedication and discipline in maintaining a high standard of customer service. Respect and appreciation for staff, associates and customers. 
                            Honesty and integrity in all business dealings, both internally and externally.    
                        </p>
                    </div>
                </div>
            </div>
            <!-- /about -->

            <!-- about -->
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="./img/v-3.jpg" alt="Lights" style="width:100%">
                    <div class="caption">
                        <h3>OUR VISION</h3>
                        <p>
                            We strive to provide world-class audio post-production services for a 
                            wide variety of clients to the extent that we become the preferred of such services in South Africa and beyond. The customer can count on us to credibly meet and exceed their expectations through continuous service improvement.   
                        </p>
                    </div>
                </div>
            </div>
            <!-- /about -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /About -->


<!-- Portfolio -->
<div id="portfolio" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Check Some Of Our Awesome Work</h2>
            </div>
            <!-- /Section header -->

            <!-- Work -->
            <div class="col-md-3 col-xs-6 work">
                <img class="img-responsive" src="./img/work-1.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Letsholo - Umuntu Wami</span>
                    <h3>Afro Pop</h3>
                    <div class="work-link">
                        <a href="#"><i class="fa fa-external-link"></i></a>
                        <a class="lightbox" href="./img/work-1.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->

            <!-- Work -->
            <div class="col-md-3 col-xs-5 work">
                <img class="img-responsive" src="./img/work-7.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Essential i - The Flipsite</span>
                    <h3>Deep House</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-7.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->
            <div class="col-md-3 col-xs-5 work">
                <img class="img-responsive" src="./img/work-2.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Mphuzi Chauke - Vuyani</span>
                    <h3>Afro Soul (Traditional)</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-2.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->
            <!-- Work -->
            <div class="col-md-3 col-xs-6 work">
                <img class="img-responsive" src="./img/work-3.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Mindlo & Essential i - Truth Is Truth</span>
                    <h3>Deep House</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-3.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->

            <!-- Work -->
            <div class="col-md-3 col-xs-5 work">
                <img class="img-responsive" src="./img/work-4.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Lu Africansoil - Zaka Mixtape</span>
                    <h3>Hip Hop</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-4.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->
            <div class="col-md-3 col-xs-5 work">
                <img class="img-responsive" src="./img/work-6.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Mindlo & Essential i - Auxiliary</span>
                    <h3>Deep House</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-6.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- Work -->
            <div class="col-md-3 col-xs-6 work">
                <img class="img-responsive" src="./img/work-8.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Ole - Forever (Remix Edition)</span>
                    <h3>House</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-8.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->

            <!-- Work -->
            <div class="col-md-3 col-xs-5 work">
                <img class="img-responsive" src="./img/work-9.jpg" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>Essential i feat Ole - We Are Africa</span>
                    <h3>Afro House</h3>
                    <div class="work-link">
                        <!--<a href="#"><i class="fa fa-external-link"></i></a>-->
                        <a class="lightbox" href="./img/work-9.jpg"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Work -->                    
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Portfolio -->

<!-- Service -->
<div id="service" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Our Services</h2>
            </div>
            <!-- /Section header -->
            <p>
                We have the technical expertise to offer professional audio post-production services through our team of experienced and dedicated mastering engineers. 
                We implement the latest mastering techniques and cutting edge mastering resources to provide clients with the best available sound production for their specific applications. 
                Our standard audio quality ranges from 16bit sampled at 44 kHz (CD quality) to 24bit Hi-Resolution sampled at 96 kHz or more, depending on client requirements. 
                We remain committed to delivering a high quality service within the agreed time-frame and the applicable budget. 
                In order to continue our fascination with technology and improve the convenience factor for our clients, we have developed a digital platform to enable online uploading of audio files, online payment processing, digital booking and other advanced services that can be enjoyed remotely at the client’s ultimate convenience. 
                Thanks to the amalgamation of skills and expertise brought to the table by the founding members and managers of the company, Essential Mastering has been able to leverage these skills to bring the business into the future and provide clients with the ultimate online offering.
            </p>
            <!-- service -->
            <div class="col-md-12 col-sm-6">
                <div class="service">
                    <i class="fa fa-music"></i>
                    <h3>Mastering</h3>
                    <p>
                        Mastering, a form of audio post production, is the process of preparing and transferring recorded audio from a source containing the final mix to a data storage device (the master); the source from which all copies will be produced (via methods such as pressing, duplication or replication). 
                        In recent years digital masters have become usual, although analog masters, such as audio tapes, are still being used by the manufacturing industry, notably by a few engineers who have chosen to specialize in analog mastering.   
                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-12 col-sm-6">
                <div class="service">
                    <i class="fa fa-headphones"></i>
                    <h3>Mixing</h3>
                    <p>
                        Audio mixing is the process by which multiple sounds are combined into one or more channels. 
                        In the process, a source's volume level, frequency content, dynamics, and panoramic position are manipulated and or enhanced. Also, effects such as reverberation and echo may be added. This practical, aesthetic, or otherwise creative treatment is done in order to produce a finished version that is appealing to listeners.    
                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-12 col-sm-6">
                <div class="service">
                    <i class="fa fa-microphone"></i>
                    <h3>Recording</h3>
                    <p>
                        To add to our catalog of services, we also offer recording of adverts, jingles and audio flyers. In digital recording, audio signals picked up by a microphone or other 
                        transducer or video signals picked up by a camera or similar device are converted into a stream of discrete numbers, representing the changes over time in air pressure for audio, and chroma and luminance values for video, then recorded to a storage device.   
                    </p>
                </div>
            </div>
            <!-- /service -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Service -->


<!-- Why Choose Us -->
<div id="features" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- why choose us content -->
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="title">Advert and Jingle Production</h2>
                </div>
                <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/329345806&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>	
            </div>
            <!-- /why choose us content -->

            <!-- About slider -->
            <div class="col-md-6">
                <div id="about-slider" class="owl-carousel owl-theme">
                    <img class="img-responsive" src="./img/about1.jpg" alt="">
                    <img class="img-responsive" src="./img/about2.jpg" alt="">
                    <img class="img-responsive" src="./img/about1.jpg" alt="">
                    <img class="img-responsive" src="./img/about2.jpg" alt="">
                </div>
            </div>
            <!-- /About slider -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Why Choose Us -->


<!-- Numbers -->
<div id="numbers" class="section sm-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./img/background2.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-users"></i>
                    <h3 class="white-text"><span class="counter">451</span></h3>
                    <span class="white-text">Happy clients</span>
                </div>
            </div>
            <!-- /number -->

            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-trophy"></i>
                    <h3 class="white-text"><span class="counter">12</span></h3>
                    <span class="white-text">Awards won</span>
                </div>
            </div>
            <!-- /number -->

            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-coffee"></i>
                    <h3 class="white-text"><span class="counter">154</span>K</h3>
                    <span class="white-text">Cups of Coffee</span>
                </div>
            </div>
            <!-- /number -->

            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-file"></i>
                    <h3 class="white-text"><span class="counter">45</span></h3>
                    <span class="white-text">Projects completed</span>
                </div>
            </div>
            <!-- /number -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Numbers -->

<!-- Pricing -->
<div id="pricing" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Pricing Table</h2>
            </div>
            <!-- /Section header -->

            <!-- pricing -->
            <div class="col-sm-4">
                <div class="pricing">
                    <div class="price-head">
                        <span class="price-title">Basic plan</span>
                        <div class="price">
                            <h3>$9<span class="duration">/ month</span></h3>
                        </div>
                    </div>
                    <ul class="price-content">
                        <li>
                            <p>1GB Disk Space</p>
                        </li>
                        <li>
                            <p>100 Email Account</p>
                        </li>
                        <li>
                            <p>24/24 Support</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <button class="outline-btn">Purchase now</button>
                    </div>
                </div>
            </div>
            <!-- /pricing -->

            <!-- pricing -->
            <div class="col-sm-4">
                <div class="pricing">
                    <div class="price-head">
                        <span class="price-title">Silver plan</span>
                        <div class="price">
                            <h3>$19<span class="duration">/ month</span></h3>
                        </div>
                    </div>
                    <ul class="price-content">
                        <li>
                            <p>1GB Disk Space</p>
                        </li>
                        <li>
                            <p>100 Email Account</p>
                        </li>
                        <li>
                            <p>24/24 Support</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <button class="outline-btn">Purchase now</button>
                    </div>
                </div>
            </div>
            <!-- /pricing -->

            <!-- pricing -->
            <div class="col-sm-4">
                <div class="pricing">
                    <div class="price-head">
                        <span class="price-title">Gold plan</span>
                        <div class="price">
                            <h3>$39<span class="duration">/ month</span></h3>
                        </div>
                    </div>
                    <ul class="price-content">
                        <li>
                            <p>1GB Disk Space</p>
                        </li>
                        <li>
                            <p>100 Email Account</p>
                        </li>
                        <li>
                            <p>24/24 Support</p>
                        </li>
                    </ul>
                    <div class="price-btn">
                        <button class="outline-btn">Purchase now</button>
                    </div>
                </div>
            </div>
            <!-- /pricing -->

        </div>
        <!-- Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Pricing -->


<!-- Testimonial -->
<div id="testimonial" class="section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./img/background3.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Testimonial slider -->
            <div class="col-md-10 col-md-offset-1">
                <div id="testimonial-slider" class="owl-carousel owl-theme">

                    <!-- testimonial -->
                    <div class="testimonial">
                        <div class="testimonial-meta">
                            <img src="./img/perso1.jpg" alt="">
                            <h3 class="white-text">John Doe</h3>
                            <span>Web Designer</span>
                        </div>
                        <p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
                    </div>
                    <!-- /testimonial -->

                    <!-- testimonial -->
                    <div class="testimonial">
                        <div class="testimonial-meta">
                            <img src="./img/perso2.jpg" alt="">
                            <h3 class="white-text">John Doe</h3>
                            <span>Web Designer</span>
                        </div>
                        <p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
                    </div>
                    <!-- /testimonial -->

                </div>
            </div>
            <!-- /Testimonial slider -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Testimonial -->

<!-- Team -->
<div id="team" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Our Team</h2>
            </div>
            <!-- /Section header -->

            <!-- team -->
            <div class="col-sm-6">
                <div class="team">
                    <div class="team-img">
                        <img class="img-responsive" src="./img/team-1.JPG" alt="">
                        <div class="overlay">
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3>Itumeleng Riba</h3>
                        <span><b>Head Engineer, Producer & Co-Owner</b></span>
                        <p>
                            Itumeleng Riba, also known as ‘Essential-I’, is the head engineer and producer for various artists through Essential
                            Mastering, which he co-owns. Developing a passion for music as a young DJ, he began to learn about sound system setup and engineering as he grew up. He then went into music production in 2005, where he produced for South African artists, including a deal to remix for Black Coffee and Zakes Bantwini’s hit single ‘Juju’ in 2010. He went on to work with the likes of Theo Kgosinkwe from Mafikizolo, Shota, Bucie and a host of other South African artists and DJs. Having successfully worked with a number of prominent artists in the entertainment industry, he has developed a reputation as a seasoned audio engineer who meticulously crafts his art with the utmost precision. He has often been asked to share his knowledge with upcoming music producers at the South African Music Conference, and his international experience includes work released under a German label called GoGo Music (headed by Ralf Gum), and Warm Days in the UK with QB Smith and Monique Bingham.   
                        </p>
                    </div>
                </div>
            </div>
            <!-- /team -->

            <!-- team -->
            <div class="col-sm-6">
                <div class="team">
                    <div class="team-img">      
                        <?php echo $this->Html->image('team-2.jpg',['alt'=>'team-2']);?>
                        <div class="overlay">
                            <div class="team-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3>Cornelius Mashilane</h3>
                        <span><b>Music Producer/Sound Engineer</b></span>
                        <p>
                            Cornelius Mashilane, the self-taught DJ and producer popularly known as Cornelius SA, has emerged as one of South Africa’s most talented electronic musicians. 
                            With an abiding keenness for hypnotic house, Kenny Dope signed him and released his single “Heaven” in 2016. His subsequent records “Keep Your Mouth Shut” and “Boogie Woogie” are submerged in deep house vibes spiked with soul, Afro-house and just a twinge of techno. Like his emotive and in-demand DJ sets, they’re dark, delicious and deeply satisfying.    
                        </p>
                    </div>
                </div>
            </div>
            <!-- /team -->
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Team -->

<!-- Blog -->
<!--<div id="blog" class="section md-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">Recents news</h2>
            </div>
            <div class="col-md-4">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="./img/blog1.jpg" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>John doe</li>
                            <li><i class="fa fa-clock-o"></i>18 Oct</li>
                            <li><i class="fa fa-comments"></i>57</li>
                        </ul>
                        <h3>Molestie at elementum eu facilisis sed odio</h3>
                        <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                        <a href="blog-single.html">Read more</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="./img/blog2.jpg" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>John doe</li>
                            <li><i class="fa fa-clock-o"></i>18 Oct</li>
                            <li><i class="fa fa-comments"></i>57</li>
                        </ul>
                        <h3>Molestie at elementum eu facilisis sed odio</h3>
                        <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                        <a href="blog-single.html">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive"  src="./img/blog3.jpg" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>John doe</li>
                            <li><i class="fa fa-clock-o"></i>18 Oct</li>
                            <li><i class="fa fa-comments"></i>57</li>
                        </ul>
                        <h3>Molestie at elementum eu facilisis sed odio</h3>
                        <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                        <a href="blog-single.html">Read more</a>
                    </div>
                </div>
            </div>
           </div>
    </div>
</div>-->
<!-- /Blog -->

<!-- Contact -->
<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Call Us Now</h3>
                    <p>0763843510</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p>info@essentialmastering.co.za</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-map-marker"></i>
                    <h3>Visit Us</h3>
                    <p>Phoenix View Estate, Midrand</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form">
                    <input type="text" class="input" placeholder="Name">
                    <input type="email" class="input" placeholder="Email">
                    <input type="text" class="input" placeholder="Subject">
                    <textarea class="input" placeholder="Message"></textarea>
                    <button class="main-btn">Send message</button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Contact -->        

<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <?php echo $this->Form->create($users, ['id' => 'login-form', 'url' => ['controller' => 'users', 'action' => 'login']]); ?>
            <div class="modal-body">
                <div class="log-alert"></div>
                <div class="form-group col-md">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="log-email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="log-pwd">
                </div>
            </div>
            <div class="modal-footer">       
                <button type="button" class="btn btn-link pull-left reg">Register</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Login</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <?php echo $this->Form->create($users, ['id' => 'reg-form', 'url' => ['controller' => 'users', 'action' => 'register']]); ?>
            <div class="modal-body">
                <div class="reg-alert"></div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Username:</label>
                    <?php echo $this->Form->input('username', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">First Names:</label>
                    <?php echo $this->Form->input('first_name', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Surname:</label>
                    <?php echo $this->Form->input('surname', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                </div> 
                <div class="row">               
                    <div class="form-group col-md-6">
                        <label for="email">Email address:</label>
                    <?php echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'email', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Mobile:</label>
                    <?php echo $this->Form->input('mobile', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'text', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="gender" class="form-label">Gender</label>    
                        <?php
                        $gender = ['Male' => 'Male', 'Female' => 'Female'];
                        echo $this->Form->select('gender', $gender, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="race" class="form-label">Race</label>    
                        <?php
                        $race = ['Black'=>'Black','Coloured'=>'Coloured','Indian'=>'Indian','White'=>'White','Other'=>'Other'];
                        echo $this->Form->select('race', $race, ['empty' => '--Choose One--', 'class' => 'form-control', 'label' => false, 'required' => false, 'error' => true]);
                        ?>
                    </div>    

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="pwd">Password:</label>
                    <?php echo $this->Form->input('password', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'password', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pwd">Confirm Password:</label>
                    <?php echo $this->Form->input('confirm_password', ['templates' => ['inputContainer' => '{{content}}'], 'type' => 'password', 'label' => false, 'class' => 'form-control', 'required' => false, 'error' => true]); ?>
                    </div>
                </div>    
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-link pull-left login">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Register</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>        
    </div>
</div>
<!-- Modal -->
<div id="rModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BOOKING</h4>
                </div>
                <div class="modal-body">        
                    <div class="form-group">    
                        <label>Choose a service</label> 
                    </div>
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
                    </div></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on("click", ".login", function () {
            $("#regModal").modal('hide');
            $("#loginModal").modal();
        });

        $(document).on("click", ".reg", function () {
            $("#loginModal").modal('hide');
            $("#regModal").modal();
        });
        
        $('#login-form').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if(data == false) {   
                        $(".log-alert").html("<div class='alert alert-danger'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Incorrect email or password</strong></div>");
                    }
                    else if(data == true) {
                        window.location.href = "<?php echo Router::url('/users/dashboard'); ?>";
                    }
                    else{
                        $(".log-alert").html("<div class='alert alert-danger'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>An error occured, please try again.</strong></div>"); 
                    }    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $(".log-alert").html("<div class='alert alert-danger'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>"+errorThrown+"</strong></div>"); 
                }
            });
        });

        $('#reg-form').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data == '200') {
                        $("#regModal").modal('toggle');
                        $("#loginModal").modal();
                        $(".log-alert").html("<div class='alert alert-success'>\n\
                                   <a class='close' href='#' data-dismiss='alert' aria-label='close' title='close'>×</a>\n\
                                   <strong>Success!</strong> Registration was successful, please login with your email and password.</div>");
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    //location.reload();
                }
            });
        });
    });
</script>