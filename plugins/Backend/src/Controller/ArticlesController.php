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
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function view()
    {
        $this->paginate = [
            'contain' => ['Categories','Users', 'ArticleStatus']
        ];
        
        if (!empty($this->request->query('article_status_id'))) {
            $statusId = $this->request->query('article_status_id');
            $articles = $this->paginate($this->Articles->find()->where(['status_id' => $statusId]));
        }
        else {
            $articles = $this->paginate($this->Articles);
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
        }

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewDetail($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Categories', 'Authors', 'Comments']
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Cannot save!'));

            foreach($article->errors() as $error) {
                $this->Flash->error(__($error));
            }
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'authors'));
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
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories', 'authors'));
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
        $this->response->withStatus(200);

        if ($this->Articles->delete($article)) {
            $this->response->body(json_encode(['success' => true]));

            return $this->response;
        }
        else {
            $this->response->body(json_encode(['success' => true]));

            return $this->response;
        }
    }

    public function articlesDetails($id=null)
    {
        $this->loadModel('Users');
        $this->loadModel('Comments');
        $data['articleDetails'] = $this->Articles->findAllById($id);
        $data['userList'] = $this->Users->find(
            'all',
            ['fields'=>['id', 'fullname', 'avatar']]
         );
        
        foreach($data['articleDetails'] as $value){
            $data['authorDetails'] = $this->Users->findAllById($value['user_id']);


            $data['amountComment'] = $this->Comments->findAllByArticleId($value['id'])->count();
            $this->paginate = [
                'conditions'=>['article_id'=>$value['id'], 'status'=>1], 
                'order'=>['comment_date'=>'DESC', 'id'=>'DESC'],
                'limit'=>5
            ];
            $data['commentDetails'] = $this->paginate($this->Comments);
        };

        $this->set('data', $data);
    }

    public function articlesNew()
    {
        $list = $this->Articles->find(
            'all', 
            ['fields'=>['id', 'title', 'posting_date', 'image'], 'conditions'=>['status=1'], 'order'=>['posting_date DESC'], 'limit'=>5]
        );
        $this->set('articlesNew', $list);
    }

    public function articlesMostView()
    {
        $list = $this->Articles->find(
            'all', 
            ['fields'=>['id', 'title', 'posting_date', 'image'], 'conditions'=>['status=1'], 'order'=>['view DESC'], 'limit'=>5]
        );
        $this->set('articlesMostView', $list);
    }

    public function articlesSearch($tag = null)
    {
        if($tag == '*'){
            if($this->request->is('post')){
                $keyword = $this->request->getData('keyword');
                if(!empty($keyword)){
                    $this->loadModel('Searches');
                    $result = $this->Searches->findAllByKeyword($keyword);
                    if($result->count() > 0){
                        foreach ($result as $value) {
                            $search = $this->Searches->get($value['id']);
                            $newTimes = $value['times'] + 1;
                            $search = $this->Searches->patchEntity($search, [
                                'times'=>$newTimes
                            ]);
                            $this->Searches->save($search);
                        }
                    }else{
                        $search = $this->Searches->newEntity();
                        $search = $this->Searches->patchEntity($search, [
                            'keyword'=>$keyword,
                            'times'=>1
                        ]);
                        $this->Searches->save($search);
                    }

                    $this->paginate = ['conditions'=>['title LIKE'=>"%$keyword%"], 'order'=>['posting_date'=>'DESC']];
                    $data['articlesList'] = $this->paginate('Articles');
                    $this->set('data', $data);
                }
            }
        }else{
            $this->loadModel('Searches');
            $result = $this->Searches->findAllByKeyword($tag);
            if($result->count() > 0){
                foreach ($result as $value) {
                    $search = $this->Searches->get($value['id']);
                    $newTimes = $value['times'] + 1;
                    $search = $this->Searches->patchEntity($search, [
                        'times'=>$newTimes
                    ]);
                    $this->Searches->save($search);
                }
            }else{
                $search = $this->Searches->newEntity();
                $search = $this->Searches->patchEntity($search, [
                    'keyword'=>$tag,
                    'times'=>1
                ]);
                $this->Searches->save($search);
            }

            $this->paginate = ['conditions'=>['title LIKE'=>"%$tag%"], 'order'=>['posting_date'=>'DESC']];
            $data['articlesList'] = $this->paginate('Articles');
            $this->set('data', $data);
        }
    }
}