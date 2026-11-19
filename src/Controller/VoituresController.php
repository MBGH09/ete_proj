<?php
namespace App\Controller;

class VoituresController extends AppController
{


    public function index()
    {
       $this->loadComponent('Paginator');
        
      $voitures = $this->Paginator->paginate($this->Voitures->find());
        $this->set(compact('voitures'));
   }
   public function view($code = null)
   {
      if ($code === null) {
          $this->Flash->error(__('Invalid voiture code.'));
          return $this->redirect(['action' => 'index']);
      }
      $voiture = $this->Voitures->get($code);
       $this->set(compact('voiture'));
   }
 public function add()
    {
        $voiture = $this->Voitures->newEmptyEntity();
        if ($this->request->is('post')) {
            $voiture = $this->Voitures->patchEntity($voiture, $this->request->getData());
            if ($this->Voitures->save($voiture)) {
                $this->Flash->success(__('Voiture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add voiture.'));
            }
        }
        $this->set(compact('voiture'));
    }
       public function edit($id)
    {
        $voiture = $this->Voitures->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voiture = $this->Voitures->patchEntity($voiture, $this->request->getData());
            if ($this->Voitures->save($voiture)) {
                $this->Flash->success(__('Voiture has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update voiture.'));
            }
        }
        $this->set(compact('voiture'));

}  
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voiture = $this->Voitures->get($id);
        if ($this->Voitures->delete($voiture)) {
            $this->Flash->success(__('Voiture has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete voiture.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}  
