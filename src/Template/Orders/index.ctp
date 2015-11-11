<h1>Pizza-Pizza</h1>
<?= $this->Html->link('AddCustomer ', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Phone</th>
        <th>Total</th>
    </tr>
    <?php foreach ($orders as $value): ?>
    <tr>
        <td><?= $value->id ?></td>
        <td><?= $value->FirstName?></td>
        <td><?= $value->LastName?></td>
        <td><?= $value->Address?></td>
        <td><?= $value->City?></td>
        <td><?= $value->PhoneNo?></td>
        <td><?= $value->Total?></td>
         <td><?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $value->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
        <td><?= $this->Html->link('Edit', ['action' => 'edit', $value->id]) ?></td>
        
    </tr>
    <?php endforeach; ?>
</table>