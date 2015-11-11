<?php
namespace App\Controller;
use App\Controller\AppController;
class OrdersController extends AppController
{

      public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    public function index()
    {
        $orders=$this->Orders->find('all');//between "Customer" is the table
        $this->set(compact('orders'));
    }
   public function add()
   {
        $orders = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $orders = $this->Orders->patchEntity($orders, $this->request->data);
            // Added this line
            $orders->user_id = $this->Auth->user('id');
            $total=0;//Created variable
            if($orders->Pizza_Size=='small')
            {
                $total+=5;
                //echo $total;
            }
            else if($orders->Pizza_Size=='medium')
            {
                $total+=10;
            }
              else if($orders->Pizza_Size=='large')
            {
                $total+=15;
            }
               elseif($orders->Pizza_Size=='xlarge')
            {
                $total+=20;
            }
            
            if($orders->Crust_Type=='stuffed')//Adding Cost for Stuffed Pizza
            {
                $total+=2;
            }
            //Adding Toppings Value////////////////////
            $count=sizeof($this->request->data['Toppings']);
                        $j=0;
                        for($i=0;$i<$count;$i++)
                        {
                            $j=$j+0.5;
                            $total+=$j;   
                        }
                        $topName=$this->request->data['Toppings'];
                        
                        $hi;
                        $i=1;
                        foreach($topName as $topN)
                        {
                                
                                $ToppingsVar= "$topN,";
                                $hi=$orders->Toppings=$ToppingsVar;
                        }
                       
                       
                         
                     $total=$total-0.5;//Getting total values
                   
                    $orders->Total=$total;
            //Saving
         if ($this->Orders->save($orders)) {
                $this->Flash->success(__('Customers Has been Added'));//printing
              return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('orders', $orders);
   }
    public function edit($id = null)
    {
        $orders=$this->Orders->get($id);
        if($this->request->is(['post','put']))
        {
            $this->Orders->patchEntity($orders,$this->request->data);
            if($this->Orders->save($orders))
            {
                $this->Flash->Success(('Data is Updated'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(('Unable to Update'));
            
        }
        $this->set('orders',$orders);
    }
    public function delete($id)
    {
        $this->request->allowMethod(['post','delete']);
        $orders=$this->Orders->get($id);
        if($this->Orders->delete($orders))
        {
          //  $this->Flash->success(('Customer With id:{0} has been deleted', h($id)));
           $this->Flash->success(__('Customer with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action'=>'index']);
        }
    }
    public function isAuthorized($user)
    {
    // All registered users can add articles
    if ($this->request->action === 'add') {
        return true;
    }

    // The owner of an article can edit and delete it
    if (in_array($this->request->action, ['edit', 'delete'])) {
        $customersId = (int)$this->request->params['pass'][0];
        if ($this->Customer->isOwnedBy($customersId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
    }
}
?>
