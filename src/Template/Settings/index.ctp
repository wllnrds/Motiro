<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <h2 class="title">Configurações</h2>
    <hr />
  </header>

  <section class="sub-block-content">
    <header class="header">
      <div class="row">
          <div class="col-12 col-md-6 text-left text-md-left">
            <h3 class="subtitle">Papeis</h3>
          </div>
          <div class="col-12 col-md-6 text-left text-md-right">
            <div class="row">
              <div class="col">
                <?= $this->Html->link(__('Adicionar'), ['controller' => 'Roles','action' => 'add'], ['class' => 'btn btn-primary btn-sm']); ?>
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
              <th scope="col">Papel</th>
              <th scope="col">Descrição</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($roles as $role): ?>
              <tr>                
                <td><?= $role->label ?></td>
                <td><?= $role->description ?></td>
                <td class="text-nowrap text-right" style="width:200px;">
                  <a href="<?= $this->Url->build(["controller" => "Roles", "action" => "edit", $role->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                  <?= $this->Form->postLink('excluir',
                    ['action' => 'remove', $role->id],
                    ['class' => 'btn btn-outline-danger btn-sm'],
                    ['confirm' => ('Realmente quer apagar o calendário?'), $role->id]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </tbody>
        </table>
      </div>




    </section>
  </section>

</section>
