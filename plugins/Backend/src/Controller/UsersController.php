<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;
use Cake\View\View;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Backend.Role');
        $this->loadComponent('Backend.CheckInputs');
        $this->loadModel('Users');
        if (!empty($this->Auth->user()) && $this->request->action == 'login') {
            $this->Flash->error(__('An account have been logged in, logout first to sign in with another please.'));

            return $this->redirect(['action' => 'viewDetail', $this->Auth->user('id')]);
        }
    }

    public function view()
    {
        $this->loadModel('Roles');
        $users = $this->Users->find()->order(['id'])->toArray();

        foreach ($users as $user) {
            unset($user['password']);
            unset($user['confirm_expired_time']);

            $user['Role'] = $this->Roles->get($user['role_id'])->name;
            unset($user['role_id']);
            unset($user['avatar']);
            unset($user['facebook']);
            unset($user['instagram']);
        }
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewDetail($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        unset($user->password);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->response->type('json');
        $this->response->withStatus(200);
        
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['password', 'email', 'role_id']);

            if (!$check) {
                $this->response->withStatus(500);
                $response = [
                    'message' => 'Not enough required data',
                ];
                $this->response->body(json_encode($response));

                return $this->response;
            }

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $user->user_code = "USER" . $user->id;

                if ($this->Users->save($user)) {
                    $this->response->body(json_encode(['success' => 'true']));
                    
                    return $this->response;
                }
            }

            $this->response->withStatus(500);
            $response = [
                'message' => 'Can not save',
            ];
            $this->response->body(json_encode($response));

            return $this->response;
        }
        $roles = $this->Users->Roles->find()->select(['id', 'name']);

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Users/add_user');
        
        $response = [
            'html' => $html,
            'roles' => $roles,
        ];
        $this->response->body(json_encode($response));

        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function update($id = null)
    {
        $user = $this->Users->findById($this->request->query('id'));
        $this->response->type('json');
        $this->response->withStatus(200);
        if ($this->request->is(['post', 'patch'])) {
            
        }
        $roles = $this->Users->Roles->find()->select(['id', 'name']);

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Users/add_user');
        
        $response = [
            'html' => $html,
            'roles' => $roles,
            'user' =>$user,
        ];
        $this->response->body(json_encode($response));

        return $this->response;
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $id = $this->request->data('id');
        $user = $this->Users->get($id);
        $this->response->type('json');
        $this->response->body(json_encode(['succcess' => '<h1>ewfhuwe<>']));
        $this->response->withStatus(200);

        if ($this->Users->delete($user)) {

            return $this->response;
        } else {
            $this->response->withStatus(500);

            return $this->response;
        }
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $user['allowedActions'] = $this->Role->getAllowedActions($user['role_id']);
                $this->Auth->setUser($user);
                if ($user['role_id'] == 3) {
                    return $this->redirect(['controller' => 'Pages', 'action' => 'index', 'plugin' => false]);
                }
                else {
                    return $this->redirect(['controller' => 'Pages', 'action' => 'index', 'plugin' => 'Backend']);
                }
            } else {
                $this->Flash->error(__('Wrong username or password'));

                return $this->redirect(['action' => 'login']);
            }
        }
    }

    public function logout()
    {
        if (empty($this->Auth->user())) {
            $this->Flash->success('You have not logged in, login first please!');

            return $this->redirect(['action' => 'login']);
        }
        $this->Flash->success('You are now logged out.');

        return $this->redirect($this->Auth->logout());
    }

    public function changePassword()
    {
        if (!empty($this->request->getData())) {
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['old_password', 'new_password']);

            if (!$check) {
                $this->Flash->error(__($this->CheckInputs->getMessage()));

                return $this->redirect(['action' => 'changePassword']);
            }

            $user = $this->Users->find()->where(['id' => $this->Auth->user('id')])->select('password');

            if (strlen($data['old_password'])) {
                $hash = new DefaultPasswordHasher();

                if ($hash->hash($data['old_password']) == $user['password']) { }
            }
        }
    }

 
}
