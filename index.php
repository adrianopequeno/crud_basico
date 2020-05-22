<?php
  require 'config.php';

  $lista = [];

  // pegando os dados do BD
  $sql = $pdo->query("SELECT * FROM usuarios");

  // verificvando se tem itens
  if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  }
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>E-MAIL</th>
    <th>AÇÔES</th>
  </tr>

  <?php foreach($lista as $usuario): ?>
    <tr>
      <td><?=$usuario['id'];?></td>
      <td><?=$usuario['nome'];?></td>
      <td><?=$usuario['email'];?></td>
      <td>
        <a href="editar.php/?id=<?=$usuario['id'];?>">[ Editar ]</a>
        <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>