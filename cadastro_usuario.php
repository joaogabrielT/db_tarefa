<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO tbl_usuarios (usu_nome, usu_email) VALUES (:nome, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email]);

    echo "<p>Usuário cadastrado com sucesso!</p>";
    echo "<p><a href='index.php'>Voltar para a home</a></p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Cadastro de Usuário</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastro_tarefa.php">Cadastro de Tarefa</a></li>
                <li><a href="gerenciar_tarefas.php">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
