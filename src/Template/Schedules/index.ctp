<h2>Lista de agendamentos</h2>
<?php
echo $this->Html->link(__('Cadastrar'), ['action' => 'add']);
?>
<br />
<br />
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Inicio</th>
      <th>Fim</th>
      <th>Evento</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($schedules as $schedule): ?>
    <tr>
      <th><?php echo $schedule->id; ?></th>
      <th><?php echo $schedule->begin; ?></th>
      <th><?php echo $schedule->end; ?></th>
      <th><?php echo $schedule->event_id; ?></th>
      <th>
        <?php
        echo $this->Html->link(('Ver'), ['action' => 'view', $schedule->id]);
        ?>
        <?php
        echo $this->Html->link(('Editar'), ['action' => 'edit', $schedule->id]);
        ?>
        <?php
        echo $this->Form->postLink(('Apagar'),['action' => 'remove', $schedule->id], ['confirm' => ('Realmente quer apagar o agendamento?'), $schedule->id]);
        ?>
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
