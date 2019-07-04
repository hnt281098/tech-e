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
namespace Backend\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends BaseController
{

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
        if ($this->request->is('ajax') && empty($this->Auth->user())) {
            $this->response->type('json');
            $this->response->body(json_encode(['timeout' => true]));
            $this->response->statusCode(500);
            
            return $this->response;
        }

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
  
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
            if (!empty($this->Auth->user())) {
                $role = $this->Auth->user('allowedActions');

                if ($role !== 'all' && $this->request->action !== 'logout' && $this->request->action !== 'changePassword') {
                    $allow = $this->checkPermission($role);
                    
                    if (!$allow) {
                        $this->Flash->error(__('You do not have permission for this action'));
                        
                        // return $this->redirect(['controller' => 'Users', 'action' => 'viewDetail', $this->Auth->user('id')]);
                        return $this->redirect($this->referer());
                    }
                }
            }
    }

    public function checkPermission($role)
    {
        $permissionsModel = TableRegistry::get('Permissions');

        $permission = $permissionsModel->find()->where([
            'name' => $this->request->action,
            'controller' => $this->request->controller
        ])
        ->select(['id','status'])
        ->first();

        if ($permission['status'] === 0) {
            $this->Flash->error(__('Action not allowed'));

            return false;
        }
        elseif (!in_array($permission['id'], $role)) {
 
            return false;        
        }

        return true;
    }
}
