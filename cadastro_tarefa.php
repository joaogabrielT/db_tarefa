<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO tbl_tarefas (tar_setor, tar_prioridade, tar_descricao) 
            VALUES (:setor, :prioridade, :descricao)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'setor' => $setor,
        'prioridade' => $prioridade,
        'descricao' => $descricao
    ]);

    echo "<p>Tarefa cadastrada com sucesso!</p>";
    echo "<p><a href='index.php'>Voltar para a home</a></p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefa</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Cadastro de Tarefa</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastro_usuario.php">Cadastro de Usuário</a></li>
                <li><a href="gerenciar_tarefas.php">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="setor">Setor:</label>
            <input type="number" id="setor" name="setor" required><br><br>

            <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade" required>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select><br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
