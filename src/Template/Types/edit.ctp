<h1>Editar tipo de calendário</h1>
<?php
  echo $this->Form->create($type);
  echo $this->Form->control('description');
  echo $this->Form->button('Editar');
  echo $this->Form->end();
?>
