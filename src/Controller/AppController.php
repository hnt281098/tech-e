<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $helpers = ['Form','Paginator','Html', 'Session'];
    public $components = ['RequestHandler'];

    public $paginate = [];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'passwordHasher' => [
                        'className' => 'Default'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => 'Backend'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize',
        ]);
        $this->Auth->allow(['login', 'logout', 'register']);

        $this->Session = $this->request->getSession();

        $this->loadModel('Informations');
        $this->loadModel('Categories');

        $info = $this->Informations->find('all');
        $cateLv1 = $this->Categories->find('all', ['fields'=>['id', 'name'], 'conditions'=>['parent_id=0']]);
        $cateLv2 = $this->Categories->find('all', ['fields'=>['id', 'parent_id', 'name'], 'conditions'=>['parent_id!=0']]);
        $this->set('info', $info);
        $this->set('cateLv1', $cateLv1);
        $this->set('cateLv2', $cateLv2);
    }

    public function beforeRender(Event $event)
    {
        if (!empty($this->Auth->user())) {
            $currentUser = $this->Auth->user();
            $this->set(compact('currentUser'));
        }
    }
}
