<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2>Cadastrar Papel</h2>
    <hr>
  </header>

  <section>
    <?php $this->Form->setTemplates([
      'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>'
    ]);
    ?>
    <?= $this->Form->create($role) ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <?= $this->Form->control('label', ['class' => 'form-control', 'label' => [ 'text' => 'Nome']]) ?>
      </div>
      <div class="form-group col-sm-2">
        <?= $this->Form->control('level', ['class' => 'form-control', 'label' => [ 'text' => 'Nível']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false, 'class' => 'form-control', 'label' => [ 'text' => 'Descrição']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>
  </section>

</section>
