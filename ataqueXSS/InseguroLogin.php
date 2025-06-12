<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login Seguro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login super seguro confiavel 100%</h2>
        <form action="InseguroLogin.php" method="POST">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit">Entrar</button>
         </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            include "db.php";

            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];

            //descomentar parar gerar o XSS
            //echo "<p>Você digitou o CPF: $cpf</p>";         
            

            $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE cpf = ?");
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if (password_verify($senha, $row["senha"])) {
                    header("Location: logado.php?cpf=" . urlencode($cpf));
                    exit();
                } else {
                    echo "<p style='color:red'>Senha incorreta.</p>";
                }
            } else {
                echo "<p style='color:red'>CPF não encontrado.</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
