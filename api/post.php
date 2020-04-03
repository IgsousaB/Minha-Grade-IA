<?php


include_once 'resources/funcoes.php';


//
// BANCO DE DADOS
//

	$conn = pg_connect("host=localhost dbname=meuhorario_dev user=meuhorario password=123456"); // Conecta banco de dados
	pg_set_client_encoding ([$conn], "utf8" ); 	// muda charset
	

// Testar conexão com o Banco if die

//
// RECEBE VARIÁVEIS POST
//

	$name = $_POST['name'];
	$table = $_POST['table'];
	$description = $_post['description'];


//
// FAZ A REQUISIÇÃO
//



	if( 	// Se não está vazio
		!empty($table)
	){

		$result = pg_query($conn, "INSERT INTO $table (name, description) VALUES ('$name', '$description')");
		echo $result;

		if (!$result){

			echo "query failed!";

		}


	}