<?php 
//headers??

//Define param banco
$con = mysqli_connect('localhost','igor','0321grade','api_db');
//muda charset
$con->set_charset("utf8");


$post = json_decode(file_get_contents('php://input'));


if($con->connect_error) die("ERRO CONEXÂO BANCO: ".$con->connect_error); //Caso não aconteça conexão com o banco

else{
    $result = mysqli_query($con, "SELECT * FROM `products`"); //Puxa dados da tabela selecionada
    
    echo "<h1> Minha Linda Tabela </h1>";
    while($rowData = mysqli_fetch_array($result)){ //Força um loop com os dados selecionados no SQL acima
        echo "<p style='color: #FF08E3;'>";
        echo $rowData[1];
        echo "</p>";
        echo "<p style='color: #FF08E3;'>";
        echo $rowData[2];
        echo "</p>";
    }
    echo "<p>*******Meu Lindo Fim********</p>";
}

?>