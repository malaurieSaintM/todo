<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Copies Controller
 *
 * @property \App\Model\Table\CopiesTable $Copies
 * @method \App\Model\Entity\Copy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CopiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Newlists'],
        ];
        $copies = $this->paginate($this->Copies);

        $this->set(compact('copies'));
    }

    /**
     * View method
     *
     * @param string|null $id Copy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $copy = $this->Copies->get($id, [
            'contain' => ['Newlists', 'Copies'],
        ]);

        $this->set(compact('copy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $copy = $this->Copies->newEmptyEntity();
        if ($this->request->is('post')) {
            $copy = $this->Copies->patchEntity($copy, $this->request->getData());
            if ($this->Copies->save($copy)) {
                $this->Flash->success(__('The copy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The copy could not be saved. Please, try again.'));
        }
        $newlists = $this->Copies->Newlists->find('list', ['limit' => 200]);
        $this->set(compact('copy', 'newlists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Copy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $copy = $this->Copies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $copy = $this->Copies->patchEntity($copy, $this->request->getData());
            if ($this->Copies->save($copy)) {
                $this->Flash->success(__('The copy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The copy could not be saved. Please, try again.'));
        }
        $newlists = $this->Copies->Newlists->find('list', ['limit' => 200]);
        $this->set(compact('copy', 'newlists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Copy id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $copy = $this->Copies->get($id);
        if ($this->Copies->delete($copy)) {
            $this->Flash->success(__('The copy has been deleted.'));
        } else {
            $this->Flash->error(__('The copy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
