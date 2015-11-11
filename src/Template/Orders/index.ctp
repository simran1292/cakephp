<h1>Pizza-Pizza</h1>
<?= $this->Html->link('AddCustomer ', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Address</th>
        <th>City</th>
        <th>PhoneNo</th>
        <th>Total</th>
    </tr>
    <?php foreach ($orders as $data): ?>
    <tr>
        <td><?= $data->id ?></td>
        <td><?= $data->FirstName?></td>
        <td><?= $data->LastName?></td>
        <td><?= $data->Address?></td>
        <td><?= $data->City?></td>
        <td><?= $data->PhoneNo?></td>
        <td><?= $data->Total?></td>
         <td><?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $data->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
        <td><?= $this->Html->link('Edit', ['action' => 'edit', $data->id]) ?></td>
        
    </tr>
    <?php endforeach; ?>
</table>