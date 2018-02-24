<h2>Lista de Calendários</h2>
<?php
echo $this->Html->link(__('Cadastrar'), ['action' => 'add']);
?>
<br />
<br />
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Código</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Tipo</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($calendarios as $calendario): ?>
    <tr>
      <th><?php echo $calendario->id; ?></th>
      <th><?php echo $calendario->code; ?></th>
      <th><?php echo $calendario->name; ?></th>
      <th><?php echo $calendario->description; ?></th>
      <th><?php echo $calendario->type_id; ?></th>
      <th>
        <?php
        echo $this->Html->link(('Ver'), ['action' => 'view', $calendario->id]);
        ?>
        <?php
        echo $this->Html->link(('Editar'), ['action' => 'edit', $calendario->id]);
        ?>
        <?php
        echo $this->Form->postLink(('Apagar'),['action' => 'remove', $calendario->id], ['confirm' => ('Realmente quer apagar o calendário?'), $calendario->id]);
        ?>
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
