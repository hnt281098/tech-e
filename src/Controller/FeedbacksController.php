<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 *
 * @method \App\Model\Entity\Feedback[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeedbacksController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }
    
    public function sendFeedback()
    {
        if ($this->request->is('post')) {
            if(!empty($this->Auth->user())){
                $user = $this->Auth->user();
                $content = $this->request->getData('content');
                if(!empty($content)){
                    $date = Time::now();

                    $feedback = $this->Feedbacks->newEntity();
                    $feedback = $this->Feedbacks->patchEntity(
                        $feedback, 
                        [
                            'user_id'=>$user['id'],
                            'content'=>$content,
                            'feedback_date'=>$date
                        ]
                    );

                    if($this->Feedbacks->save($feedback)){
                        $this->redirect(['controller'=>'informations', 'action'=>'about']);
                    }
                }
            }else{
                $this->redirect(['controller' => 'users', 'action'=>'login', 'plugin' => 'backend']);
            }
        }
    }
}