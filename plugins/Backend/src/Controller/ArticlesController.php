<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public $helpers = ['Form','Paginator','Html', 'Session'];
    public $components = ['RequestHandler'];
    public $paginate = [];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('ArticleStatus');
        $this->loadComponent('Backend.Email');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function view($statusId = 1, $pageIndex = 1)
    {
        if (!empty($this->request->query('pageIndex'))) {
            $pageIndex = $this->request->query('pageIndex');
        }
        
        if (!empty($this->request->query('article_status_id'))) {
            $statusId = $this->request->query('article_status_id');
            $articles = $this->Articles->find()->order(['Articles.id' => 'ASC'])->limit(7)->page($pageIndex)->where(['status_id' => $statusId])->contain(['Categories','Users', 'ArticleStatus']);
            
            if (empty($this->Articles->find()->order(['Articles.id' => 'ASC'])->limit(7)->page($pageIndex+1)->where(['status_id' => $statusId])->toArray())) {
                $end = true;
            }
            else { 
                $end = false;
            }
        }
        else {
            $articles = $this->paginate($this->Articles);

            if (empty($this->Articles->find()->order(['Articles.id' => 'ASC'])->limit(7)->page($pageIndex+1)->toArray())) {
                $end = true;
            }
            else { 
                $end = false;
            }
        }
    
        foreach ($articles as $article) {
            unset($article['content']);
            unset($article['description']);
            $article['user'] = $article['user']['email'];
            $article['status'] = $article['article_status']['name'];
            $article['category'] = $article['category']['name'];
            unset($article['article_status']);
            unset($article['status_id']);
            unset($article['user_id']);
            unset($article['category_id']);
            unset($article['image']);
            unset($article['category_id']);
            unset($article['source']);
        }
        
        if ($articles->count() == 0) {
            $articles[] = $this->Articles->newEntity();
        }

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $view->set(compact(['articles', 'pageIndex']));
        $html = $view->render('Backend.Articles/view');
        
        $this->response->body(json_encode(['html' => $html, 'end' => $end]));
        
        return $this->response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $this->response->type('json');
        $this->response->statusCode(200);
        
        if ($this->request->is('post')) {
            $article = $this->Articles->newEntity();
            $data = $this->request->getData();

            $article = $this->Articles->patchEntity($article, $data);
            $statusId = $article->status_id;

            if ($this->Articles->save($article)) {
                $this->response->body(json_encode(['success' => 'true']));
                
                return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'articles', 'statusId' => $statusId]]);
            }

            $this->response->statusCode(500);
            $response = [
                'message' => 'Can not save',
            ];
            $this->response->body(json_encode($response));

            return $this->response;
        }
        $users = $this->Users->find()->select(['id', 'email'])->order(['email' => 'ASC']);

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Articles/add');
        
        $response = [
            'html' => $html,
            'users' => $users,
        ];
        $this->response->body(json_encode($response));

        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $id = $this->request->data('id');
            $article = $this->Articles->get($id);
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $statusId = $article->status_id;

            if ($this->Articles->save($article)) {
                $this->response->body(json_encode(['success' => 'true']));
                
                return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'articles', 'statusId' => $statusId]]);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $id = $this->request->query('id');
        $article = $this->Articles->findById($id)->contain(['Users', 'Categories', 'ArticleStatus'])->toArray();
        $article = $article[0];
        $article['user'] = $article['user']['email'];
        $article['status'] = $article['article_status']['name'];
        $article['category'] = $article['category']['name'];

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Articles/edit');
        
        $response = [
            'html' => $html,
            'article' => $article,
        ];
        $this->response->body(json_encode($response));

        return $this->response;
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->data('id');
        $article = $this->Articles->get($id);

        $this->response->type('json');
        $this->response->statusCode(200);
        $article->status_id = 3;
        
        if ($this->Articles->save($article)) {
            $this->response->body(json_encode(['success' => true]));

            return $this->response;
        }
        else {
            $this->response->statusCode(500);
            $this->response->body(json_encode(['success' => false]));

            return $this->response;
        }
    }
    
    public function approve() 
    {
        $this->response->type('json');
        $this->response->statusCode(200);
        $id = $this->request->getData('id');
        $article = $this->Articles->get($id);

        if (empty($article)) {
            $response = [
                'success' => false,
                'message' => 'Not found',
            ];
            $this->response->body(json_encode($response));
            $this->response->statusCode(500);

            return $this->response;
        }

        $article->status_id = 1;

        if ($this->Articles->save($article)) {
            $this->Email->sendMail('oigioioi1998@gmail.com', 'Bài đăng đã được duyệt', ['id' => $id]);

            // $this->response->body(json_encode($response));

            // $this->response->body(json_encode(['success' => 'true']));
                
            return $this->redirect(['controller' => 'Pages', 'action' => 'index', '?' => ['currentPage' => 'articles', 'statusId' => 2, 'message' => 'Đã duyệt bài đăng']]);
        }

        $response = [
            'success' => false,
            'message' => 'Can not save',
        ];
        $this->response->statusCode(500);
        $this->response->body(json_encode($response));

        return $this->response;
    } 

    function cancel() {
        $this->response->type('json');
        $this->response->statusCode(200);

        $id = $this->request->data('id');
        $article = $this->Articles->get($id);
        $article->status_id = 3;
        
        if ($this->Articles->save($article)) {
            $response = [
                'success' => true,
            ];
            $this->response->body(json_encode($response));

            return $this->response;
        }

        $response = [
            'success' => false,
        ];
        $this->response->body(json_encode($response));
        $this->response->statusCode(500);

        return $this->response;
    }

    public function search($statusId = 1, $pageIndex = 1)
    {
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $query = $this->request->query();
        
        if (!empty($query['type'])) {
            $statusId = $query['type'];
        }

        if (!empty($query['pageIndex'])) {
            $pageIndex = $query['pageIndex'];
        }
        
        if ($query['field'] == 'category') {
            $category = $this->Categories->find()->where(["Categories.name LIKE N'%".$query['input']."%'"])->select('id')->first();
            $conditions = [
                'category_id' => $category->id,
                'status_id' => $statusId,
            ];
        }
        else if ($query['field'] == 'user') {
            $user = $this->Users->find()->where(["Users.email LIKE N'%".$query['input']."%'"])->select('id')->first();
            log::info($user);
            $conditions = [
                'user_id' => $user->id,
                'status_id' => $statusId,
            ];
        }
        else {
            $conditions = [
                $query['field']." LIKE N'%". $query['input']. "%'",
                'status_id' => $statusId,
            ];
        }

        $articles = $this->Articles->find()->order(['Articles.id' => 'ASC'])->limit(7)->page($pageIndex)->where($conditions)->contain(['Categories','Users', 'ArticleStatus']);
            
        if (empty($this->Articles->find()->order(['Articles.id' => 'ASC'])->limit(7)->page($pageIndex+1)->where($conditions)->toArray())) {
            $end = true;
        }
        else { 
            $end = false;
        }

        
    
        foreach ($articles as $article) {
            unset($article['content']);
            unset($article['description']);
            $article['user'] = $article['user']['email'];
            $article['status'] = $article['article_status']['name'];
            $article['category'] = $article['category']['name'];
            unset($article['article_status']);
            unset($article['status_id']);
            unset($article['user_id']);
            unset($article['category_id']);
            unset($article['image']);
            unset($article['category_id']);
            unset($article['source']);
        }
        
        if ($articles->count() == 0) {
            $articles[] = $this->Articles->newEntity();
        }

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $view->set(compact(['articles', 'pageIndex']));
        $html = $view->render('Backend.Articles/view');
        
        $this->response->body(json_encode(['html' => $html, 'end' => $end]));
        
        return $this->response;
    }
}