<h2>Lista de Funções</h2>
<?php
echo $this->Html->link(__('Cadastrar'), ['action' => 'add']);
?>
<br />
<br />
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Função</th>
      <th>Descrição</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($roles as $role): ?>
    <tr>
      <th><?php echo $role->id; ?></th>
      <th><?php echo $role->label; ?></th>
      <th><?php echo $role->description; ?></th>
      <th>
        <?php
        echo $this->Html->link(('Ver'), ['action' => 'view', $role->id]);
        ?>
        <?php
        echo $this->Html->link(('Editar'), ['action' => 'edit', $role->id]);
        ?>
        <?php
        echo $this->Form->postLink(('Apagar'),['action' => 'remove', $role->id], ['confirm' => ('Realmente quer apagar a função?'), $role->id]);
        ?>
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
