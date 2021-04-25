<?php

namespace App\Controller;

class ItemsController extends AppController
{


    public function new()
    {

        $new = $this->Items->newEmptyEntity();
        if ($this->request->is('post')) {
            $new = $this->Items->patchEntity($new, $this->request->getData());
            $new->user_id = $this->request->getAttribute('identity')->id;
            if ($this->Items->save($new)) {
                $this->Flash->success('Saved');
            } else {
                $this->Flash->error('Try again');
            }
        }
        return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
    }

    public function index(){

    }

    public function edit($c = null)
    {
        // $this->viewBuilder()->setLayout('special');
        $q = $this->Items->get($c);

        //si on est en post (ou en put)
        if ($this->request->is(['post', 'put'])) {
            $this->Items->patchEntity($q, $this->request->getData());
            $this->Items->save($q);
            $this->Flash->success('Ok');
            // return $this->redirect(['controller'=>'Todolists','action' => 'index']);
        }

        $this->set(compact('q'));
    }

    public function delete($c = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $track = $this->Items->get($c);
        if ($this->Items->delete($track)) {
            $this->Flash->success('suprimer');
        } else {
            $this->Flash->error('impossible');
        }
        return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
    }


}
