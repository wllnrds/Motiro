<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2 class="title">Configurações</h2>
    <hr />
  </header>

  <ul class="nav nav-pills nav-fill mb-3">
    <li class="nav-item">
      <a class="nav-link active" href="#tipos" data-toggle="tab">Tipos de Calendário</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#papeis" data-toggle="tab">Papeis</a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="tipos">
      <section class="sub-block-content">
        <header class="header">
          <div class="row">
              <div class="col-12 col-md-6 text-left text-md-left">
                <h3 class="subtitle">Tipos de Calendários</h3>
              </div>
              <div class="col-12 col-md-6 text-left text-md-right">
                <div class="row">
                  <div class="col">
                    <?= $this->Html->link(__('Novo Tipo de Calendário'), ['controller' => 'Types','action' => 'add'], ['class' => 'btn btn-success btn-sm']); ?>
                  </div>
                </div>
              </div>
          </div>
          <hr />
        </header>
        <section>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Descrição</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($types as $type): ?>
                  <tr>
                    <td><?= $type->description ?></td>
                    <td class="text-nowrap text-right" style="width:200px;">
                      <a href="<?= $this->Url->build(["controller" => "Types", "action" => "edit", $type->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                      <?= $this->Form->postLink('excluir',
                        ['controller' => 'Types', 'action' => 'remove', $type->id],
                        ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => ('Deseja apagar o tipo de calendário?'), $type->id]) ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </tbody>
            </table>
          </div>




        </section>
      </section>
    </div>
    <div class="tab-pane" id="papeis">
      <section class="sub-block-content">
        <header class="header">
          <div class="row">
            <div class="col-12 col-md-6 text-left text-md-left">
              <h3 class="subtitle">Papeis</h3>
            </div>
            <div class="col-12 col-md-6 text-left text-md-right">
              <div class="row">
                <div class="col">
                  <?= $this->Html->link(__('Novo Papel'), ['controller' => 'Roles','action' => 'add'], ['class' => 'btn btn-success btn-sm']); ?>
                </div>
              </div>
            </div>
          </div>
          <hr />
        </header>
        <section>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nível</th>
                  <th scope="col">Papel</th>
                  <th scope="col">Descrição</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($roles as $role): ?>
                  <tr>
                    <td><?= $role->level ?></td>
                    <td><?= $role->label ?></td>
                    <td><?= $role->description ?></td>
                    <td class="text-nowrap text-right" style="width:200px;">
                      <a href="<?= $this->Url->build(["controller" => "Roles", "action" => "edit", $role->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                      <?= $this->Form->postLink('excluir',
                      ['controller' => 'Roles', 'action' => 'remove', $role->id],
                      ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => ('Deseja apagar o papel?'), $role->id]) ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </tbody>
          </table>
        </div>
      </section>
    </section>
    </div>
  </div>
</section>
