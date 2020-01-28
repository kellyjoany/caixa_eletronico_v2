<?php 
  session_start();
  require 'config.php';
  
  if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false){
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $info = $sql->fetch();
    } else {
      header("Location: login.php");
      exit;
    }
  } else {
    header("Location: login.php");
    exit;
  }
?>

<html>
    <head>
        <title>Caixa Eletrônico</title>
    </head>
    <body>
        <h1>Banco XYZ</h1>
        Titular: <?php echo $info['titular'] ?><br/>
        Agência: <?php echo $info['agencia'] ?><br/>
        Conta: <?php echo $info['conta'] ?><br/>
        Saldo: <?php echo $info['saldo'] ?> <br/>
        <a href="sair.php">Sair</a>
    </body>
</html>