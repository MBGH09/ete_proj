<?php
namespace App\Controller;

class ReservationsController extends AppController
{
public function index()
{
    $this->loadComponent('Paginator');
        
    $reservations = $this->Paginator->paginate($this->Reservations->find());
    $this->set(compact('reservations'));
}

public function view($client_id = null, $date_entree = null, $date_sortie = null, $montant = null)
{
    if ($client_id === null || $date_entree === null || $date_sortie === null || $montant === null) {
        $this->Flash->error(__('Invalid reservation parameters.'));
        return $this->redirect(['action' => 'index']);
    }
    
    $reservation = $this->Reservations->get([$client_id, $date_entree, $date_sortie, $montant]);
    $this->set(compact('reservation'));
}
 public function add()
{
    $reservation = $this->Reservations->newEmptyEntity();
    
    // Charger la liste des chalets
    $this->loadModel('Chalets');
    $chalets = $this->Chalets->find('list', [
        'keyField' => 'code',
        'valueField' => 'code'
    ])->toArray();
    
    // Charger la liste des clients pour l'autocomplétion
    $this->loadModel('Clients');
    $clients = $this->Clients->find('list', [
        'keyField' => 'name',
        'valueField' => 'name'
    ])->toArray();
    
    if ($this->request->is('post')) {
        $data = $this->request->getData();
        
        // Trouver l'ID du client basé sur le nom
        if (!empty($data['client_name'])) {
            $client = $this->Clients->find()
                ->where(['name' => $data['client_name']])
                ->first();
            
            if ($client) {
                $data['client_id'] = $client->id;
                unset($data['client_name']); // Supprimer le nom temporaire
            } else {
                $this->Flash->error(__('Client not found. Please enter a valid client name.'));
                $this->set(compact('reservation', 'chalets', 'clients'));
                return;
            }
        }
        
        $reservation = $this->Reservations->patchEntity($reservation, $data);
        if ($this->Reservations->save($reservation)) {
            $this->Flash->success(__('Reservation has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('Unable to add reservation.'));
        }
    }
    $this->set(compact('reservation', 'chalets', 'clients'));
}
       public function edit($client_id = null, $date_entree = null, $date_sortie = null, $montant = null)
    {
        $this->request->allowMethod(['get', 'patch', 'post', 'put']);
        
        if ($client_id === null || $date_entree === null || $date_sortie === null || $montant === null) {
            $this->Flash->error(__('Invalid reservation parameters.'));
            return $this->redirect(['action' => 'index']);
        }
        
        $reservation = $this->Reservations->get([$client_id, $date_entree, $date_sortie, $montant]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $originalKey = [$client_id, $date_entree, $date_sortie, $montant];
            $data = $this->request->getData();
            
            // Convert dates to proper format if needed
            if (!empty($data['date_entree'])) {
                $data['date_entree'] = date('Y-m-d', strtotime($data['date_entree']));
            }
            if (!empty($data['date_sortie'])) {
                $data['date_sortie'] = date('Y-m-d', strtotime($data['date_sortie']));
            }
            
            $newKey = [$data['client_id'], $data['date_entree'], $data['date_sortie'], $data['montant']];
            if ($originalKey !== $newKey) {
                $this->Reservations->delete($reservation);
                $reservation = $this->Reservations->newEmptyEntity();
            }
            
            $reservation = $this->Reservations->patchEntity($reservation, $data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('Reservation has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update reservation.'));
            }
        }
        $this->set(compact('reservation'));
    }
    public function delete($client_id = null, $date_entree = null, $date_sortie = null, $montant = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']); // Temporarily add 'get'
        
        if ($client_id === null || $date_entree === null || $date_sortie === null || $montant === null) {
            $this->Flash->error(__('Invalid reservation parameters.'));
            return $this->redirect(['action' => 'index']);
        }
        
        $reservation = $this->Reservations->get([$client_id, $date_entree, $date_sortie, $montant]);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('Reservation has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete reservation.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}  

