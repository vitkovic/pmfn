<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deductions Controller
 *
 * @property \App\Model\Table\DeductionsTable $Deductions
 *
 * @method \App\Model\Entity\Deduction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cards', 'Turnovers']
        ];
        $deductions = $this->paginate($this->Deductions);

        $this->set(compact('deductions'));
    }

    /**
     * View method
     *
     * @param string|null $id Deduction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deduction = $this->Deductions->get($id, [
            'contain' => ['Cards', 'Turnovers']
        ]);

        $this->set('deduction', $deduction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deduction = $this->Deductions->newEntity();
        if ($this->request->is('post')) {
            $deduction = $this->Deductions->patchEntity($deduction, $this->request->getData());
            if ($this->Deductions->save($deduction)) {
                $this->Flash->success(__('The deduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deduction could not be saved. Please, try again.'));
        }
        $cards = $this->Deductions->Cards->find('list', ['limit' => 200]);
        $turnovers = $this->Deductions->Turnovers->find('list', ['limit' => 200]);
        $this->set(compact('deduction', 'cards', 'turnovers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Deduction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deduction = $this->Deductions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deduction = $this->Deductions->patchEntity($deduction, $this->request->getData());
            if ($this->Deductions->save($deduction)) {
                $this->Flash->success(__('The deduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deduction could not be saved. Please, try again.'));
        }
        $cards = $this->Deductions->Cards->find('list', ['limit' => 200]);
        $turnovers = $this->Deductions->Turnovers->find('list', ['limit' => 200]);
        $this->set(compact('deduction', 'cards', 'turnovers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Deduction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deduction = $this->Deductions->get($id);
        if ($this->Deductions->delete($deduction)) {
            $this->Flash->success(__('The deduction has been deleted.'));
        } else {
            $this->Flash->error(__('The deduction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
