<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $users = $this->Paginator->paginate($this->Users->find());
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        if ($id === null) {
            $this->Flash->error(__('Invalid user ID.'));
            return $this->redirect(['action' => 'index']);
        }
        
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add user.'));
            }
        }
        $this->set(compact('user'));
    }
    public function edit($id)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update user.'));
            }
        }
        $this->set(compact('user'));

}  
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('User has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete user.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
