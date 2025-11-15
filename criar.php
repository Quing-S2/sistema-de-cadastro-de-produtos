<?php
require 'db.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome      = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = floatval($_POST['preco'] ?? 0);
    $categoria = trim($_POST['categoria'] ?? '');

    if ($nome === '' || $preco <= 0) {
        $erro = 'Nome e preço são obrigatórios e o preço deve ser maior que zero.';
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO produtos (nome, descricao, preco, categoria) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssds", $nome, $descricao, $preco, $categoria);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            $erro = 'Erro ao salvar produto: ' . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produto</title>
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
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        h3 {
            margin-top: 0;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .btn {
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-save {
            background-color: #27ae60;
            color: white;
        }
        .btn-save:hover {
            background-color: #1e8449;
        }
        .btn-back {
            background-color: #95a5a6;
            color: white;
        }
        .alert {
            background-color: #e74c3c;
            color: white;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>Sistema de Produtos</header>

    <div class="container">
        <h1>Novo Produto</h1>

        <?php if ($erro): ?>
            <p style="color:red;"><?= htmlspecialchars($erro); ?></p>
        <?php endif; ?>

        <form method="post">
            <p>
                <label>Nome:<br>
                    <input type="text" name="nome" required>
                </label>
            </p>
            <p>
                <label>Descrição:<br>
                    <textarea name="descricao"></textarea>
                </label>
            </p>
            <p>
                <label>Preço (ex: 49.90):<br>
                    <input type="number" step="0.01" name="preco" required>
                </label>
            </p>
            <p>
                <label>Categoria:<br>
                    <input type="text" name="categoria">
                </label>
            </p>
            <p>
                <a href="index.php" class="btn btn-back">Voltar</a>
                <button class="btn btn-save">Salvar</button>
            </p>
        </form>
    </div>
</body>
</html>
