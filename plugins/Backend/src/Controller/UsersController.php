<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;

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
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['password', 'email', 'role_id']);

            if (!$check) {
                $this->Flash->error(__($this->CheckInputs->getMessage()));

                return $this->redirect(['action' => 'add']);
            }
            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $user->user_code = "USER" . $user->id;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'viewDetail', $user->id]);
                }
            }

            $this->Flash->error(__('User can not be saved'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'viewDetail', $user['id']]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);

        if ($user->role_id != 1 || $user->role_id != 2) {
            unset($user->role_id);
        }
        $this->set(compact('user', 'roles'));
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
        $this->response->body(json_encode(['succcess' => true]));
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

    public function register()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['password', 'email']);

            if (!$check) {
                $this->Flash->error(__($this->CheckInputs->getMessage()));

                return $this->redirect(['action' => 'add']);
            }
            $user = $this->Users->patchEntity($user, $data);
            $user->role_id = 3;
            $user->status = 0;

            if ($this->Users->save($user)) {
                $user->user_code = "USER" . $user->id;


                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Register successful.'));

                    return $this->redirect(['action' => 'viewDetail', $user->id]);
                }
            }
            $this->Flash->error(__('User can not be saved'));
        }
        $this->set(compact('user'));
    }

    public function uploadAvatar()
    {
        $name = $this->request->query('name');
        $tmp_name = $this->request->query('tmp_name');
        $location = '../upload/' . $name;
        $uploadStatus = true;
        $filetype = pathinfo($location, PATHINFO_EXTENSION);
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if(!in_array(strtolower($filetype), $valid_extensions)){
            $uploadStatus = false;
        }

        if(empty($uploadStatus)){
            $data = 0;
        }else{
            if(move_uploaded_file($tmp_name, $location)){
                $data = $location;
            }else{
                $data = 0;
            }
        }

        $this->set('data', $data);
    }
}
