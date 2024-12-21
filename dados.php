<?php


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    //dados para conexão
    $hostName = 'localhost';
    $userName = 'root';
    $password = '';
    $dataBase = 'register';
    //criando de fato a conexão
    $connection = mysqli_connect($hostName, $userName, $password, $dataBase);

    if($_SERVER['REQUEST_METHOD']== 'POST') {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $pwd = trim($pwd);
        
            
            $query = "INSERT INTO user (name, email, password) VALUES(?, ?, ?)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $pwd);
            mysqli_stmt_execute($stmt);
            echo "Data inserted succesfully";
        }
    }
} catch(mysqli_sql_exception $e) {
    echo "ERROR MYSQL: " . $e->getMessage();
} catch(exception $e){
    echo "GENERAL ERROR" . $e->getMessage();
} finally {
    if(isset($connection)) {
        mysqli_close($connection);
        echo "<br>Close Connection";
    }
}
