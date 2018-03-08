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
    <?= $this->Html->script('fontawesome-all.min.js') ?>

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
                  <a href="<?= $this->Url->build('/', true) ?>" class="icon-item" title="Início">
                    <span class="box"><i class="fas fa-home" ></i></span>
                  </a>
                  <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "index"]) ?>" class="icon-item" title="Calendários">
                    <span class="box"><i class="far fa-calendar-alt" ></i></span>
                  </a>
                  <a href="<?= $this->Url->build(["controller" => "Events", "action" => "index"]) ?>" class="icon-item" title="Eventos">
                    <span class="box"><i class="far fa-calendar" ></i></span>
                  </a>
                  <a href="<?= $this->Url->build(["controller" => "Users", "action" => "index"]) ?>" class="icon-item" title="Usuários">
                    <span class="box"><i class="far fa-user" ></i></span>
                  </a>
                  <a href="<?= $this->Url->build(["controller" => "Settings", "action" => "index"]) ?>" class="icon-item" title="Configurações">
                    <span class="box"><i class="fas fa-cogs" ></i></span>
                  </a>
                </menu>
              </div>
              <!-- FIM BARRA DE MENU -->
            </div>
            <div class="col-12 col-md-4 col-lg-3">
              <div id="time-now" class="text-center text-md-left"><b>AGORA</b>, <span id="realtime"></span> </div>
            </div>
          </div>
        </div>
      </header>
      <section id="home-container">
        <div class="container-fluid">
          <div class="row">
            <!-- INICIO DA BARRA LATERAL -->
            <?php if ($this->fetch('menu')): ?>
              <div class="col-12 col-md-3 col-lg-2">
                <?= $this->fetch('menu') ?>
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
      </section>

      <script type="text/javascript">
        var monthNames = ["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
        function realtime(){
          var time = new Date();
          document.getElementById('realtime').innerHTML = time.getDate() + " de " + monthNames[time.getMonth()] + " de " + time.getYear() + ", " + time.getHours() + ":" + time.getMinutes();
          setTimeout(100, realtime);
        }
        realtime();
      </script>
</body>
</html>
