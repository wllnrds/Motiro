<h1>Cadastrar Calendário</h1>
<?php
    echo $this->Form->create($calendar);
    echo $this->Form->control('code');
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->control('type_id');
    echo $this->Form->control('test');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
