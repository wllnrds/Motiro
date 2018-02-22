<!-- File: src/Template/Articles/index.ctp -->

<h1>Adicionar</h1>
<?php
    echo $this->Form->create();
    // Hard code the shedules for now.
    echo $this->Form->control('begin');
    echo $this->Form->control('end');
    echo $this->Form->control('event_id');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
