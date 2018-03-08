<h1>Cadastrar Agendamento</h1>
<?php
    echo $this->Form->create($schedule);
    echo $this->Form->control('begin');
    echo $this->Form->control('end');
    echo $this->Form->control('event_id');
    echo $this->Form->input('calendars._ids', ['options' => $calendars]);
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
?>
