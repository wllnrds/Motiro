<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2>Cadastrar Calendário</h2>
    <hr>
  </header>

  <section>
    <?php $this->Form->setTemplates([
      'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>',
      'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
      'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>'
    ]);
    ?>
    <?= $this->Form->create($calendar) ?>
    <div class="form-row">
      <div class="form-group col-md-6 col-lg-2">
        <?= $this->Form->control('type_id', ['options'=> $types, 'label' => [ 'text' => 'Tipo']]) ?>
      </div>
      <div class="form-group col-md-6 col-lg-2">
        <?= $this->Form->control('code', ['class' => 'form-control', 'label' => [ 'text' => 'Código']]) ?>
      </div>
      <div class="form-group col">
        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => [ 'text' => 'Nome']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false, 'class' => 'form-control', 'label' => [ 'text' => 'Descrição']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-primary']) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>
  </section>

</section>
