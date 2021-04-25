<?php

namespace App\Controller;

class TodolistsController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['index']);
    }

    public function new()
    {

        $n = $this->Todolists->newEmptyEntity();

        if ($this->request->is(['post', 'put'])) {
            $n->title = $this->request->getData('title');
            $n->user_id = $this->request->getAttribute('identity')->id;
            $n->visibility = $this->request->getData('visibility');

            //si le fichier est vide ou n'est au bon format
            if (empty($this->request->getData('picture')->getClientFilename()) ||
                !in_array($this->request->getData('picture')->getClientMediaType(), ['image/png', 'image.jpg', 'image/jpeg', 'image/gif'])) {

                $this->Flash->error('erreur de type');
            } else {

                //on creer un nouveu nom pour le fichier
                $ext = pathinfo($this->request->getData('picture')->getClientFilename(), PATHINFO_EXTENSION);
                $newName = 'pict-' . time() . '-' . rand(0, 9999) . '.' . $ext;


                $n->picture = $newName;

                if ($this->Todolists->save($n)) {
                    //on deplace le fichier de la memoire temporaire vers notre dissier date
                    $this->request->getData('picture')->moveTo(WWW_ROOT . 'img/data/pictures/' . $newName);

                    $this->Flash->success('bravo');
                    return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
                } else {
                    $this->Flash->error('impossible');


                }
            }

        }
        $this->set(compact('n'));
    }


    public function index()
    {

        $todolistIndex= $this->Todolists->find('all', ['contain' => ['Users', 'Items.Todolists']]);
        $this->loadModel('Items');
        $newItem = $this->Items->newEmptyEntity();
        $this->set(compact('todolistIndex', 'newItem'));

    }



    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $track = $this->Todolists->get($id);
        if ($this->Todolists->delete($track)) {
            $this->Flash->success('suprimer');
        } else {
            $this->Flash->error('impossible');
        }
        return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
    }

    public function edit($id)
    {

        $q = $this->Todolists->get($id);

        if ($this->request->is(['post', 'put'])) {

            $q->title = $this->request->getData('title');
            $q->user_id = $this->request->getAttribute('identity')->id;
            $q->visibility = $this->request->getData('visibility');

            if (empty($this->request->getData('picture')->getClientFilename()) ||
                !in_array($this->request->getData('picture')->getClientMediaType(), ['image/png', 'image.jpg', 'image/jpeg', 'image/gif'])) {

                $this->Flash->error('erreur de type');
            } else {

                $ext = pathinfo($this->request->getData('picture')->getClientFilename(), PATHINFO_EXTENSION);
                $newName = 'pict-' . time() . '-' . rand(0, 99999999) . '.' . $ext;

                $q->picture = $newName;

                if ($this->Todolists->save($q)) {
                    $this->request->getData('picture')->moveTo(WWW_ROOT . 'img/data/pictures/' . $newName);

                    $this->Flash->success('éléments modifier');
                    return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
                }
                $this->Flash->error('error');
            }
        }
        $this->set(compact('q'));
    }

    public function copy($id)
    {
        $this->LoadModel('Items');
        $this->loadModel('Copies');

        $todolistOrigin = $this->Todolists->get($id, ['contain' => ['Items'],]);

        $todolistCopy = $this->Todolists->newEmptyEntity();

        // $this->Authorization->skipAuthorization();

        $todolistCopy->title = $todolistOrigin->title . '(Copie)';
        $todolistCopy->user_id = $this->request->getAttribute('identity')->getIdentifier();


        if ($this->Todolists->save($todolistCopy)) {
            $this->Flash->success('la todoliste a ete sauvegardée');

            $copy = $this->Copies->newEmptyEntity();
            $copy->origin_id = $todolistOrigin->id;
            $copy->newlist_id = $todolistCopy->id;
            $this->Copies->save($copy);


            $idNewList = $todolistCopy->id;

            foreach ($todolistOrigin->items as $item) {
                $itemCopy = $this->Items->newEmptyEntity();

                $itemCopy->content = $item->content;
                $itemCopy->deadline = $item->deadline;
                $itemCopy->todolist_id = $idNewList;

               $this->Items->save($itemCopy);


            }

            return $this->redirect(['controller' => 'Todolists', 'action' => 'index']);
        } else {
            $this->Flash->error('la todoliste n\'est pas sauvegardée');
        }


    }
}
