<h1>Editar</h1>
<?php
    echo $this->Form->create($user);
    // Hard code the user for now.
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
