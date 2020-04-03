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

	$course = $_GET['course'];
	
	$max_disciplines = $_GET['max_disciplines'];
 
 	$days = explode(",", $_GET['days']); 

 	//GET Schedule
	$day_start = extract_numbers($_GET['day_start']);
	$day_end = extract_numbers($_GET['day_end']);

	$start_hour = $day_start[0];
	$start_minute = $day_start[1];
	$end_hour = $day_end[0];
	$end_minute = $day_end[1];


//
// RESULTADO 
//


	// GET DISCIPLINE_CLASS_ID FROM ALL DISCIPLINES WITHIN SCHEDULE
	$data = db_search($conn, "SELECT discipline_class_id FROM schedules WHERE (start_hour >= '$start_hour' AND start_minute >= '$start_minute') AND (end_hour <= '$end_hour' AND end_minute <= '$end_minute' ) " );

	
	$discipline_class_id = $data[0]['discipline_class_id'];



	// USE DISCIPLINE_CLASS_ID TO GET DISCIPLINE IDs and DISCIPLINE_CLASSES
	$data = db_search($conn, "SELECT discipline_id FROM discipline_classes WHERE id = '$discipline_class_id' " );
	$discipline_id = $data[0]['discipline_id'];
	$discipline_class = $data[0]['class_number'];



	//USE DISCIPLINE_IDs TO GET DISCIPLINE INFO
	$data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$discipline_id' " );


	//PRINT DISCIPLINE_INFO AND CLASSES
		foreach ($data as $datarow => $dataarray) {

    			show_result("disciplines", $dataarray);
    		//	echo $discipline_class;
		}



	if(isset($_GET['course']) ){ // Verifica se a foi pedida tabela

		$data = db_search($conn, "SELECT * FROM courses WHERE name = '$course'");
		
		$curriculum = $data[0][curriculum];

	}

	if(isset($_GET['']))


?>