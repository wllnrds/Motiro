<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2>Editar Tipo de Calendário</h2>
    <hr>
  </header>
  <section>
    <?php $this->Form->setTemplates([ 'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>' ]); ?>
    <?= $this->Form->create($type) ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <?= $this->Form->control('description', ['class' => 'form-control', 'label' => [ 'text' => 'Tipo']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
      </div>
    </div>
    <?= $this->Form->end() ?>
  </section>
</section>
