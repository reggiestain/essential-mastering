<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\View\Exception\MissingTemplateException;
use Cake\Http\Client;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     *
     * @var type 
     */
    private $amdorenkey = 'U7ABNSyefTt2yCFQdrPrR7CVSQuXur';
    private $fixerkey = '4ec0b8a0f028a05954a7e519704aec22';

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        $this->loadComponent('Csrf');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Basic',
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'authError' => 'Did you really think you are allowed to see that?',
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'home'
            ]
        ]);
    }

    /**
     * 
     * @param Event $event
     */
    public function beforeFilter(\Cake\Event\Event $event) {
        $this->loadModel('AuditLogs');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $this->loadModel('Content');        
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function nice_date($date) {
        $now = Time::parse($date);
        return $now->nice();
    }

    protected function sendmail($id) {
        $order = $this->Orders->get($id);
        $DefaultEmail = new Email();
        $DefaultEmail->viewVars(['id' => $id, 'topay' => $order->amount_to_pay, 'currency' => $order->foreign_currency_purchased, 'amount' => $order->amount_of_foreign_currency]);
        $DefaultEmail->transport('default');
        $DefaultEmail->template('orderdetails', 'orderdetails')
                ->emailFormat('html')
                ->from(['info@siyanontech.co.za' => 'siyanontech.co.za'])
                ->to($this->Auth->user('email'))
                ->subject('Order Details')
                ->send();
    }

    function in_range($number, $min, $max, $inclusive = FALSE) {
        if (is_int($number) && is_int($min) && is_int($max)) {
            return $inclusive ? ($number >= $min && $number <= $max) : ($number > $min && $number < $max);
        }

        return FALSE;
    }

    protected function fetchRate() {
        $http = new Client();
        $response = $http->get('http://data.fixer.io/api/latest?access_key=' . $this->fixerkey);

        return $response;
    }

    protected function convert($from, $to, $amount) {
        $http = new Client();
        $response = $http->get('https://www.amdoren.com/api/currency.php?api_key=' . $this->amdorenkey . '&from=' . $from . '&to=' . $to . '&amount=' . $amount);
        if ($response->isOk()) {
            $result = json_decode($response->body(), true);
            return $result['amount'];
        }
        return false;
    }

}
