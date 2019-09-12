<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Turnovers Controller
 *
 * @property \App\Model\Table\TurnoversTable $Turnovers
 *
 * @method \App\Model\Entity\Turnover[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TurnoversController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Businesses']
        ];
        $turnovers = $this->paginate($this->Turnovers);

        $this->set(compact('turnovers'));
    }

    /**
     * View method
     *
     * @param string|null $id Turnover id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turnover = $this->Turnovers->get($id, [
            'contain' => ['Businesses', 'Deductions']
        ]);

        $this->set('turnover', $turnover);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turnover = $this->Turnovers->newEntity();
        if ($this->request->is('post')) {
            $turnover = $this->Turnovers->patchEntity($turnover, $this->request->getData());
            if ($this->Turnovers->save($turnover)) {
                $this->Flash->success(__('The turnover has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turnover could not be saved. Please, try again.'));
        }
        $businesses = $this->Turnovers->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('turnover', 'businesses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Turnover id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turnover = $this->Turnovers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turnover = $this->Turnovers->patchEntity($turnover, $this->request->getData());
            if ($this->Turnovers->save($turnover)) {
                $this->Flash->success(__('The turnover has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turnover could not be saved. Please, try again.'));
        }
        $businesses = $this->Turnovers->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('turnover', 'businesses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Turnover id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turnover = $this->Turnovers->get($id);
        if ($this->Turnovers->delete($turnover)) {
            $this->Flash->success(__('The turnover has been deleted.'));
        } else {
            $this->Flash->error(__('The turnover could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
