<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 *
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    public function about()
    {
        $this->loadModel('Articles');
        $this->loadModel('Users');
        $this->loadModel('Comments');
        $this->loadModel('Feedbacks');

        $article = $this->Articles->find('all');
        
        $data['amountArticle'] = $article->count();
        $data['amountUser'] = $this->Users->find(
            'all',
            ['conditions'=>['role_id'=>3]]
        )->count();
        $data['amountComment'] = $this->Comments->find('all')->count();
        $data['amountView'] = $article->sumOf('view');
        $data['team'] = $this->Users->find(
            'all',
            [
                'conditions'=>['role_id'=>1]
            ]
        );
        $data['feedback'] = $this->Feedbacks->find(
            'all',
            ['order'=>['feedback_date'=>'DESC', 'Feedbacks.id'=>'DESC'], 'limit'=>10, 'contain'=>'Users']
        );

        $this->set('data', $data);
    }

    public function termsConditions()
    {
        
    }
}
