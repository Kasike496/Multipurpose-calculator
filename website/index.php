<!DOCTYPE html>
<html>
<head>
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form method="post" action="">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" name="num2"><br><br>
        <label for="operation">Operation:</label>
        <select name="operation">
            <option value="+">Addition</option>
            <option value="-">Subtraction</option>
            <option value="*">Multiplication</option>
            <option value="/">Division</option>
            <option value="^">Exponentiation</option>
            <option value="%">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="log">Logarithm</option>
        </select><br><br>
        <label for="base">Base (for logarithm):</label>
        <input type="number" name="base"><br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];
        $base = $_POST["base"];

        function calculate($operation, $num1, $num2) {
            switch ($operation) {
                case '+':
                    return $num1 + $num2;
                case '-':
                    return $num1 - $num2;
                case '*':
                    return $num1 * $num2;
                case '/':
                    return $num1 / $num2;
                case '^':
                    return pow($num1, $num2);
                default:
                    return "Invalid operation";
            }
        }

        function calculate_percentage($num, $percent) {
            return ($num * $percent) / 100;
        }

        function calculate_square_root($num) {
            return sqrt($num);
        }

        function calculate_logarithm($base, $num) {
            return log($num, $base);
        }

        switch ($operation) {
            case '+':
            case '-':
            case '*':
            case '/':
            case '^':
                $result = calculate($operation, $num1, $num2);
                break;
            case '%':
                $result = calculate_percentage($num1, $num2);
                break;
            case 'sqrt':
                $result = calculate_square_root($num1);
                break;
            case 'log':
                $result = calculate_logarithm($base, $num1);
                break;
            default:
                $result = "Invalid operation";
        }

        echo "Result: " . $result;
    }
    ?>
</body>
</html>