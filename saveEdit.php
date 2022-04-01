<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
        $descricao = $_POST['bio'];
        $id = $_POST['id'];
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
                $sqlInsert = "UPDATE usuarios 
                SET profile_image='$profileImageName', bio='$descricao',nome='$nome',senha='$senha',email='$email',telefone='$telefone',sexo='$sexo',data_nasc='$data_nasc',cidade='$cidade',estado='$estado',endereco='$endereco'
                WHERE id=$id";
         
         $result = $conexao->query($sqlInsert);
         print_r($result);
     }
     
     header('Location: sistema.php');
 }
}
    header('Location: sistema.php');

?>            
