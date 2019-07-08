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
        $this->loadComponent('Backend.Email');
        
        $this->Auth->allow('login');
    }

    public function view($pageIndex = 1)
    {
        $this->loadModel('Roles');
        $this->response->type('json');
        $this->response->statusCode(200);

        if (!empty($this->request->query('pageIndex'))) {
            $pageIndex = $this->request->query('pageIndex');
        }
        
        $users = $this->Users->find()->order(['Users.id' => 'ASC'])->limit(7)->page($pageIndex)->toArray();
        
        if (empty($this->Users->find()->order(['Users.id' => 'ASC'])->limit(7)->page($pageIndex+1)->toArray())) {
            $end = true;
        }
        else {
            $end = false;
        }

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
        $view->set(compact(['users', 'pageIndex']));
        $html = $view->render('Backend.Users/view');
        
        $this->response->body(json_encode(['html' => $html, 'end' => $end]));
        
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
        $this->response->statusCode(200);
        
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['password', 'email']);

            if (!$check) {
                $this->response->statusCode(500);
                $response = [
                    'message' => 'Not enough required data',
                ];
                $this->response->body(json_encode($response));

                return $this->response;
            }

            $user = $this->Users->patchEntity($user, $data);
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

            if ($this->Users->save($user)) {
                $user->user_code = "USER" . $user->id;

                if ($this->Users->save($user)) {
                    
                    return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'users', 'message' => 'Thêm thành công']]);
                }
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'users', 'message' => 'Thêm thất bại']]);
        }
        $roles = $this->Users->Roles->find()->select(['id', 'name']);

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Users/add');
        
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
    public function update()
    {
        $this->response->type('json');
        $this->response->statusCode(200);

        if ($this->request->is(['post', 'patch'])) {
            $user = $this->Users->get($this->request->getData('id'));
            $password = $user->password;
            $data = $this->request->getData();
            $check = $this->CheckInputs->execute($data, ['email']);
            if (!$check) {
                $this->response->statusCode(500);

                $response = [
                    'message' => 'Not enough required data',
                ];
                $this->response->body(json_encode($response));

                return $this->response;
            }
            $user = $this->Users->patchEntity($user, $data);
            $user->password = $password;
            if ($this->Users->save($user)) {

                return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'users', 'message' => 'Cập nhật thành công']]);            
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'users', 'message' => 'Cập nhật thất bại']]);   
        }

        $user = $this->Users->findById($this->request->query('id'))->first();
        $birthday = new Date($user->birthday);
        $user->birthday = $birthday->format('d/m/Y');

        $roles = $this->Users->Roles->find()->select(['id', 'name']);

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Users/add');

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
        $this->response->statusCode(200);
        $user->status = 0;
        if ($this->Users->save($user)) {

            return $this->response;
        } else {
            $this->response->statusCode(500);

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
                if ($user['role_id'] == 3 || $user['role_id'] == 4) {
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
        $something = '';
        $this->set('something');
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
            // $file = $this->request->getData('avatar');
            // $filename = null;
            // if(!empty($file['tmp_name'])){
            //     $filename = $file['name'];
            //     if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'uploads' . DS . 'avatar' . DS . $filename)){
            //         $user->avatar = $filename;
            //     }
            // }

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
    
    public function search($pageIndex = 1)
    {
        $this->loadModel('Roles');
        $this->response->type('json');
        $this->response->statusCode(200);
        $query = $this->request->query();

        if (!empty($query['pageIndex'])) {
            $pageIndex = $this->request->query['pageIndex'];
        }

        if ($query['field'] == 'role') {
            $role = $this->Roles->find()->where(["Roles.name LIKE N'%".$query['input']."%'"])->select('id')->first();
            $conditions = [
                'role_id' => $role->id,
            ];
        }
        else {
            $conditions = [
                $query['field']." LIKE N'%". $query['input']. "%'",
            ];
        }
        $users = $this->Users->find()->order(['Users.id' => 'ASC'])->limit(7)->page($pageIndex)->where([$conditions])->toArray();
        
        if (empty($this->Users->find()->order(['Users.id' => 'ASC'])->limit(7)->page($pageIndex+1)->where([$conditions])->toArray())) {
            $end = true;
        }
        else {
            $end = false;
        }

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
        $view->set(compact(['users', 'pageIndex']));
        $html = $view->render('Backend.Users/view');
        
        $this->response->body(json_encode(['html' => $html, 'end' => $end]));
        
        return $this->response;
    }

    public function blockUser()
    {
        $this->response->statusCode(200);
        $this->response->type('json');
        $this->response->body(json_encode(['success' => true]));

        $id = $this->request->getData('id');
        $user = $this->Users->get($id);
        $user->status = 0;

        if ($this->Users->save($user)) {
            $this->Email->sendMailBlockUser('oigioioi1998@gmail.com', 'Tài khoản của bạn đã bị khóa.');
            return $this->response;
        }
        
        $this->response->statusCode(500);
        $this->response->body(json_encode(['success' => false]));
        return $this->response;
    }
}
