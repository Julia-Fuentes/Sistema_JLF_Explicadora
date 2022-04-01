<?php

    if(isset($_POST['submit']))
    {

        if(isset($_POST["nome"]) && isset($_POST["senha"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["data_nascimento"]) && isset($_POST["cidade"])&& isset($_POST["estado"])&& isset($_POST["endereco"]))
        {
            if(empty($_POST["nome"]))
                $erro = "Campo nome obrigatório";
            else
            if(empty($_POST["senha"]))
                $erro = "Campo senha obrigatório";
            else
            if(empty($_POST["email"]))
            $erro = "Campo e-mail obrigatório";
            else
            if(empty($_POST["telefone"]))
            $erro = "Campo telefone obrigatório";
            else
            if(empty($_POST["data_nascimento"]))
            $erro = "Campo data obrigatório";
            else
            if(empty($_POST["cidade"]))
            $erro = "Campo cidade obrigatório";
            else
            if(empty($_POST["estado"]))
            $erro = "Campo estado obrigatório";
            else 
            if(empty($_POST["endereco"]))
            $erro = "Campo endereço obrigatório";
            else{

        include_once('config.php');

         // Para a base de dados
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        $descricao = $_POST['bio'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $msg       = "";
        $msg_class = "";
        
            // Upload da imagem
            $target_dir       = "images/";
            $target_file      = $target_dir . basename($profileImageName);
            // VALIDAÇÃO
            // Validação do tamanho da imagem. TAMANHO CALCULADO EM BYTES
            if ($_FILES['profileImage']['size'] > 200000) {
                $msg       = "O tamanho da imagem não deve ser superior a 200Kb";
                $msg_class = "alert-danger";
            }
            // Checando se o arquivo existe
            if (file_exists($target_file)) {
                $msg       = "Arquivo já existe!";
                $msg_class = "alert-danger";
            }
            // Upload da imagem somente quando não apresentar erros
            if (empty($error)) {
                if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                    $result = ("INSERT INTO usuarios(profile_image,bio,nome,senha,email,telefone,sexo,data_nasc,cidade,estado,endereco) 
                    VALUES ('$profileImageName','$descricao','$nome','$senha','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");
            
                    if (mysqli_query($conexao, $result)) {
                        $msg       = "Foi feito o upload da sua imagem com sucesso! Está salvo!";
                        $msg_class = "alert-success";
                    } else {
                        $msg       = "Ocorreu um erro na sua base de dados";
                        $msg_class = "alert-danger";
                    }
                } else {
                    $error = "Ocorreu um erro no upload do arquivo";
                    $msg   = "alert-danger";
                }
            }

        
        header('Location: sistema.php');
    }
}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_form.css">
    <title>JLF - Explicadora </title>

</head>

<body>
    <div class="box">
        <form action="formulario.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b class="logo2">Formulário de Cadastro</b></legend>
                
                <h1 class="logo">JLF Explicadora</h1>

     <a class="link" href="profiles.php">Visualizar todos os perfis</a>
        <br/>
          <h4 class="text-center mb-3 mt-3">Perfil do usuário</h4>

         <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Upload imagem</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span><br>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Imagem de perfil</label>
          </div>
          <div class="form-group">
            <label>Descrição</label><br/>
            <textarea name="bio" class="form-control"></textarea>
          </div>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br/>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label><br/>
                </div>
                <br/>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit"><br/><br/>
                <button id="submit"><a href="sistema.php" style="text-decoration: none; color: white;">Voltar</a></button>
            </fieldset>
        </form>
    </div>
</body>
</html>
<script src="scripts.js"></script>