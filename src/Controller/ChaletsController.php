<?php
namespace App\Controller;

class ChaletsController extends AppController
{


    public function index()
    {
       $this->loadComponent('Paginator');
        
      $chalets = $this->Paginator->paginate($this->Chalets->find());
        $this->set(compact('chalets'));
   }
   public function view($code = null)
   {
      if ($code === null) {
          $this->Flash->error(__('Invalid chalet code.'));
          return $this->redirect(['action' => 'index']);
      }
      $chalet = $this->Chalets->get($code);
       $this->set(compact('chalet'));
   }
 public function add()
    {
        $chalet = $this->Chalets->newEmptyEntity();
        if ($this->request->is('post')) {
            $chalet = $this->Chalets->patchEntity($chalet, $this->request->getData());
            if ($this->Chalets->save($chalet)) {
                $this->Flash->success(__('Chalet has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add chalet.'));
            }
        }
        $this->set(compact('chalet'));
    }
       public function edit($id)
    {
        $chalet = $this->Chalets->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chalet = $this->Chalets->patchEntity($chalet, $this->request->getData());
            if ($this->Chalets->save($chalet)) {
                $this->Flash->success(__('Chalet has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update chalet.'));
            }
        }
        $this->set(compact('chalet'));

}  
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chalet = $this->Chalets->get($id);
        if ($this->Chalets->delete($chalet)) {
            $this->Flash->success(__('Chalet has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete chalet.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}  
