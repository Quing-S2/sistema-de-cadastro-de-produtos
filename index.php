<?php
require 'db.php';

$sql = "SELECT id, nome, descricao, preco, categoria FROM produtos ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            padding: 15px;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 30px auto;
        }

        h2 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .btn-new {
            text-decoration: none;
            padding: 10px 18px;
            background-color: #27ae60;
            color: white;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: 0.2s ease-in-out;
        }
        .btn-new:hover {
            background-color: #1e8449;
            transform: scale(1.03);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        th {
            background-color: #34495e;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f6f8fa;
        }

        .action-link {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            transition: 0.2s;
        }

        .action-edit {
            color: #f39c12;
            background: rgba(243,156,18,0.15);
        }
        .action-edit:hover {
            background: rgba(243,156,18,0.25);
        }

        .action-delete {
            color: #e74c3c;
            background: rgba(231,76,60,0.15);
        }
        .action-delete:hover {
            background: rgba(231,76,60,0.25);
        }
    </style>

</head>
<body>
    <header>Sistema de Produtos</header>
    <div class="container">
        <h1>Lista de Produtos</h1>

        <p>
            <a href="criar.php" class="btn-new">+ Cadastrar novo produto</a>
        </p>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>

            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['nome']); ?></td>
                        <td><?= htmlspecialchars($row['descricao']); ?></td>
                        <td>R$ <?= number_format($row['preco'], 2, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($row['categoria']); ?></td>
                        <td>
                            <a href="editar.php?id=<?= $row['id']; ?>" class="action-link action-edit">Editar</a>
                            <a href="excluir.php?id=<?= $row['id']; ?>" 
                            class="action-link action-delete" 
                            onclick="return confirmarExclusao();">
                            Excluir
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum produto cadastrado.</td>
                </tr>
            <?php endif; ?>
        </table>

        <script>
            function confirmarExclusao() {
                return confirm('Tem certeza que deseja excluir este produto?');
            }
        </script>
    </div>
</body>
</html>
