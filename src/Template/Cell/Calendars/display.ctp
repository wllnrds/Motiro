<section class="schedules-group">
  <div class="card-columns flex-rows">
  <?php foreach($schedules as $schedule): ?>
    <div class="card border-0" id="schedule-<?= $schedule->id ?>">
      <div class="schedule-item <?= $schedule->active ?>">
        <div class="time-stamp">
            <?php
              $begin = new DateTime($schedule->begin);
              $end = new DateTime($schedule->end);
              echo '<i><b>' . $begin->format('d') . '</b>';
              echo $begin->format('M') .'</i>';
              echo $begin->format('H:i') .'<br />'. $end->format('H:i');
            ?>
        </div>
        <div class="content">
          <a href="<?= $this->Url->build([ "controller" => "Events", "action" => "view", $schedule->event->id]) ?>"><?= $schedule->event->label ?> <?= $schedule->ordering ?> </a>
          <?php foreach($schedule->calendars as $calendar): ?>
          <a href="<?= $this->Url->build([ "controller" => "Calendars", "action" => "view", $calendar->id]) ?>" class="bullet-item b-<?= $types[$calendar->type_id]->slug ?>" title="<?= $calendar->name ?>">[<?= $calendar->code ?>] <?= $calendar->name ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</section>
