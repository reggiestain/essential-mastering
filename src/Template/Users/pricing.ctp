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

?>
        <div class="row">
                <!-- item -->
                <div class="col-md-8 text-center">
                    <div class="panel panel-default panel-pricing">
                        <div class="panel-heading">
                            <!--<i class="fa fa-desktop"></i>-->
                            <h3>Total Price</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p> <h3>R <?php echo number_format($number * $price,2);?></h3></p>
                        </div>
                       <!-- <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Personal use</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Unlimited projects</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 27/7 support</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-danger" href="#">BUY NOW!</a>
                        </div>-->
                    </div>
                </div>
                <!-- /item -->
        </div>
        <h4> Extra options</h4>
	<div class="row">
		<div form-group class="col-md-3">
                    <label class="control-label">Radio Edit (R55.00 each)</label>
			<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="0">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
		</div>
                
                <div form-group class="col-md-3">
                    <label class="control-label">Backtrack (R55.00 each)</label>
			<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="0">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
		</div>
            
                <div form-group class="col-md-3">
                    <label class="control-label">Instrumental (R55.00 each)</label>
			<div class="input-group number-spinner">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
				</span>
				<input type="text" class="form-control text-center" value="0">
				<span class="input-group-btn">
					<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
				</span>
			</div>
		</div>
	</div>
         
        <br>

