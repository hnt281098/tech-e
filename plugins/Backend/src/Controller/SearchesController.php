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
    public $helpers = ['Session'];
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Searches');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $searches = $this->paginate($this->Searches);

        $this->set(compact('searches'));
    }

    /**
     * View method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $search = $this->Searches->get($id, [
            'contain' => []
        ]);

        $this->set('search', $search);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $search = $this->Searches->newEntity();
        if ($this->request->is('post')) {
            $search = $this->Searches->patchEntity($search, $this->request->getData());
            if ($this->Searches->save($search)) {
                $this->Flash->success(__('The search has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search could not be saved. Please, try again.'));
        }
        $this->set(compact('search'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $search = $this->Searches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $search = $this->Searches->patchEntity($search, $this->request->getData());
            if ($this->Searches->save($search)) {
                $this->Flash->success(__('The search has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search could not be saved. Please, try again.'));
        }
        $this->set(compact('search'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $search = $this->Searches->get($id);
        if ($this->Searches->delete($search)) {
            $this->Flash->success(__('The search has been deleted.'));
        } else {
            $this->Flash->error(__('The search could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function topSearches()
    {
        $data = $this->Searches->find('all', ['order'=>['times'=>'desc'], 'limit'=>5]);
        $this->set('topSearches', $data);
    }
}
