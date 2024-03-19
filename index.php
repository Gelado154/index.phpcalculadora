<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="num1" placeholder="Digite um número" required><br><br>
        <select name="operador">
            <option value="+" selected>+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        <input type="text" name="num2" placeholder="Digite um número" required><br><br>
        <input type="submit" name="calcular" value="Calcular">
    </form>
 
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultado:</h3>
        <p><?php echo isset($resultado) ? $resultado : ""; ?></p>
    <?php endif; ?>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operador = $_POST["operador"];
    
   
    if (is_numeric($num1) && is_numeric($num2)) {
        
        switch ($operador) {
            case "+":
                $resultado = $num1 + $num2;
                break;
            case "-":
                $resultado = $num1 - $num2;
                break;
            case "*":
                $resultado = $num1 * $num2;
                break;
            case "/":
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $resultado = "Erro: divisão por zero";
                }
                break;
            default:
                $resultado = "Operador inválido";
        }
    } else {
        $resultado = "Por favor, insira números válidos.";
    }
}
?>