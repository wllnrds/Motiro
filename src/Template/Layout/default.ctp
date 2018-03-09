<?php $this->extend('blank'); ?>

<div class="container-fluid">
  <div class="row">
    <!-- INICIO DA BARRA LATERAL -->
    <?php if ($this->fetch('sidebar')): ?>
      <div class="col-12 col-md-3 col-lg-2">
        <?= $this->fetch('sidebar') ?>
      </div>
    <?php endif; ?>
    <!-- FIM DA BARRA LATERAL -->

    <div class="col-12 col-md col-lg">
      <!-- INICIO DO CONTEÚDO -->
      <?= $this->Flash->render() ?>

      <div class="w-100"></div>

      <?= $this->fetch('content') ?>

      <!-- FIM DO CONTEÚDO -->
    </div>
  </div>
</div>
