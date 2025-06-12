<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login realizado com sucesso!</h2>
        <p><strong>CPF:</strong> <?php echo htmlspecialchars($_GET['cpf']); ?></p>
    </div>
</body>
</html>
