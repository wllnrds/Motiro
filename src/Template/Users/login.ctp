<?php $this->layout('Clear'); ?>

<?php $this->Form->setTemplates(['inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>']); ?>

<div id="login-box">
  <h2>Login</h2>
  <?= $this->Form->create(); ?>
    <div class="form-row">
      <div class="form-group col-12">
        <?= $this->Form->control('username', ['class' => 'form-control', 'label' => [ 'text' => 'Usuário']]) ?>
      </div>
      <div class="form-group col-12">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => [ 'text' => 'Senha']]) ?>
      </div>
      <div class="w-100"></div>
      <div class="form-group col">
        <?= $this->Form->button('Login', ['class' => 'btn btn-primary btn-block']) ?>
      </div>
    </div>
  <?= $this->Form->end(); ?>
</div>
