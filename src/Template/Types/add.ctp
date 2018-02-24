<h1>Cadastrar tipo de calendário</h1>
<?php
    echo $this->Form->create($type);
    echo $this->Form->control('description');
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
