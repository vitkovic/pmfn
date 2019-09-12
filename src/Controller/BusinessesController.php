<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Businesses Controller
 *
 * @property \App\Model\Table\BusinessesTable $Businesses
 *
 * @method \App\Model\Entity\Business[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Managers', 'Vendors']
        ];
        $businesses = $this->paginate($this->Businesses);

        $this->set(compact('businesses'));
    }

    /**
     * View method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => ['Managers', 'Vendors', 'Turnovers']
        ]);

        $this->set('business', $business);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $business = $this->Businesses->newEntity();
        if ($this->request->is('post')) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }
        $managers = $this->Businesses->Managers->find('list', ['limit' => 200]);
        $vendors = $this->Businesses->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('business', 'managers', 'vendors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $business = $this->Businesses->patchEntity($business, $this->request->getData());
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business could not be saved. Please, try again.'));
        }
        $managers = $this->Businesses->Managers->find('list', ['limit' => 200]);
        $vendors = $this->Businesses->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('business', 'managers', 'vendors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $business = $this->Businesses->get($id);
        if ($this->Businesses->delete($business)) {
            $this->Flash->success(__('The business has been deleted.'));
        } else {
            $this->Flash->error(__('The business could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    // SEARCH
    public function search()
    {
        $request = $this->request->getData();
        $search_term = null;$search_manager=null;$search_vendor=null;$search_created_at;
        if (array_key_exists('pretrazi', $request) != null) $search_term = $request['pretrazi'];
        if (array_key_exists('vendor', $request) != null) $search_vendor = $request['vendor'];
        if (array_key_exists('manager', $request) != null) $search_manager= $request['manager'];
        if (array_key_exists('created_at', $request) != null) $search_created_at= $request['created_at'];


        //echo $state;

        if ($search_term !=null && $search_term !="") {
            $Businesses = $this->Businesses->find('all')
            ->where(['Businesses.business_name LIKE'=>'%'.$search_term.'%'])
            ->orWhere(['Businesses.Description LIKE'=>'%'.$search_term.'%'])
            ->orWhere(['Businesses.manager_id LIKE'=>'%'.$search_term.'%'])
            ->orWhere(['Businesses.vendor_id LIKE'=>'%'.$search_term.'%']);
        } else if ($search_manager !=null && $search_manager !="") {
            $Businesses = $this->Businesses->find('all')
            ->where(['Businesses.manager_id LIKE'=>'%'.$search_manager.'%']);
        } else if ($search_vendor !=null && $search_vendor !="") {
            $Businesses = $this->Businesses->find('all')
            ->where(['Businesses.vendor_id LIKE'=>'%'.$search_vendor.'%']);
        } else if ($search_created_at !=null && $search_created_at !="") {
            $Businesses = $this->Businesses->find('all')
            ->where(['Businesses.created_at LIKE'=>'%'.$search_created_at.'%']);
        } else {
          $Businesses = $this->Businesses->find('all');
        }

        $this->set('search',$search_term);
        //	$this->set('states',$status_select);
        $this->paginate = [
            'contain' => ['Managers', 'Vendors']
        ];
        $businesses = $this->paginate($Businesses);



        $this->set(compact('businesses'));

		//$Businesses = $this->Businesses->find('all',array('conditions'=>array('Businesses.UserID'=>$this->Auth->User('UserID'))));


    }
}
