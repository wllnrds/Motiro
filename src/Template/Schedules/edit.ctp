<h1>Editar Agendamento</h1>
<?php
  echo $this->Form->create($schedule);
  echo $this->Form->control('begin');
  echo $this->Form->control('end');
  echo $this->Form->control('event_id');
  echo $this->Form->button('Editar');
  echo $this->Form->end();
?>
