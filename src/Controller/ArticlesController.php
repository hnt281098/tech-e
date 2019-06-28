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
        $this->Auth->allow();
    }

    public function articlesList ()
    {
        $articlePage = $this->request->query('articlePage');
        $articlesList = $this->Articles->find(
            'all',
            [
                'conditions' => ['Articles.status_id'=>1],
                'order' => ['Articles.posting_date'=>'desc', 'Articles.id'=>'desc'],
                'contain' => 'Users'
            ]
        )->toArray();

        $result = [];

        foreach ($articlesList as $key => $article) {
            if (($key >= ($articlePage-1)*10) && ($key <= ($articlePage*10-1))) {
                $result[] = $article;
            }
        }

        $this->set('data', $result);
    }

    public function articlesDetails($id = null)
    {
        if(!empty($id)){
            //Load model cần dùng
            $this->loadModel('Users');
            $this->loadModel('Comments');
            //Load chi tiết bài viết
            $data['articleDetails'] = $this->Articles->find(
                'all',
                [
                    'conditions' => ['Articles.id'=>$id, 'Articles.status_id'=>1],
                    'contain' => 'Users'
                ]
            );
            foreach ($data['articleDetails'] as $article);
            //Đếm số lượng comment
            $data['amountComment'] = $this->Comments->findAllByArticleId($article['id'])->count();
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
            if(!empty([$data['amountComment'], $data['articleDetails']])){
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

    public function articlesSearch()
    {
        $keyword = $this->request->query('keyword');
        $articlePage = $this->request->query('articlePage');
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

            $articlesList = $this->Articles->find(
                'all',
                [
                    'conditions' => ['title LIKE' => "%$keyword%", 'status_id' => 1],
                    'order' => ['Articles.posting_date' => 'desc', 'Articles.id' => 'desc'],
                    'contain' => 'Users'
                ]
            )->toArray();

            $result = [];

            foreach ($articlesList as $key => $article) {
                if (($key >= ($articlePage-1)*10) && ($key <= ($articlePage*10-1))) {
                    $result[] = $article;
                }
            }
            $data['articlesList'] = $result;

            $this->set('data', $data);
        }
    }

    public function articlesBy()
    {
        $id = $this->request->query('id');
        $type = $this->request->query('type');
        $articlePage = $this->request->query('articlePage');
        $this->loadModel('Categories');
        $this->loadModel('Users');

        $articlesList = [];
        $data['amountArticles'] = 0;
        if($type == 'category'){
            $data['category'] = $this->Categories->get($id);
            $listCate = $this->Categories->find(
                'all',
                ['conditions'=>['parent_id'=>$id]]
            );
            if(empty($listCate->count())){
                $articlesList[] = $this->Articles->find(
                    'all',
                    [
                        'conditions' => ['category_id' => $id, 'status_id' => 1],
                        'order'=>['Articles.posting_date' => 'desc', 'Articles.id' => 'desc'],
                        'contain' => 'Users'
                    ]
                );
                $data['amountArticles'] = $this->Articles->find('all', ['conditions'=>['category_id'=>$id, 'status_id'=>1]])->count();
            }else{
                foreach($listCate as $value){
                    $articlesList[] = $this->Articles->find(
                        'all',
                        [
                            'conditions' => ['category_id' => $value['id'], 'status_id' => 1],
                            'order'=>['Articles.posting_date' => 'desc', 'Articles.id' => 'desc'],
                            'contain' => 'Users'
                        ]
                    );
                    $data['amountArticles'] += $this->Articles->find('all', ['conditions'=>['category_id'=>$value['id'], 'status_id'=>1]])->count();
                }
            }
        }elseif ($type == 'user') {
            $data['user'] = $this->Users->get($id);
            $articlesList[] = $this->Articles->find(
                'all',
                [
                    'conditions' => ['user_id' => $id, 'status_id' => 1],
                    'order'=>['Articles.posting_date' => 'desc', 'Articles.id' => 'desc'],
                    'contain' => 'Users'
                ]
            );
            $data['amountArticles'] = $this->Articles->find('all', ['conditions'=>['user_id' => $id, 'status_id' => 1]])->count();
        }

        $temp = [];
        foreach ($articlesList as $list) {
            foreach ($list as $value) {
                $temp[] = $value;
            }
        }

        $result = [];

        foreach ($temp as $key => $article) {
            if (($key >= ($articlePage-1)*10) && ($key <= ($articlePage*10-1))) {
                $result[] = $article;
            }
        }
        $data['articlesList'] = $result;

        $this->set('data', $data);
    }
}