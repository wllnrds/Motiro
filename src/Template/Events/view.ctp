<section class="block-content">
  <header class="header">
    <h2 class="title"><b>[<?= $event->code ?>]</b> <?= $event->label ?></h2>
    <p><?= $event->description ?></p>

    <hr />

    <a class="btn btn-primary" href="<?= $this->Url->build(["controller" => "Schedules", "action" => "add", $event->id]) ?>">Adicionar Agendamento</a>
  </header>

  <section>
    <?= $this->cell('Events', [$event->id]);?>
  </section>

</section>
