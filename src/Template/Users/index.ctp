<?php $this->layout('Page') ?>

<section class="block-content">
  <header class="header">
    <div class="row">
        <div class="col-12 col-md-6 text-left text-md-left">
          <h3 class="subtitle">Usuários</h3>
        </div>
        <div class="col-12 col-md-6 text-left text-md-right">
          <div class="row">
            <div class="col">
              <?= $this->Html->link(__('Adicionar'), ['controller' => 'Users','action' => 'add'], ['class' => 'btn btn-primary btn-sm']); ?>
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
            <th scope="col">Usuário</th>
            <th scope="col">Papel</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?= $user->username ?></td>
              <td><?= $roles[$user->role_id] ?></td>
              <td class="text-nowrap text-right" style="width:200px;">
                <a href="<?= $this->Url->build(["controller" => "Users", "action" => "edit", $user->id]) ?>" class="btn btn-primary btn-sm">editar</a>
                <?= $this->Form->postLink('excluir',
                  ['action' => 'remove', $user->id],
                  ['class' => 'btn btn-outline-danger btn-sm'],
                  ['confirm' => ('Realmente quer apagar o calendário?'), $user->id]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </tbody>
      </table>
    </div>
  </section>
</section>
