<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }
    
    public function categoriesList()
    {
        $data['lv1'] = $this->Categories->find('all', ['fields'=>['id', 'name', 'description'], 'conditions'=>['parent_id=0']]);
        // $categories['lv2'] = $this->Categories->find('all', ['fields'=>['id', 'parent_id', 'name'], 'conditions'=>['parent_id!=0']]);
        $this->set('data', $data);
    }

    public function articlesByCategory($id = null)
    {
        $this->loadModel('Articles');
        $data = $this->Categories->get($id);
        $amountArticles = $this->Articles->find(
            'all',
            ['conditions' => ['status_id' => 1, 'category_id' => $id]]
        )->count();

        $this->set(['data' => $data, 'amountArticles' => $amountArticles]);
    }
}
