<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        Motirõ - <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('master.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('fontawesome-all.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
  <header id="clear-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <!-- COMEÇO LOGO MOTIRÕ -->
          <h1 id="main-logo" class="text-center">
            <img src="<?= $this->Url->build('/', true) . 'img/logo_1.png' ?>" alt="" />
          </h1>
          <!-- FIM LOGO MOTIRÕ -->
        </div>
      </div>
    </div>
  </header>
  <section id="clear-container">
      <?= $this->fetch('content') ?>
  </section>
</body>
</html>
