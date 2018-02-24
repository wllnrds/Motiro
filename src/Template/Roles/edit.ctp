<h1>Editar Função</h1>
<?php
  echo $this->Form->create($role);
  echo $this->Form->control('label');
  echo $this->Form->control('description');
  echo $this->Form->button('Editar');
  echo $this->Form->end();
?>
