<?php
  $this->layout('default');
  $this->Form->setTemplates([
    'inputContainer' => '{{content}} <small class="text-muted">{{help}}</small>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>'
  ]);
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
                      <?= $this->Form->control('date', [
                          'required' => true,
                          'type' => 'text',
                          'class' => 'mask-date form-control',
                          'min' => '2018-01-01',
                          'max' => '2050-12-31',
                          'label' => [ 'text' => 'Data']]) ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col-6">
                      <?= $this->Form->control('begin', [
                          'required' => true,
                          'type' => 'text',
                          'class' => 'mask-time form-control',
                          'min' => '07:00',
                          'max' => '23:00',
                          'step' => '900',
                          'label' => [ 'text' => 'Hora de Início']]) ?>
                    </div>
                    <div class="form-group col-6">
                      <?= $this->Form->control('end', [
                          'required' => true,
                          'type' => 'text',
                          'class' => 'mask-time form-control',
                          'min' => '07:00',
                          'max' => '23:00',
                          'step' => '900',
                          'label' => [ 'text' => 'Hora de Fim']]) ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="form-group col">
                      <?= $this->Form->control('calendars._ids', ['options' => '', 'disabled' => 'disabled', 'required' => true, 'multiple' => true , 'type' => 'select', 'class' => '', 'label' => [ 'text' => 'Calendários']]) ?>
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
  var calendar, $calendar;
  var $_date, $_begin, $_end;

  $calendar = $('#calendars-ids').selectize({
    valueField: 'value',
    labelField: 'label',
    searchField: 'label',
    options: [],
    create: false,
    render: {
      option: function(item, escape) {
        return '<div class="color-' + item.class + '">' +
          '<span class="title">' +
            '<span class="name">' + escape(item.label) + '</span>' +
          '</span>' +
        '</div>';
      },
      item: function(data, escape) {
        let pass = true;

        if(data.class.includes("busy")){
          if(confirm("Esse calendário já está ocupado no periodo informado. Deseja continuar?")){
            pass = true;
          }else{
            pass = false;
          }
        }

        if(pass){
          return '<div class="item color-' + data.class + '">' + escape(data.label) + '</div>';
        }else{
          return false;
        }
      }
    },
    load: function(query, callback){
      let selectize = this;

      let $url = '<?= $this->Url->build(["controller" => "Calendars", "action" => "getCalendars"]) ?>?'+
        'scheduleid=<?php if(isset($scheduledata->id)) { echo $scheduledata->id ; } ?>';
      $url += '&term=' + encodeURIComponent(query);

      if($_date && $_begin && $_end){
        $url += '&date=' + encodeURIComponent($_date) + '&begin=' + encodeURIComponent($_begin) + '&end=' + encodeURIComponent($_end);
      }

      $.ajax({
        url: $url,
        type: 'GET',
        error: function() {
          callback();
        },
        success: function(res) {
          callback(res.data);

          if(recovering.length > 0){
            selectize.setValue(recovering);
            recovering = [];
            calendar.enable();
          }
        }
      });
    }//,preload: true
  });

  calendar = $calendar[0].selectize;

  var _date = false;
  var _begin = false;
  var _end = false;

  $('#date, #begin, #end').change(verify);
  $('#date, #begin, #end').on(verify);

  function verify(){
    let d = $('#date')[0];
    let b = $('#begin')[0];
    let e = $('#end')[0];

    if(d.value){
      _date = this.checkValidity();
    }

    if(b.value && e.value){
      if(b.value < e.value){
        _begin = b.checkValidity();
        _end = e.checkValidity();
      }else{
        _begin = false;
        _end = false;
      }
    }

    if(_date && _begin && _end){
      $_date = $('#date')[0].value;
      $_begin = $('#begin')[0].value;
      $_end = $('#end')[0].value;
      calendar.enable();
      selectize.clearOptions();
    }else{
      $_date = null;
      $_begin = null;
      $_end = null;
      selectize.clearOptions();
      calendar.disable();
    }
  }
</script>
