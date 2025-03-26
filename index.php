<html>

<head>
<title>Exemplo PHP</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');



echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "54.234.153.24";
$username = "root";
$password = "Senha123";
$database = "meubanco";

// Criar conexão


$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();


$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $link->prepare($query);
$stmt->bind_param("isssss", $valor_rand1, $valor_rand2, $valor_rand2, $valor_rand2, $valor_rand2, $host_name);

if ($stmt->execute()) {
    echo "Registro criado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close()
?>
</body>
</html>
