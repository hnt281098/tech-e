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

    public function commentList ()
    {
        $commentPage = $this->request->query('commentPage');
        $articleId = $this->request->query('articleId');
        $comments = $this->Comments->find(
            'all',
            [
                'conditions'=>['article_id' => $articleId],
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
        $this->set('data', $result);
    }
}