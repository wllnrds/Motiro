<section class="block-content">
  <header class="header">
    <h2 class="title"><b>[<?= $calendar->code ?>]</b> <?= $calendar->name ?></h2>
    <p><?= $calendar->description ?></p>
    <hr />
  </header>

  <section id="calendar">

  </section>


  <script type="text/javascript">
    $(document).ready(function(){
      $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        contentHeight: 600,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth'
        },
        events: "<?= $this->Url->build(["controller" => "Calendars", "action" => "load", $calendar->id]) ?>"
      });
    });
  </script>

</section>
