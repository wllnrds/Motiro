<h2>Lista de Eventos</h2>
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
    </tr>
  </thead>
  <tbody>
  <?php foreach($events as $event): ?>
    <tr>
      <th><?php echo $event->id; ?></th>
      <th><?php echo $event->code; ?></th>
      <th><?php echo $event->label; ?></th>
      <th><?php echo $event->description; ?></th>
      <th>
        <?php
        echo $this->Html->link(('Ver'), ['action' => 'view', $event->id]);
        ?>
        <?php
        echo $this->Html->link(('Editar'), ['action' => 'edit', $event->id]);
        ?>
        <?php
        echo $this->Form->postLink(('Apagar'),['action' => 'remove', $event->id], ['confirm' => ('Realmente quer apagar o evento?'), $event->id]);
        ?>
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
