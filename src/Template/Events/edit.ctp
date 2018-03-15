<?php
  $this->layout('default');
  $this->Form->setTemplates([ 'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>' ]);
?>

<section class="block-content">
  <section>
    <div class="row">
        <div class="w-100"></div>
        <div class="col-12 col-md-6 col-lg-4">
          <ul class="nav nav-pills nav-fill mb-3">
            <li class="nav-item">
              <a class="nav-link active" href="#agendamento" data-toggle="tab">Agendamentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#evento" data-toggle="tab">Editar Evento</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="agendamento">
              <section class="sub-block-content">
                <header class="header">
                  <h2 class="title"><?php if(isset($scheduledata->id)) { echo 'Editando '; } else { echo 'Criando '; } ?> Agendamento em <b><?= $event->label ?></b></h2>
                  <hr>
                </header>
                <section>
                  <?= $this->Form->create($scheduledata); ?>
                  <?= $this->Form->hidden('event_id', ['value' => $event->id]); ?>
                  <div class="form-row">
                    <div class="form-group col-12 col-sm-6">
                      <?= $this->Form->control('date', [ 'required' => true, 'type' => 'text', 'class' => 'mask-date form-control', 'label' => [ 'text' => 'Data']]) ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col-6">
                      <?= $this->Form->control('begin', [ 'required' => true, 'type' => 'text', 'class' => 'mask-time form-control', 'label' => [ 'text' => 'Hora de Início']]) ?>
                    </div>
                    <div class="form-group col-6">
                      <?= $this->Form->control('end', [ 'required' => true, 'type' => 'text', 'class' => 'mask-time form-control', 'label' => [ 'text' => 'Hora de Fim']]) ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col">
                      <?= $this->Form->control('calendars._ids', ['options' => '', 'required' => true, 'multiple' => true , 'type' => 'select', 'class' => '', 'label' => [ 'text' => 'Calendários']]) ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col">
                      <?= $this->Form->button('Salvar Agendamento', ['class' => 'btn btn-primary']) ?>
                    </div>
                  </div>
                  <?= $this->Form->end() ?>
                </section>
              </section>
            </div>
            <div class="tab-pane" id="evento">
              <section class="sub-block-content">
                <header class="header">
                  <h2>Editar Evento</h2>
                  <hr>
                </header>
                <section>
                  <?= $this->Form->create($event) ?>
                  <?= $this->Form->hidden('editingevent', ['value' => '1']); ?>
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
                    <div class="form-group col  text-right  text-sm-left">
                      <?= $this->Form->button('Salvar Evento', ['class' => 'btn btn-primary']) ?>
                    </div>
                  </div>
                  <?= $this->Form->end() ?>
                </section>
              </section>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-8">
          <section class="sub-block-content">
            <header class="header">
              <h2 class="title">Agendamentos (<?= $event->counter ?>)</h2>
              <hr>
            </header>
            <section>
              <?= $this->cell('EventsList', [$event->id]);?>
            </section>
          </section>
        </div>
    </div>
  </section>
</section>

<script>
  var recovering = [ <?php if(isset($this->request->data['calendars'])){ echo join(', ', $this->request->data['calendars']['_ids']); } else { if(isset($scheduledata['calendars'])){ echo join(', ', $scheduledata['calendars']['_ids']); } } ?> ];
  var calendars = $('#calendars-ids').selectize({
    valueField: 'value',
    labelField: 'label',
    searchField: 'label',
    options: [],
    create: false,
    render: {
      option: function(item, escape) {
        return '<div class="color-' + item.type + '">' +
          '<span class="title">' +
            '<span class="name">' + escape(item.label) + '</span>' +
          '</span>' +
        '</div>';
      },
      item: function(data, escape) {
          return '<div class="item color-' + data.type + '">' + escape(data.label) + '</div>';
      }
    },
    load: function(query, callback){
      let selectize = this;
      $.ajax({
        url: '<?= $this->Url->build(["controller" => "Calendars", "action" => "getCalendars"]) ?>?scheduleid=<?php if(isset($scheduledata->id)) { echo $scheduledata->id ; } ?>&term=' + encodeURIComponent(query),
        type: 'GET',
        error: function() {
          callback();
        },
        success: function(res) {
          callback(res.data);
          if(recovering){
            selectize.setValue(recovering);
            recovering = false;
          }
        }
      });
    },
    preload: true
  });
</script>
