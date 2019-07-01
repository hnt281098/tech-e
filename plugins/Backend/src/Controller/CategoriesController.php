<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;
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
        $this->loadModel('Categories');
        $this->loadComponent('Backend.CheckInputs');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function view()
    {
        $this->response->type('json');
        $this->response->withStatus(200);   
        if ($this->request->query('type') == 'parent' ) {
            $categories = $this->paginate($this->Categories->find()->where(['parent_id = 0']));

            foreach($categories as $category) {
                unset($category['parent_id']);
            }
            $type = "Danh mục lớn";
        }

        else {
            $categories = $this->paginate($this->Categories->find()->where(['parent_id != 0']));

            foreach($categories as $category) {
                $parentName = $this->Categories->find()->where(['id' => $category['parent_id']])->select('name')->first();
                $category['parent'] = $parentName->name;
                unset($category['parent_id']);
            }
            $type = "Danh mục nhỏ";
        }

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $view->set(compact(['categories', 'type']));
        $html = $view->render('Backend.Categories/view');
        $this->response->body(json_encode(['html' => $html]));
        
        return $this->response;
    }

    public function viewDetail($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Articles']
        ]);

        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->response->type('json');
        $this->response->withStatus(200);
        
        if ($this->request->is('post')) {
            $category = $this->Categories->newEntity();
            $data = $this->request->getData();
            log::info($data);
            $check = $this->CheckInputs->execute($data, ['password', 'email']);

            if (!$check) {
                $this->response->withStatus(500);
                $response = [
                    'message' => 'Not enough required data',
                ];
                $this->response->body(json_encode($response));

                return $this->response;
            }

            $category = $this->Categories->patchEntity($category, $data);

            if ($this->Categories->save($category)) {
                $this->response->body(json_encode(['success' => 'true']));
                
                return $this->response;
            }

            $this->response->withStatus(500);
            $response = [
                'message' => 'Can not save',
            ];
            $this->response->body(json_encode($response));

            return $this->response;
        }

        $view = new \Cake\View\View();
        $view->setLayout(false);
        $html = $view->render('Backend.Categories/add');

        $response['html'] = $html;

        if ($this->request->query('type') != 'Danh mục lớn') {
            $parentCategories = $this->Categories->find()->where(['parent_id' => 0])->select(['name', 'id']);

            $response['parentCategories'] = $parentCategories;
        }
        
        $this->response->body(json_encode($response));

        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->data('id');
        $category = $this->Categories->get($id);

        $this->response->type('json');
        $this->response->withStatus(200);

        if ($this->Categories->delete($category)) {
            $this->response->body(json_encode(['success' => true]));

            return $this->response;
        }
        else {
            $this->response->withStatus(500);
            $this->response->body(json_encode(['success' => false]));

            return $this->response;
        }
    }

    public function categoriesList(){
        $lv1 = $this->Categories->find('all', ['fields'=>['id', 'name'], 'conditions'=>['parent_id=0']]);
        $lv2 = $this->Categories->find('all', ['fields'=>['id', 'parent_id', 'name'], 'conditions'=>['parent_id!=0']]);
        $this->set(['lv1'=>$lv1, 'lv2'=>$lv2]);
    }

    public function menu(){
        $categories['lv1'] = $this->Categories->find('all', ['fields'=>['id', 'name'], 'conditions'=>['parent_id=0']]);
        $categories['lv2'] = $this->Categories->find('all', ['fields'=>['id', 'parent_id', 'name'], 'conditions'=>['parent_id!=0']]);
        $this->set('categories', $categories);
    }
}
