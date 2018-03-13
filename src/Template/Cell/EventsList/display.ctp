
<div class="table-responsive">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th style="width: 120px;">Data</th>
        <th class="text-center" style="width: 80px;">Início</th>
        <th class="text-center" style="width: 80px;">Fim</th>
        <th>Calendários associados</th>
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
          <td class="align-middle"><?= $begin->format('d') . '/' . $begin->format('m') . '/' . $begin->format('Y') ?></td>
          <td class="align-middle text-center"><?= $begin->format('H:i') ?></td>
          <td class="align-middle text-center"><?= $end->format('H:i') ?></td>
          <td class="align-middle">
            <?php foreach($schedule->calendars as $calendar): ?>
              <a href="<?= $this->Url->build([ "controller" => "Calendars", "action" => "view", $calendar->id]) ?>" class="bullet-item b-<?= $types[$calendar->type_id] ?>" title="<?= $calendar->name ?>"><?= $calendar->name ?></a>
            <?php endforeach; ?>
          </td>
          <td class="align-middle">
            <a href="<?= $this->Url->build([ "controller" => "Events", "action" => "edit", $schedule->id]) ?>" class="btn btn-sm btn-primary">Editar</a>
            <a href="<?= $this->Url->build([ "controller" => "Events", "action" => "remove", $schedule->id]) ?>" class="btn btn-sm btn-danger">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </tbody>
  </table>
</div>
