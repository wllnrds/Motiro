<?php $this->layout('Page') ?>

<h2>Cadastrar Evento</h2>
<hr>

<?php $this->Form->setTemplates([ 'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>' ]); ?>
<?= $this->Form->create($event) ?>

<div class="form-row">
  <div class="form-group col-md-2">
    <?= $this->Form->control('code', ['class' => 'form-control', 'label' => [ 'text' => 'Código']]) ?>
  </div>
  <div class="form-group col-md-10">
    <?= $this->Form->control('label', ['class' => 'form-control', 'label' => [ 'text' => 'Nome']]) ?>
  </div>
  <div class="form-group col">
    <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false, 'class' => 'form-control', 'label' => [ 'text' => 'Descrição']]) ?>
  </div>
  <div class="w-100"></div>
  <div class="form-group col">
    <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-primary']) ?>
  </div>
</div>

<?= $this->Form->end() ?>
