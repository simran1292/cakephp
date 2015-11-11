<h1>Add Order</h1>
<?php
echo $this->Form->create($customers);
echo $this->Form->input('FirstName');
echo $this->Form->input('LastName');
echo $this->Form->input('Address');
echo $this->Form->input('City');
echo $this->Form->input('Pin');
echo $this->Form->input('Email');
echo $this->Form->input('PhoneNo');
echo $this->Form->input('Pizza_Size',['options'=>['small'=>'Small ','medium'=>'Medium ','large'=>'Large','xlarge'=>'Xlarge']]);
echo $this->Form->input('Crust_Type',['options'=>['handtossed'=>'HandTossed','pan'=>'Pan','stuffed'=>'Stuffed ','thin'=>'Thin']]);?>
<div>
<?php 

 echo $this->Form->input('Toppings', array('type' => 'select', 'multiple' => 'checkbox','options' => array(
                'greenolives' => 'GreenOlives',
                'blackolives' => 'BlackOlives',
                'chicken' => 'Chicken',
                'pineapple' => 'PineApple',
                'pepperoni' => 'Pepperoni',
                'orange' => 'Orange',
                'feta' => 'Feta',
                'bacon' => 'Bacon'
            )
         ));

?>
</div>
<?php
echo $this->Form->button(__('Submit'));
echo $this->Form->end();
?>