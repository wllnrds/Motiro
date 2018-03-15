<section class="block-content">
  <header class="header">
    <div class="row">
        <div class="col-12 col-md-6 text-left text-md-left">
          <h2 class="title"><b>[<?= $event->code ?>]</b> <?= $event->label ?></h2>
        </div>
        <div class="col-12 col-md-6 text-left text-md-right">
          <a class="btn btn-outline-primary btn-sm" href="<?= $this->Url->build(["controller" => "Events", "action" => "edit", $event->id]) ?>">Editar Evento</a>
        </div>
    </div>

    <p class="text-description"><?= $event->description ?></p>

    <hr />
  </header>

  <section class="sub-block-content">
    <header class="header">
      <h2 class="title">Agendamentos (<?= $event->counter ?>)</h2>
    </header>
    <section>
      <?= $this->cell('Events', [$event->id]);?>
    </section>
  </section>

</section>
