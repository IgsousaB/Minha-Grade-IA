<?php

//
// BANCO DE DADOS
//

	$conn = pg_connect("host=localhost dbname=meuhorario_dev user=meuhorario password=123456") or die ("Can't connect to database". pg_last_error()); // Conecta banco de dados
	pg_set_client_encoding ([$conn], "utf8" ); 	// muda charset
?>
