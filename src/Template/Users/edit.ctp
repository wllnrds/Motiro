<h1>Editar Usuário</h1>
<?php
  echo $this->Form->create($user);
  echo $this->Form->control('username');
  echo $this->Form->control('password');
  echo $this->Form->control('role_id');
  echo $this->Form->button('Editar');
  echo $this->Form->end();
?>
