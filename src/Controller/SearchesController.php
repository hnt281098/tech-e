<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Searches Controller
 *
 * @property \App\Model\Table\SearchesTable $Searches
 *
 * @method \App\Model\Entity\Search[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }
    
    public function topSearches()
    {
        $data = $this->Searches->find('all', 
            [
                'order'=>['times'=>'desc'], 
                'limit'=>10
            ]
        );
        $this->set('topSearches', $data);
    }

    public function search()
    {
        $this->loadModel('Articles');
        $keyword = $this->request->getData('keyword');
        $amountArticles = $this->Articles->find(
                'all',
                [
                    'conditions' => ['title LIKE' => "%$keyword%", 'status_id' => 1]
                ]
        )->count();

        $this->set(['keyword' => $keyword, 'amountArticles' => $amountArticles]);
    }
}
