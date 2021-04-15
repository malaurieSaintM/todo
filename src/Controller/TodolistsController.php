<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Todolists Controller
 *
 * @property \App\Model\Table\TodolistsTable $Todolists
 * @method \App\Model\Entity\Todolist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TodolistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $todolists = $this->paginate($this->Todolists);

        $this->set(compact('todolists'));
    }

    /**
     * View method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $todolist = $this->Todolists->get($id, [
            'contain' => ['Users', 'Items'],
        ]);

        $this->set(compact('todolist'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $todolist = $this->Todolists->newEmptyEntity();
        if ($this->request->is('post')) {
            $todolist = $this->Todolists->patchEntity($todolist, $this->request->getData());
            if ($this->Todolists->save($todolist)) {
                $this->Flash->success(__('The todolist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todolist could not be saved. Please, try again.'));
        }
        $users = $this->Todolists->Users->find('list', ['limit' => 200]);
        $this->set(compact('todolist', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $todolist = $this->Todolists->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todolist = $this->Todolists->patchEntity($todolist, $this->request->getData());
            if ($this->Todolists->save($todolist)) {
                $this->Flash->success(__('The todolist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The todolist could not be saved. Please, try again.'));
        }
        $users = $this->Todolists->Users->find('list', ['limit' => 200]);
        $this->set(compact('todolist', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Todolist id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todolist = $this->Todolists->get($id);
        if ($this->Todolists->delete($todolist)) {
            $this->Flash->success(__('The todolist has been deleted.'));
        } else {
            $this->Flash->error(__('The todolist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
