<h1>Editar</h1>
<?php
    echo $this->Form->create($calendar);
    // Hard code the calendar for now.
    echo $this->Form->control('code');
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
