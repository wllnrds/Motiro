<h1>Cadastrar Evento</h1>
<?php
    echo $this->Form->create($event);
    echo $this->Form->control('code');
    echo $this->Form->control('label');
    echo $this->Form->control('description');
    echo $this->Form->control('test');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
