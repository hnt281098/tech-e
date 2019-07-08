<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    public function login()
    {
        
    }

    public function forgotPassword(){

    }

    public function myProfile()
    {
        if(!empty($this->Auth->user())){
            $user = $this->Auth->user();
            $this->loadModel('Articles');

            $data['user'] = $user;
            $data['amountArticle'] = $this->Articles->findAllByUserId($user['id'])->count();
            $data['amountView'] = $this->Articles->findAllByUserId($user['id'])->sumOf('view');

            $this->set('data', $data);
        }
        
    }

    public function userDetails($id = null)
    {
        if(!empty($id)){
            $this->loadModel('Articles');

            $data['user'] = $this->Users->find(
                'all',
                [
                    'conditions'=>['id'=>$id],
                    'fields'=>['id', 'email', 'fullname', 'birthday', 'avatar', 'facebook', 'instagram'],
                ]
            );
            $data['amountArticle'] = $this->Articles->findAllByUserId($id)->count();
            $data['amountView'] = $this->Articles->findAllByUserId($id)->sumOf('view');

            $this->set('data', $data);
        }
    }

    public function register()
    {
        if($this->request->is('post')){
            $now = Time::now();
            $password = $this->request->getData('password');
            $email = $this->request->getData('email');
            $fullname = $this->request->getData('fullname');
            $birthday = $this->request->getData('birthday');

            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity(
                $user,
                [
                    'role_id'=>3,
                    'password'=>$password,
                    'email'=>$email,
                    'fullname'=>$fullname,
                    'birthday'=>$birthday,
                    'avatar'=>'avatar-default.jpg',
                    'status'=>1
                ]
            );

            if($this->Users->save($user)){
                $this->redirect(['action'=>'login']);
            }
        }
    }

    public function articlesByUser($id = null)
    {
        $this->loadModel('Articles');
        $data = $this->Users->get($id);
        $amountArticles = $this->Articles->find(
            'all',
            ['conditions' => ['status_id' => 1, 'user_id' => $id]]
        )->count();

        $this->set(['data' => $data, 'amountArticles' => $amountArticles]);
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
            
            return $this->response;
        }
        
        $this->response->statusCode(500);
        $this->response->body(json_encode(['success' => false]));
        return $this->response;
    }
}
