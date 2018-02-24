<h2>Lista de Tipos de Calendários</h2>
<?php
echo $this->Html->link(__('Cadastrar'), ['action' => 'add']);
?>
<br />
<br />
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Descrição</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($types as $type): ?>
    <tr>
      <th><?php echo $type->id; ?></th>
      <th><?php echo $type->description; ?></th>
      <th>
        <?php
        echo $this->Html->link(('Ver'), ['action' => 'view', $type->id]);
        ?>
        <?php
        echo $this->Html->link(('Editar'), ['action' => 'edit', $type->id]);
        ?>
        <?php
        echo $this->Form->postLink(('Apagar'),['action' => 'remove', $type->id], ['confirm' => ('Realmente quer apagar o tipo?'), $type->id]);
        ?>
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
