<h1>Edit Customer Order</h1>
<?php
echo $this->Form->create($orders);
echo $this->Form->input('FirstName');
echo $this->Form->input('LastName');
echo $this->Form->input('Address');
echo $this->Form->input('City');
echo $this->Form->input('Pin');
echo $this->Form->input('Email');
echo $this->Form->input('PhoneNo');
echo $this->Form->button(__('Submit'));
echo $this->Form->end();
?>