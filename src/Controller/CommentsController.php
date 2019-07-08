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
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }
    
    public function writeComment()
    {
        $user = $this->Auth->user();
        $articleId = $this->request->query('articleId');
        $content = $this->request->query('content');
        $date = Time::now();
        $comment = $this->Comments->newEntity();
        $comment = $this->Comments->patchEntity(
            $comment,
            [
                'user_id'=>$user['id'],
                'article_id'=>$articleId,
                'content'=>$content,
                'comment_date'=>$date,
                'status'=>1
            ]
        );
        if($this->Comments->save($comment)){
            $this->set('data', true);
        }
    }

    public function commentList ()
    {
        $commentPage = $this->request->query('commentPage');
        $articleId = $this->request->query('articleId');
        $comments = $this->Comments->find(
            'all',
            [
                'conditions'=>['article_id' => $articleId, 'Comments.status' => 1],
                'order' => ['comment_date'=>'desc', 'Comments.id'=>'desc'],
                'contain' => 'Users'
            ]
        )->toArray();

        $result = [];

        foreach ($comments as $key => $comment) {
            if (($key >= ($commentPage-1)*5) && ($key <= ($commentPage*5-1))) {
                $result[] = $comment;
            }
        }

        $amountComment = count($comments);
        $this->set(['data'=>$result, 'amountComment'=>$amountComment]);
    }

    public function blockComment() {
        $this->response->statusCode(200);
        $this->response->type('json');
        $this->response->body(json_encode(['success' => true]));

        $id = $this->request->getData('id');
        $cmt = $this->Comments->get($id);
        $cmt->status = 0;

        if ($this->Comments->save($cmt)) {
            
            return $this->response;
        }
        
        $this->response->statusCode(500);
        $this->response->body(json_encode(['success' => false]));
        return $this->response;
    }
}