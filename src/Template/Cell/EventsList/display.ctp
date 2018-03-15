
<div class="table-responsive">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th style="width: 120px;">Data</th>
        <th class="text-center" style="width: 80px;">Início</th>
        <th class="text-center" style="width: 80px;">Fim</th>
        <th style="min-width:200px;">Calendários associados</th>
        <th style="width: 200px;">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($schedules as $schedule): ?>
        <?php
          $begin = new DateTime($schedule->begin);
          $end = new DateTime($schedule->end);
        ?>
        <tr>
          <td class="align-middle text-nowrap"><?= $begin->format('d') . '/' . $begin->format('m') . '/' . $begin->format('Y') ?></td>
          <td class="align-middle text-center text-nowrap"><?= $begin->format('H:i') ?></td>
          <td class="align-middle text-center text-nowrap"><?= $end->format('H:i') ?></td>
          <td class="align-middle">
            <?php foreach($schedule->calendars as $calendar): ?>
              <a href="<?= $this->Url->build([ "controller" => "Calendars", "action" => "view", $calendar->id]) ?>" class="bullet-item b-<?= $types[$calendar->type_id] ?>" title="<?= $calendar->name ?>"><?= $calendar->name ?></a>
            <?php endforeach; ?>
          </td>
          <td class="align-middle text-nowrap">
            <a href="<?= $this->Url->build([ "controller" => "Events", "action" => "editschedule", $schedule->event_id, $schedule->id]) ?>" class="btn btn-sm btn-primary">Editar</a>
            <?= $this->Form->postLink(
                ('Excluir'),
                ['controller' => 'Events', 'action' => 'removeschedule', $schedule->id, $schedule->event_id],
                ['confirm' => ('Realmente quer apagar o agendamento?'), 'class'=>'btn btn-sm btn-danger' , $schedule->id]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </tbody>
  </table>
</div>
