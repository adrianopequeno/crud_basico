<?php
  require 'config.php';

  $info = [];
  $id = filter_input(INPUT_GET, 'id');

  if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
      header("Location: index.php");
      exit;
    }
  } else {
    header("Location: index.php");
    exit;
  }
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
  <!-- Campo Oculto passando o id via POST -->
  <input type="hidden" name="id" value="<?=$info['id'];?>" />

  <label>
    Nome: <br/>
    <input type="text" name="name" value="<?=$info['nome'];?>" />
  </label>

  <br/><br/>

  <label>
    E-Mail: <br/>
    <input type="text" name="email" value="<?=$info['email'];?>" />
  </label>

  <br/><br/>

  <input type="submit" value="Salvar"  onclick="return confirm('Tem certeza que deseja Editar?')" />
</form>