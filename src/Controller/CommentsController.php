<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Log\Log;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Articles']
        ];
        $comments = $this->paginate($this->Comments);

        $this->set(compact('comments'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => ['Users', 'Articles']
        ]);

        $this->set('comment', $comment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $articles = $this->Comments->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'users', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $articles = $this->Comments->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'users', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function writeComment($articleid = null)
    {
        if(!empty($articleid)){
            if($this->request->is('post')){
                $date = Time::now();
                $content = $this->request->getData('contentComment');

                if(!empty($content)){
                    $comment = $this->Comments->newEntity();
                    $comment = $this->Comments->patchEntity(
                        $comment,
                        [
                            'user_id'=>1,
                            'article_id'=>$articleid,
                            'content'=>$content,
                            'comment_date'=>$date,
                            'status'=>1
                        ]
                    );
                    if($this->Comments->save($comment)){
                        $this->redirect(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$articleid]);
                    }
                }else{
                    $this->redirect(['controller'=>'articles', 'action'=>'articlesDetails', 'id'=>$articleid]);
                    $this->Flash->error(__('Bạn chưa nhập nội dung bình luận...'));
                }
            }
        }
    }

    public function viewByArticle ()
    {
        $pageNumber = $this->request->query('pageNumber');
        $articleId = $this->request->query('articleId');
        $comments = $this->Comments->find()->where(['article_id' => $articleId])->order(['id' => 'DESC'])->toArray();
        $amount = count($comments);

        $this->response->type('json');
        $this->response->withStatus(200);

        $result = [];

        foreach ($comments as $key => $comment) {
            if ($key > (($pageNumber-1))*5 && $key < ($pageNumber*5+1)) {
                $result[] = $comment;
            }
        }
        $this->response->body(json_encode($result));
        return $this->response;
    }
}