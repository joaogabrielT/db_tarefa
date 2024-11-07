<?php
include 'conecta.php';

// Lógica para excluir tarefa
if (isset($_POST['excluir'])) {
    $tar_codigo = $_POST['tar_codigo'];
    $sql = "DELETE FROM tbl_tarefas WHERE tar_codigo = :tar_codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['tar_codigo' => $tar_codigo]);
}

// Lógica para atualizar status da tarefa
if (isset($_POST['alterar_status'])) {
    $tar_codigo = $_POST['tar_codigo'];
    $novo_status = $_POST['status'];
    $sql = "UPDATE tbl_tarefas SET tar_status = :status WHERE tar_codigo = :tar_codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['status' => $novo_status, 'tar_codigo' => $tar_codigo]);
}

// Buscar todas as tarefas
$sql = "SELECT * FROM tbl_tarefas";
$stmt = $pdo->query($sql);
$tarefas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Gerenciar Tarefas</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastro_usuario.php">Cadastro de Usuário</a></li>
                <li><a href="cadastro_tarefa.php">Cadastro de Tarefa</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Setor</th>
                    <th>Prioridade</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $tarefa): ?>
                    <tr>
                        <td><?php echo $tarefa['tar_codigo']; ?></td>
                        <td><?php echo $tarefa['tar_setor']; ?></td>
                        <td><?php echo $tarefa['tar_prioridade']; ?></td>
                        <td><?php echo $tarefa['tar_descricao']; ?></td>
                        <td><?php echo $tarefa['tar_status']; ?></td>
                        <td>
                            <!-- Botão para alterar o status -->
                            <form action="gerenciar_tarefas.php" method="POST" style="display:inline;">
                                <input type="hidden" name="tar_codigo" value="<?php echo $tarefa['tar_codigo']; ?>">
                                <select name="status" required>
                                    <option value="A Fazer" <?php echo ($tarefa['tar_status'] == 'A Fazer') ? 'selected' : ''; ?>>A Fazer</option>
                                    <option value="Em Andamento" <?php echo ($tarefa['tar_status'] == 'Em Andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                                    <option value="Finalizada" <?php echo ($tarefa['tar_status'] == 'Finalizada') ? 'selected' : ''; ?>>Finalizada</option>
                                </select>
                                <button type="submit" name="alterar_status">Alterar Status</button>
                            </form>

                            <!-- Botão para excluir a tarefa -->
                            <form action="gerenciar_tarefas.php" method="POST" style="display:inline;">
                                <input type="hidden" name="tar_codigo" value="<?php echo $tarefa['tar_codigo']; ?>">
                                <button type="submit" name="excluir" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
