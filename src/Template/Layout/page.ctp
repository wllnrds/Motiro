
<?php $this->extend('blank'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <!-- INICIO DO CONTEÚDO -->
      <?= $this->Flash->render() ?>

      <div class="w-100"></div>

      <?= $this->fetch('content') ?>

      <!-- FIM DO CONTEÚDO -->
    </div>
  </div>
</div>
