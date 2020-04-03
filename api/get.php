<?php


include_once 'resources/funcoes.php';



//
// BANCO DE DADOS
//

	$conn = pg_connect("host=localhost dbname=meuhorario_dev user=meuhorario password=123456")  or die("Can't connect to database".pg_last_error()); // Conecta banco de dados
	pg_set_client_encoding ([$conn], "utf8" ); 	// muda charset




//
// RECEBE Variaveis GET
// 

	$table = $_GET['table'];


//
// RESULTADO 
//

	if(isset($_GET['table']) ){ // Verifica se a foi pedida tabela
	

		$result = pg_query($conn, "SELECT * FROM $table"); // Recebe a solicitação do banco

		if(!$result){	// Se não houve resultado

			echo "query did not execute";

		} else	if(pg_num_rows($result) == 0){ // Se não há registros

			echo "0 records";
		
		} else {

			$row = pg_fetch_array($result)) { // transforma resultado em array a cada linha


				// MOSTRA RESULTADO 

				show_result($table, $row); // formata e imprime resultados


			}
		} 

	}




?>