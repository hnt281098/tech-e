<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;
use Cake\View\View;
use Cake\I18n\Time;
use Cake\I18n\Date;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Backend.Role');
        $this->loadComponent('Backend.CheckInputs');
        $this->loadModel('Users');
    }

    public function view()
    {
        $this->loadModel('Roles');
        $this->response->type('json');
        $this->response->withStatus(200);

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

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $view->set(compact('users'));
        $html = $view->render('Backend.Users/view');
        
        $this->response->body(json_encode(['html' => $html]));
        
        return $this->response;
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
            $check = $this->CheckInputs->execute($data, ['password', 'email']);

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
        

        $this->response->type('json');
        $this->response->withStatus(200);
        if ($this->request->is(['post', 'patch'])) {
            $user = $this->Users->get($this->request->getData('id'));
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['password', 'email']);

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
                $this->response->body(json_encode(['success' => 'true']));
                
                return $this->response;
            }

            $this->response->withStatus(500);
            $response = [
                'message' => 'Can not save',
            ];
            $this->response->body(json_encode($response));

            return $this->response;
        }

        $user = $this->Users->findById($this->request->query('id'))->first();
        $birthday = new Date($user->birthday);
        $user->birthday = $birthday->format('d/m/Y');

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
        if($this->request->is('post')){
            $user = $this->Users->newEntity();
            $requestData = $this->request->getData();
            $user = $this->Users->patchEntity($user, $requestData);
            $user->role_id = 3;
            $user->status = 1;

            //Thêm ngày sinh
            $date = $this->request->getData('birthday');
            $date = explode('/', $date);
            $birthday = Time::now();
            $birthday->year($date[2])->month($date[0])->day($date[1]);
            $user->birthday = $birthday;

            //Upload avatar
            $file = $this->request->getData('avatar');
            $filename = null;
            if(!empty($file['tmp_name'])){
                $filename = $file['name'];
                if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'uploads' . DS . 'avatar' . DS . $filename)){
                    $user->avatar = $filename;
                }
            }

            if($this->Users->save($user)){
                $this->redirect(['action'=>'login']);
            }
        }
    }

    public function uploadAvatar()
    {
        $temp = $this->request->getData('temp');
        $name = $temp['name'];
        $tmp_name = $temp['tmp_name'];
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

    public function checkEmail()
    {
        $email = $this->request->query('email');
        $list = $this->Users->find('all')->toArray();
        $data = true;

        foreach ($list as $user) {
            if($user['email'] == $email){
                $data = false;
                break;
            }
        }

        $this->set('data', $data);
    }
}
