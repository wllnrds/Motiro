<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2>Editar Usuário</h2>
    <hr>
  </header>

  <section>
    <?php $this->Form->setTemplates([
      'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>',
      'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
      'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>'
    ]);
    ?>
    <?= $this->Form->create($user) ?>
    <div class="form-row">
      <div class="form-group col-md-6 col-lg-4">
        <?= $this->Form->control('username', ['class' => 'form-control', 'label' => [ 'text' => 'Usuário']]) ?>
      </div>
      <div class="form-group col-md-6 col-lg-4">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => [ 'text' => 'Senha']]) ?>
      </div>
      <div class="form-group col-md-6 col-lg-4">
        <?= $this->Form->control('role_id', ['label' => [ 'text' => 'Papel']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>
  </section>

</section>
