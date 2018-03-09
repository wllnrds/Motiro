<?php $this->start('sidebar'); ?>

<div id="calendar-sidebar"></div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#calendar-sidebar').fullCalendar({
      themeSystem: 'bootstrap4',
      contentHeight: 'auto',
      header: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      dayClick: function(date, jsEvent, view){
        window.location = "<?= $this->Url->build('/', true) ?>ver/" + date.format();
      }
    });
  });
</script>

<?php $this->end(); ?>

<div class="sub-line">
  <?php
    $months = ["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
    $today = new \DateTime('now');
    if($today->format('d-m-Y') == $date->format('d-m-Y')){
      echo '<b>HOJE</b>, ';
    }

    echo $date->format('d \d\e ') . $months[$date->format('n')-1] . $date->format(' \d\e Y') ?>
</div>

<!-- <section class="block-content">
  <header class="header">
    <h2 class="title">Recursos Alocados</h2>
  </header>
  <section class="card-columns flex-rows">
    <div class="card border-0">
      <div class="amount-resource">
        <div class="amout-graphic t-instrutor">
          <span class="dot p25"></span>
          <span class="dot p50"></span>
          <span class="dot p75"></span>
          <span class="bar" style="width:85%;"></span>
        </div>
        <div class="amout-caption">Calendários ativos // <b>Instrutor</b></div>
      </div>
    </div>
    <div class="card border-0">
      <div class="amount-resource">
        <div class="amout-graphic t-ambiente">
          <span class="dot p25"></span>
          <span class="dot p50"></span>
          <span class="dot p75"></span>
          <span class="bar" style="width:10%;"></span>
        </div>
        <div class="amout-caption">Calendários ativos // <b>AMBIENTE</b></div>
      </div>
    </div>
  </section>
</section> -->

<section class="block-content">
  <header class="header">
    <h2 class="title">Agendamentos</h2>
  </header>
  <section>
    <?= $this->cell('Schedules', [ $date->format('Y-m-d H:i:s') ]);?>
  </section>
</section>
