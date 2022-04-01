<?php
$conn    = mysqli_connect("localhost", "root", "", "jlf_explicadora");
$results = mysqli_query($conn, "SELECT * FROM usuarios");
$users   = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Visualizar os uploads de Perfis</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/estilo_form.css">
</head>
<body>
  
  <div class="container">
    <!-- <div class="row">
      <div class="col-1 offset-md-1" style="margin-top: 30px;"> -->
        <br/><br/>
      <a id="btn" href="formulario.php">Novo perfil</a>
      <a id="btn" href="sistema.php">Voltar</a>
        <br>
        <br>
        <table class="table table-bordered">
          <thead>
           <th><b>Imagem de Perfil</b></th>
           <th><b>Descrição</b></th>
           <th><b>Nome</b></th>
           <th><b>E-mail</b></th>
           <th><b>Telefone</b></th>
           <th><b>Sexo</b></th>
           <th><b>Data de Nascimento</b></th>
           <th><b>Cidade</b></th>
           <th><b>Estado</b></th>
           <th><b>Endereço</b></th>
          </thead>
          <tbody>

<?php foreach ($users as $user): ?>
<tr>
    <td> 

<img src="<?php echo 'images/' . $user['profile_image']; ?> " width="90" height="90" alt=""> </td>

<td> 
<?php echo $user['bio']; ?> 
</td>

<td> 
<?php echo $user['nome']; ?> 
</td>

<td> 
<?php echo $user['email']; ?> 
</td>

<td> 
<?php echo $user['telefone']; ?> 
</td>

<td> 
<?php echo $user['sexo']; ?> 
</td>

<td> 
<?php echo $user['data_nasc']; ?> 
</td>

<td> 
<?php echo $user['cidade']; ?> 
</td>

<td> 
<?php echo $user['estado']; ?> 
</td>

<td> 
<?php echo $user['endereco']; ?> 
</td>
    </tr>

<?php endforeach; ?>

         </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>