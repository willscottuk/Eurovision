<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Votes Controller
 *
 * @property \App\Model\Table\VotesTable $Votes
 */
class VotesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Countries'],
            'conditions' => [
            'Votes.user_id' => $this->Auth->user('id'),
        ]
        ];
        $votes = $this->paginate($this->Votes);

        $this->set(compact('votes'));
        $this->set('_serialize', ['votes']);
    }

    /**
     * View method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vote = $this->Votes->get($id, [
            'contain' => ['Users', 'Countries']
        ]);

        $this->set('vote', $vote);
        $this->set('_serialize', ['vote']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $vote = $this->Votes->newEntity();
        if ($this->request->is('post')) {
            $vote = $this->Votes->patchEntity($vote, $this->request->getData());
            $vote->user_id = $this->Auth->user('id');
            $vote->country_id = $id;
            if ($this->Votes->save($vote)) {
                $this->Flash->success(__('The vote has been saved.'));
                return $this->redirect(['controller' => 'Home','action' => 'index']);
            }
            $this->Flash->error(__('The vote could not be saved. Please, try again.'));
        }
        $users = $this->Votes->Users->find('list', ['limit' => 200]);
        $countries = $this->Votes->Countries->find()->combine('id', 'name');
        $this->set(compact('vote', 'users', 'countries', 'id'));
        $this->set('_serialize', ['vote']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vote = $this->Votes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vote = $this->Votes->patchEntity($vote, $this->request->getData());
            $vote->user_id = $this->Auth->user('id');
            if ($this->Votes->save($vote)) {
                $this->Flash->success(__('The vote has been saved.'));

                return $this->redirect(['controller' => 'Home','action' => 'index']);
            }
            $this->Flash->error(__('The vote could not be saved. Please, try again.'));
        }
        $users = $this->Votes->Users->find('list', ['limit' => 200]);
        $countries = $this->Votes->Countries->find()->combine('id', 'name');
        $this->set(compact('vote', 'users', 'countries'));
        $this->set('_serialize', ['vote']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vote = $this->Votes->get($id);
        if ($this->Votes->delete($vote)) {
            $this->Flash->success(__('The vote has been deleted.'));
        } else {
            $this->Flash->error(__('The vote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user)
	{
	    $action = $this->request->getParam('action');
	
	    // The add and index actions are always allowed.
	    if (in_array($action, ['index', 'add', 'tags'])) {
	        return true;
	    }
	    // All other actions require an id.
	    if (!$this->request->getParam('pass.0')) {
	        return false;
	    }
	
	    // Check that the bookmark belongs to the current user.
	    $id = $this->request->getParam('pass.0');
	    $vote = $this->Votes->get($id);
	    if ($vote->user_id == $user['id']) {
	        return true;
	    }
	    return parent::isAuthorized($user);
	}

}
