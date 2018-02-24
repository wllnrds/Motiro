<h1>Cadastrar Função</h1>
<?php
    echo $this->Form->create($role);
    echo $this->Form->control('label');
    echo $this->Form->control('description');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
