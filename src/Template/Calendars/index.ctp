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
              <?= $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']); ?>
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

  <section class="sub-block-content">
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
          <?php foreach($calendars as $calendar): ?>
            <tr>
              <th class="text-nowrap" style="width:100px;"><?php echo $calendar->code; ?></th>
              <td>
                <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "view", $calendar->id]) ?>"><?= $calendar->name ?></a>
                <p class="table-description">
                   <b><?= $types[$calendar->type_id] ?></b> - <?= $calendar->description ?>
                </p>
              </td>
              <td class="text-nowrap text-right" style="width:200px;">
                <a href="<?= $this->Url->build(["controller" => "Calendars", "action" => "edit", $calendar->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                <?= $this->Form->postLink('apagar',
                  ['action' => 'remove', $calendar->id],
                  ['class' => 'btn btn-outline-danger btn-sm'],
                  ['confirm' => ('Realmente quer apagar o calendário?'), $calendar->id]
                  )
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </tbody>
      </table>
    </div>
  </section>

</section>
