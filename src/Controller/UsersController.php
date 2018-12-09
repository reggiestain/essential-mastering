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

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;
use Cake\View\Exception\MissingTemplateException;
use Cake\Http\Client;
use Cake\Http\ServerRequest;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['home', 'register', 'login', 'cancel']);
        $this->loadComponent('RequestHandler');

        $this->set('user', $this->Auth);
        if ($this->Auth->user('id') == 2) {
            $this->set('master', $this->Orders->find()->where(['temp_service' => 'mastering', 'user_id' => $this->Auth->user('id')])->count());
            $this->set('mixing', $this->Orders->find()->where(['temp_service' => 'mixing', 'user_id' => $this->Auth->user('id')])->count());
            $this->set('record', $this->Orders->find()->where(['temp_service' => 'recording', 'user_id' => $this->Auth->user('id')])->count());
        } else {
            $this->set('master', $this->Orders->find()->where(['temp_service' => 'mastering'])->count());
            $this->set('mixing', $this->Orders->find()->where(['temp_service' => 'mixing'])->count());
            $this->set('record', $this->Orders->find()->where(['temp_service' => 'recording'])->count());
        }
    }

    /**
     * Displays home view
     */
    public function home() {
        $content = $this->Content->get(1);
        $user = $this->Users->newEntity();
        $this->set('users', $user);
        $this->set('content', $content);
    }

    public function cancel() {

        $this->viewBuilder()->layout('admin');
    }

    public function success() {

        $this->viewBuilder()->layout('admin');
    }

    /**
     * Displays login view
     */
    public function dashboard() {
        $user = $this->Users->find();
        $order = $this->Orders->newEntity();
        $this->set('order', $order);
        $this->set('users', $user);
        $this->set('title', 'Dashboard');

        $this->viewBuilder()->layout('admin');
    }

    /**
     * 
     * @return type
     */
    public function login() {
        if ($this->request->is('ajax')) {
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    $auditTable = $this->AuditLogs->newEntity();
                    $Log = ['user_id' => $this->Auth->user('id'), 'event' => 'Sign In'];
                    $Audit = $this->AuditLogs->patchEntity($auditTable, $Log);
                    $this->AuditLogs->save($Audit);
                    //$this->Flash->success(__('Welcome ' . $this->Auth->user('email')));
                    //return $this->redirect($this->Auth->redirectUrl());
                    $status = true;
                } else {
                    //$this->Flash->error(__('Incorrect email or password'));
                    $status = false;
                }
            }
            $this->set('status', $status);
            $this->viewBuilder()->layout(false);
        }
    }

    /**
     * Register method
     */
    public function register() {
        if ($this->request->is('ajax')) {
            $user = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $userdata = $this->Users->patchEntity($user, $this->request->data);
                if (empty($user->errors())) {
                    $this->Users->save($user);
                    $status = '200';
                    $message = '';
                } else {
                    $error_msg = [];
                    foreach ($user->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg[] = $errors;
                        }
                    }
                    $status = 'error';
                    $message = $error_msg;
                }
            }
            $this->set("status", $status);
            $this->set("message", $message);

            $this->viewBuilder()->layout(false);
        }
    }

    public function pricing($track, $service) {

        if ($this->request->is('ajax')) {
            $number = (int) $track;
            $extra = number_format(55);

            if ($service == 'Mixing') {
                $extra = number_format(100);

                if ($this->in_range($number, 0, 4)) {
                    $price = 450;
                } elseif ($this->in_range($number, 3, 8)) {
                    $price = 400;
                } elseif ($this->in_range($number, 7, 13)) {
                    $price = 350;
                }
            }

            if ($service == 'Mastering') {
                if ($this->in_range($number, 0, 4)) {
                    $price = 450;
                } elseif ($this->in_range($number, 3, 8)) {
                    $price = 400;
                } elseif ($this->in_range($number, 7, 13)) {
                    $price = 350;
                }
            }

            $this->set('price', $price);
            $this->set('number', $number);
            $this->set('extra', $extra);
        }

        $this->viewBuilder()->layout(false);
    }

    public function profile() {
        $profile = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($profile, $this->request->data);
            if ($this->Users->save($profile)) {
                $this->Flash->success(__('Your Profile has been updated.'));
                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('Unable to update your profile.'));
        }
        $this->set('profile', $profile);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * 
     * @param type $id
     */
    public function orders() {
        $order = $this->Orders->find()->where(['user_id' => $this->Auth->user('id')]);
        $this->set('orders', $order);
        $this->viewBuilder()->layout('admin');
    }

    public function users() {
        $users = $this->Users->find('all');
        $this->set('users', $users);
        $this->viewBuilder()->layout('admin');
    }

    public function edit($id) {
        $users = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($users, $this->request->data);
            if ($this->Users->save($users)) {
                $this->Flash->success(__('User has been updated.'));
                return $this->redirect(['action' => 'users']);
            }
            $this->Flash->error(__('Unable to update your user.'));
            return $this->redirect(['action' => 'edit', $id]);
        }
        $this->set('users', $users);
        $this->viewBuilder()->layout('admin');
    }

    public function viewOrder($id) {
        $order = $this->Orders->get($id);
        $this->set('order', $order);
        $this->viewBuilder()->layout('admin');
    }

    public function content() {
        $content = $this->Content->get(1);
        if ($this->request->is(['post', 'put'])) {
            $this->Content->patchEntity($content, $this->request->data);
            if ($this->Content->save($content)) {
                $this->Flash->success(__('Content has been updated.'));
                return $this->redirect(['action' => 'content']);
            }
            $this->Flash->error(__('Unable to update your content.'));
        }
        $this->set('content', $content);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * 
     */
    public function saveOrder() {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            $order->user_id = $this->Auth->user('id');
            if ($this->Orders->save($order)) {
                exit();
                //$this->Flash->success(__('Your order has been saved.'));
                //return $this->redirect(['action' => 'orders']);
            }
            $this->Flash->error(__('Unable to save your order.'));
        }
        $this->set('order', $order);
    }

    /**
     * 
     * @return type
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
