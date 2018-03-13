<?php $this->Form->setTemplates([ 'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>' ]); ?>
<section class="block-content">
  <section>
    <div class="row">
        <div class="w-100"></div>
        <div class="col-12 col-md-6 col-lg-4">
          <section class="sub-block-content">
            <header class="header">
              <h2>Editar Evento</h2>
              <hr>
            </header>
            <section>
              <?= $this->Form->create($event) ?>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <?= $this->Form->control('code', ['class' => 'form-control', 'label' => [ 'text' => 'Código']]) ?>
                </div>
                <div class="form-group col-md-10">
                  <?= $this->Form->control('label', ['class' => 'form-control', 'label' => [ 'text' => 'Nome']]) ?>
                </div>
                <div class="form-group col">
                  <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false, 'class' => 'form-control', 'label' => [ 'text' => 'Descrição']]) ?>
                </div>
                <div class="w-100"></div>
                <div class="form-group col">
                  <?= $this->Form->button('Salvar Evento', ['class' => 'btn btn-primary']) ?>
                </div>
              </div>
              <?= $this->Form->end() ?>
            </section>
          </section>
        </div>

        <div class="col-12 col-md-6 col-lg-8">
          <section class="sub-block-content">
            <header class="header">
              <h2 class="title">Agendamentos (<?= $event->counter ?>)</h2>
              <hr>
            </header>
            <section>
              <?= $this->Form->create('schedule') ?>
              <div class="form-row">
                <div class="form-group col-12 col-sm-3 col-md-2">
                  <?= $this->Form->control('date', [ 'required' => true, 'type' => 'text', 'class' => 'form-control', 'label' => [ 'text' => 'Data']]) ?>
                </div>
                <div class="form-group col-6 col-sm-3 col-md-2">
                  <?= $this->Form->control('begin-time', [ 'required' => true, 'type' => 'text', 'class' => 'form-control', 'label' => [ 'text' => 'Hora de Início']]) ?>
                </div>
                <div class="form-group col-6 col-sm-3 col-md-2">
                  <?= $this->Form->control('end-time', [ 'required' => true, 'type' => 'text', 'class' => 'form-control', 'label' => [ 'text' => 'Hora de Fim']]) ?>
                </div>
                <div class="form-group col">
                  <?= $this->Form->control('callendars._ids', ['required' => true, 'type' => 'select', 'class' => 'form-control', 'label' => [ 'text' => 'Calendários']]) ?>
                </div>
                <div class="w-100"></div>
                <div class="form-group col">
                  <?= $this->Form->button('Salvar Agendamento', ['class' => 'btn btn-primary']) ?>
                </div>
              </div>
              <?= $this->Form->end() ?>
            </section>
            <section>
              <?= $this->cell('EventsList', [$event->id]);?>
            </section>
          </section>
        </div>
    </div>
  </section>
</section>

<script>

</script>
