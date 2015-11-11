<?php
namespace App\Controller;
use App\Controller\AppController;
class OrdersController extends AppController
{

      public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); 
    }
    public function index()
    {
        $orders=$this->Orders->find('all');
        $this->set(compact('orders'));
    }
   public function add()
   {
        $orders = $this->Orders->newEntity();
        if ($this->request->is('post')) 
        {
            $orders = $this->Orders->patchEntity($orders, $this->request->data);
            $orders->user_id = $this->Auth->user('id');
            $total=0;
            if($orders->Pizza_Size=='small')
            {
                $total=$total+5;
            }
            else if($orders->Pizza_Size=='medium')
            {
                $total=$total+10;
            }
              else if($orders->Pizza_Size=='large')
            {
                $total=$total+15;
            }
               elseif($orders->Pizza_Size=='xlarge')
            {
                $total=$total+20;
            }
            
            if($orders->Crust_Type=='stuffed')
            {
                $total=$total+2;
            }
            $valueCount=sizeof($this->request->data['Toppings']);
                        $ping=0;
                        for($i=0;$i<$valueCount;$i++)
                        {
                            $ping+=0.5;
                            $total=$total+$ping;   
                        }
                        $topName=$this->request->data['Toppings'];
                        $i=1;
                    $total=$total-0.5;
                    $orders->Total=$total;
                    if ($this->Orders->save($orders)) 
                    {
                        $this->Flash->success(__('Order Added'));
                        return $this->redirect(['action' => 'index']);
                    }    
                    $this->Flash->error(__('Unable to add .'));
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
                $this->Flash->Success((' Updated'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(('Nothing has been added'));
            
        }
        $this->set('orders',$orders);
    }
    public function delete($id)
    {
        $this->request->allowMethod(['post','delete']);
        $orders=$this->Orders->get($id);
        if($this->Orders->delete($orders))
        {
           $this->Flash->success(__('Order with id: {0} is deleted', h($id)));
            return $this->redirect(['action'=>'index']);
        }
    }
    public function isAuthorized($user)
    {
    // All registered users can add articles
    if ($this->request->action === 'add') {
        return true;
    }

   if (in_array($this->request->action, ['edit', 'delete'])) {
        $ordersId = (int)$this->request->params['pass'][0];
        if ($this->Orders->isOwnedBy($ordersId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
    }
}
?>
