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
    <?= $this->Html->css('fullcalendar.min.css') ?>
    <?= $this->Html->css('master.css') ?>
    <?= $this->Html->css('selectize.css') ?>
    <?= $this->Html->css('selectize.default.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('fontawesome-all.min.js') ?>
    <?= $this->Html->script('selectize.js') ?>
    <?= $this->Html->script('jquery.mask.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
  <header id="top-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-2">
          <!-- COMEÇO LOGO MOTIRÕ -->
          <h1 id="main-logo" class="text-center text-md-left">
            <img src="<?= $this->Url->build('/', true) . 'img/logo_2.png' ?>" alt="" />
          </h1>
          <!-- FIM LOGO MOTIRÕ -->
        </div>
        <div class="col-12 col-md">
          <!-- COMEÇO BARRA DE MENU -->
          <div class="text-center text-sm-left">
            <menu id="main-menu">
              <?php if(isset($level) && $level <= 10): ?>
              <a href="<?= $this->Url->build('/', true) ?>" class="icon-item" title="Início">
                <span class="box"><i class="fas fa-home" ></i></span>
              </a>
              <?php endif; ?>
              <?php if(isset($level) && $level < 10): ?>
              <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "index"]) ?>" class="icon-item" title="Calendários">
                <span class="box"><i class="far fa-calendar-alt" ></i></span>
              </a>
              <a href="<?= $this->Url->build(["controller" => "Events", "action" => "index"]) ?>" class="icon-item" title="Eventos">
                <span class="box"><i class="far fa-calendar" ></i></span>
              </a>
              <?php endif; ?>
              <?php if(isset($level) && $level <= 2): ?>
              <a href="<?= $this->Url->build(["controller" => "Users", "action" => "index"]) ?>" class="icon-item" title="Usuários">
                <span class="box"><i class="far fa-user" ></i></span>
              </a>
              <?php endif; ?>
              <?php if(isset($level) && $level <= 1): ?>
              <a href="<?= $this->Url->build(["controller" => "Pages", "action" => "Settings"]) ?>" class="icon-item" title="Configurações">
                <span class="box"><i class="fas fa-cogs" ></i></span>
              </a>
              <?php endif; ?>
              <?php if(isset($level) && $level <= 10): ?>
              <a href="<?= $this->Url->build(["controller" => "Users", "action" => "logout"]) ?>" class="icon-item alert-color" title="Deslogar">
                <span class="box"><i class="fas fa-sign-out-alt" ></i></span>
              </a>
              <?php endif; ?>
            </menu>
          </div>
          <!-- FIM BARRA DE MENU -->
        </div>
        <div class="col-12 col-md-4 col-lg-3 align-bottom text-center text-lg-right">
          Olá, <?= $this->request->session()->read('Auth.User.username') ?> - <div id="time-now" class="d-inline-block text-center text-md-right"><b>AGORA</b>, <span id="realtime"></span></div>
        </div>
      </div>
    </div>
  </header>
  <section id="home-container">
      <?= $this->fetch('content') ?>
  </section>

  <script type="text/javascript">
    var monthNames = ["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
    function realtime(){
      var time = new Date();
      $('#realtime').html(time.getDate() + " de " + monthNames[time.getMonth()] + " de " + time.getFullYear() + ", ");
      $('#realtime').append(("0" + time.getHours()).slice(-2) + ":" + ("0" + time.getMinutes()).slice(-2));
      setTimeout(100, realtime);
    }
    realtime();

    $(document).ready(function(){
      $('.mask-date').mask('00/00/0000', {placeholder: "dd/mm/aaaa"});
      $('.mask-time').mask('00:00', {placeholder: "hh:mm"});
    });
  </script>
  <?= $this->Html->script('moment.js') ?>
  <?= $this->Html->script('fullcalendar.min.js') ?>
  <?= $this->Html->script('pt-br.js') ?>
</body>
</html>
