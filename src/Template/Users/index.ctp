<h2>Lista de usuários</h2>
<?php
echo $this->Html->link(__('Cadastrar'), ['action' => 'add']);
?>
<br />
<br />
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Permissão</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($usuarios as $usuario): ?>
    <tr>
      <th><?php echo $usuario->id; ?></th>
      <th><?php echo $usuario->username; ?></th>
      <th><?php echo $usuario->role_id; ?></th>
      <th>
        Ver Editar Apagar
      </th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
