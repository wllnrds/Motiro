<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <div class="row">
        <div class="col-12 col-md-6 text-left text-md-left">
          <h2 class="title">Lista de Calendários</h2>
        </div>
        <div class="col-12 col-md-6 text-left text-md-right">
          <div class="row">
            <div class="col">
              <?php if(isset($level) && $level <= 2): ?>
              <?= $this->Html->link(__('Novo Calendário'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']); ?>
              <?php endif; ?>
            </div>
            <div class="col">
              <form class="form-inline d-inline">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sm" placeholder="Buscar Calendário" value="<?= $search ?>" aria-label="Buscar Calendário" name="search">
                  <div class="input-group-append">
                    <button class="btn btn-dark btn-sm" type="submit">Buscar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <hr />
  </header>
  <ul class="nav nav-pills mb-3">
    <?php foreach($types as $type): ?>
    <li class="nav-item">
      <a class="nav-link" href="#calendar-<?= $type->slug ?>" data-toggle="tab"><?= $type->description ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
  <div class="tab-content">
    <?php foreach($types as $type): ?>
    <div class="tab-pane" id="calendar-<?= $type->slug ?>">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">COD</th>
              <th scope="col">Nome</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($calendars as $calendar):
              if($calendar->type_id == $type->id): ?>
              <tr>
                <th class="text-nowrap" style="width:100px;"><?php echo $calendar->code; ?></th>
                <td>
                  <b class="bullet-item b-<?= $_types[$calendar->type_id] ?>"><?= $type->description ?></b> <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "view", $calendar->id]) ?>"><?= $calendar->name ?></a>
                  <p class="table-description"><?= $calendar->description ?></p>
                </td>
                <td class="text-nowrap text-right" style="width:200px;">
                  <?php if(isset($level) && $level <= 3): ?>
                  <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "edit", $calendar->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                  <?php endif; ?>
                  <?php if(isset($level) && $level <= 2): ?>
                  <?= $this->Form->postLink('apagar',
                    ['action' => 'remove', $calendar->id],
                    ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => ('Deseja apagar o calendário?'), $calendar->id] )
                  ?>
                  <?php endif; ?>
                </td>
              </tr>
            <?php
              endif;
              endforeach;
            ?>
            </tbody>
          </tbody>
        </table>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function(){
    $('.nav-pills a:first').tab('show');
  })
</script>
