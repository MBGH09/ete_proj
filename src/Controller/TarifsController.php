<?php
namespace App\Controller;

class tarifsController extends AppController
{
public function index()
{
    $this->loadComponent('Paginator');
    $tarifs = $this->Paginator->paginate($this->Tarifs->find());
    $this->set(compact('tarifs'));
}

public function view($datedebut = null, $datefin = null, $Prix = null)
{
    if ($datedebut === null || $datefin === null || $Prix === null) {
        $this->Flash->error(__('Invalid tarif parameters.'));
        return $this->redirect(['action' => 'index']);
    }
    
    try {
        $tarif = $this->Tarifs->get([$datedebut, $datefin, $Prix]);
        $this->set(compact('tarif'));
    } catch (\Exception $e) {
        $this->Flash->error(__('Tarif not found.'));
        return $this->redirect(['action' => 'index']);
    }
}
 public function add()
    {
        $tarif = $this->Tarifs->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarif = $this->Tarifs->patchEntity($tarif, $this->request->getData());
            if ($this->Tarifs->save($tarif)) {
                $this->Flash->success(__('Tarif has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add tarif.'));
            }
        }
        $this->set(compact('tarif'));
    }
       public function edit($datedebut = null, $datefin = null, $Prix = null)
    {
        if ($datedebut === null || $datefin === null || $Prix === null) {
            $this->Flash->error(__('Invalid tarif parameters.'));
            return $this->redirect(['action' => 'index']);
        }
        
        $tarif = $this->Tarifs->get([$datedebut, $datefin, $Prix]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $originalKey = [$datedebut, $datefin, $Prix];
            
            $data = $this->request->getData();
            
            // Convert dates to proper MySQL format (Y-m-d)
            if (!empty($data['datedebut'])) {
                $date = \DateTime::createFromFormat('d-m-Y', $data['datedebut']);
                if ($date) {
                    $data['datedebut'] = $date->format('Y-m-d');
                }
            }
            if (!empty($data['datefin'])) {
                $date = \DateTime::createFromFormat('d-m-Y', $data['datefin']);
                if ($date) {
                    $data['datefin'] = $date->format('Y-m-d');
                }
            }
            
            $newKey = [$data['datedebut'], $data['datefin'], $data['Prix']];
            if ($originalKey !== $newKey) {
                $this->Tarifs->delete($tarif);
                $tarif = $this->Tarifs->newEmptyEntity();
            }
            
            $tarif = $this->Tarifs->patchEntity($tarif, $data);
            if ($this->Tarifs->save($tarif)) {
                $this->Flash->success(__('Tarif has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update tarif.'));
            }
        }
        $this->set(compact('tarif'));
    }
    public function delete($datedebut, $datefin, $Prix)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarif = $this->Tarifs->get([$datedebut, $datefin, $Prix]);
        if ($this->Tarifs->delete($tarif)) {
            $this->Flash->success(__('Tarif has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete tarif.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}  

