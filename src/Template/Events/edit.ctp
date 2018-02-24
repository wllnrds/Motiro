<h1>Editar Evento</h1>
<?php
  echo $this->Form->create($event);
  echo $this->Form->control('code');
  echo $this->Form->control('label');
  echo $this->Form->control('description');
  echo $this->Form->button('Editar');
  echo $this->Form->end();
?>
