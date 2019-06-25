<?php
namespace App\Controller;

use App\Controller\AppController;
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

    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Authors']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
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
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
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
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function articlesDetails($id = null)
    {
        if(!empty($id)){
            //Load model cần dùng
            $this->loadModel('Users');
            $this->loadModel('Comments');
            //Load chi tiết bài viết
            $article = $this->Articles->get($id);
            $data['articleDetails'] = $this->Articles->findAllById($id);
            $data['userList'] = $this->Users->find(
                'all',
                ['fields'=>['id', 'fullname', 'avatar']]
             );
            //Load list comment
            foreach($data['articleDetails'] as $value){
                $data['authorDetails'] = $this->Users->findAllById($value['user_id']);
                
                $data['amountComment'] = $this->Comments->findAllByArticleId($value['id'])->count();
                $this->paginate = [
                    'conditions'=>['article_id'=>$value['id'], 'Comments.status'=>1], 
                    'order'=>['comment_date'=>'DESC', 'id'=>'DESC'],
                    'limit'=>5,
                    'contain' => 'Users'
                ];
                $data['commentDetails'] = $this->paginate($this->Comments);
                log::info($data['commentDetails']->toArray());
            };
            //Tăng view
            $session_article = 'article_'.$id;
            $check_view = empty($this->request->session()->read($session_article));
            if($check_view){
                $this->request->session()->write($session_article, 1);
                $article = $this->Articles->patchEntity(
                    $article,
                    ['view'=>$article['view'] + 1]
                );
                $this->Articles->save($article);
            }
            //Get dữ liệu lên view
            if(!empty([$data['commentDetails'], $data['amountComment'], $data['authorDetails'], $data['userList'], $data['articleDetails']])){
                $this->set('data', $data);
            }else{
                $this->redirect(['controller'=>'error', 'action'=>'error404']);
            }
        }
    }

    public function articlesByStandard($standard = null, $id = null)
    {
        if((!empty($standard)) && (!empty($id))){
            if($standard == 'apple'){
                $data = $this->Articles->find(
                    'all', 
                    [
                        'fields'=>['id', 'title', 'posting_date', 'image'], 
                        'conditions'=>['status_id'=>1, 'category_id'=>8], 
                        'order'=>['posting_date'=>'desc', 'id'=>'desc'], 
                        'limit'=>5
                    ]
                );
            }elseif($standard == 'samsung'){
                $data = $this->Articles->find(
                    'all', 
                    [
                        'fields'=>['id', 'title', 'posting_date', 'image'], 
                        'conditions'=>['status_id'=>1, 'category_id'=>9], 
                        'order'=>['posting_date'=>'desc', 'id'=>'desc'], 
                        'limit'=>5
                    ]
                );
            }elseif($standard == 'connection'){
                $article = $this->Articles->findAllById($id);
                foreach($article as $value);
                $data = $this->Articles->find(
                    'all', 
                    [
                        'fields'=>['id', 'title', 'posting_date', 'image'], 
                        'conditions'=>['status_id'=>1, 'category_id'=>$value['category_id'], 'id != '.$id], 
                        'order'=>['posting_date'=>'desc', 'id'=>'desc'], 
                        'limit'=>5
                    ]
                );
            }elseif($standard == 'user_most_view'){
                $data = $this->Articles->find(
                    'all',
                    [
                        'fields'=>['id', 'title', 'posting_date', 'image', 'view'], 
                        'conditions'=>['status_id'=>1, 'user_id'=>$id],
                        'order'=>['view'=>'desc'], 
                        'limit'=>5
                    ]
                );
            }elseif($standard == 'user_recently'){
                $data = $this->Articles->find(
                    'all', 
                    [
                        'fields'=>['id', 'title', 'posting_date', 'image'], 
                        'conditions'=>['status_id'=>1, 'user_id'=>$id],
                        'order'=>['posting_date'=>'desc', 'id'=>'desc'], 
                        'limit'=>5
                    ]
                );
            }
            $this->set(['data'=>$data, 'standard'=>$standard]);
        }
    }

    public function articlesMostView()
    {
        $data = $this->Articles->find(
            'all', 
            [
                'fields'=>['id', 'title', 'posting_date', 'image'], 
                'conditions'=>['status_id'=>1],
                'order'=>['view'=>'desc'], 
                'limit'=>5
            ]
        );
        $this->set('data', $data);
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

                    $this->paginate = ['conditions'=>['title LIKE'=>"%$keyword%", 'status_id'=>1], 'order'=>['posting_date'=>'DESC']];
                    $data['articlesList'] = $this->paginate('Articles');
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
            }

            $this->paginate = ['conditions'=>['title LIKE'=>"%$tag%", 'status_id'=>1], 'order'=>['posting_date'=>'DESC']];
            $data['articlesList'] = $this->paginate('Articles');
        }

        $this->set('data', $data);
    }

    public function articlesBy($by = null, $id = null)
    {
        if((!empty($id)) && (!empty($by))){
            $this->loadModel('Categories');
            $this->loadModel('Users');

            $data['articlesList'] = [];
            $data['amountArticles'] = 0;
            if($by == 'category'){
                $data['category'] = $this->Categories->get($id);
                $listCate = $this->Categories->find(
                    'all',
                    ['conditions'=>['parent_id'=>$id]]
                );
                if(empty($listCate->count())){
                    $this->paginate = [
                        'limit'=>10,
                        'order'=>['posting_date'=>'DESC', 'id'=>'DESC'],
                        'conditions'=>['category_id'=>$id, 'status_id'=>1]
                    ];
                    $data['articlesList'][] = $this->paginate($this->Articles);
                    $data['amountArticles'] = $this->Articles->find('all', ['conditions'=>['category_id'=>$id, 'status_id'=>1]])->count();
                }else{
                    foreach($listCate as $value){
                        $this->paginate = [
                            'limit'=>10,
                            'order'=>['posting_date'=>'DESC', 'id'=>'DESC'],
                            'conditions'=>['category_id'=>$value['id']]
                        ];
                        $data['articlesList'][] = $this->paginate($this->Articles);
                        $data['amountArticles'] += $this->Articles->find('all', ['conditions'=>['category_id'=>$value['id'], 'status_id'=>1]])->count();
                    }
                }
            }elseif ($by == 'user') {
                $data['user'] = $this->Users->get($id);

                $this->paginate = [
                    'limit'=>10,
                    'order'=>['posting_date'=>'DESC', 'id'=>'DESC'],
                    'conditions'=>['user_id'=>$id]
                ];
                $data['articlesList'][] = $this->paginate($this->Articles);
                $data['amountArticles'] = $this->Articles->find('all', ['conditions'=>['user_id'=>$id, 'status_id'=>1]])->count();
            }
            $data['userList'] = $this->Users->find(
                'all',
                ['fields'=>['id', 'fullname', 'avatar']]
            );

            $this->set('data', $data);
        }
    }
}