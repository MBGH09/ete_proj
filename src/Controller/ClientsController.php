<?php
namespace App\Controller;

class ClientsController extends AppController
{
public function index()

    {
       $this->loadComponent('Paginator');
        
      $clients = $this->Paginator->paginate($this->Clients->find());

        $this->set(compact('clients'));
   }
   public function view($id = null)
   {
            if ($id === null) {
          $this->Flash->error(__('Invalid client ID.'));
          return $this->redirect(['action' => 'index']);
      }
      $client = $this->Clients->get($id);
       $this->set(compact('client'));
   }
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('Client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add client.'));
            }
        }
        $this->set(compact('client'));
    }
       public function edit($id)
    {
        $client = $this->Clients->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('Client has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update client.'));
            }
        }
        $this->set(compact('client'));

}  
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('Client has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete client.'));
        }
        return $this->redirect(['action' => 'index']);
    }
  

}
