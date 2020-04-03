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
    $course_name = $_GET['course']; // Remove space chars

	$max_disciplines = $_GET['max_disciplines'];


	 //GET Schedule
 	
	$day_start = extract_numbers($_GET['day_start']);
	$day_end = extract_numbers($_GET['day_end']);

	$start_hour = $day_start[0];
	$start_minute = $day_start[1];
	$end_hour = $day_end[0];
	$end_minute = $day_end[1];
	

	//To Implement
	$days = explode(",", $_GET['days']);
	$lunch = $_GET['lunch'];
	$dinner = $_GET['dinner'];

//
// RESULTADO 
//


	if(isset($_GET['course']) ){ // VERIFICA SE FOI DADOS CURSOS

		$course_data = db_search($conn, "SELECT * FROM courses WHERE name LIKE '%$course_name%'"); // BUSQUE NO BANCO
		
		$course_id = $course_data[0][id]; // O ID DOS CURSOS PEDIDOS


		$course_disciplines_data = db_search($conn, "SELECT * FROM course_disciplines WHERE course_id = '$course_id'"); // COM OS IDS DOS CURSOS, BUSQUE AS DISCIPLINAS


		//var_dump($course_disciplines_data);
		foreach ($course_disciplines_data as $row => $array){ // PARA CADA DISCIPLINA DO CURSO

			$discipline_nature = $array['nature']; // PEGUE A NATUREZA
			$discipline_semester = $array['semester']; // PEGUE O SEMESTRE















			$discipline_data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$array[discipline_id]'"); // COM O ID, BUSQUE SUAS INFORMAÇÕES

			//show_data($discipline_data); // MOSTRE OS DADOS
		}

/*
		

	} else {

		echo "Not enough data to proceed. Please enter Courses.<br></br>";
		http_response_code(400);
		die;

	}


	//  COM OS HORARIOS LIMITE, BUSQUE NO BANCO TODAS OS HORARIOS DAS DISCIPLINAS
//** FALTA DIAS LIMITE
	$discipline_schedules = db_search($conn, "SELECT * FROM schedules WHERE (start_hour >= '$start_hour' AND start_minute >= '$start_minute') AND (end_hour <= '$end_hour' AND end_minute <= '$end_minute' ) " );


	foreach($discipline_schedules as $row => $array){ // PARA CADA HORARIO

		$discipline_class_id = $array['discipline_class_id']; // PEGUE O ID DA TURMA
		$discipline_day = $array['day']; // O DIA
		$discipline_class_count = $array['class_count']; // NUMERO DE TURMAS


		$discipline_classes = db_search($conn, "SELECT * FROM discipline_classes WHERE id = '$discipline_class_id' " ); // COM O ID DA TURMA, BUSQUE NO BANCO
		$discipline_id = $discipline_classes[0]['discipline_id']; // O ID DA DISCIPLINA
		$discipline_class_code = $discipline_classes[0]['class_number']; // E O CODIGO DA TURMA



		$discipline_info = db_search($conn, "SELECT * FROM disciplines WHERE id = '$discipline_id' " ); //AGORA, COM O ID DA DISCIPLINA, BUSQUE SUAS INFORMAÇÕES


		foreach ($discipline_info as $datarow => $dataarray) { // PARA CADA DISCIPLINA

    			show_result("disciplines",$dataarray, $discipline_class, $discipline_day, $discipline_class_count, $discipline_class_code); // MOSTRE OS DADOS

		}

	}



	//USE DISCIPLINE_IDs TO GET DISCIPLINE INFO
	$data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$discipline_id' " );


	//PRINT DISCIPLINE_INFO AND CLASSES
		foreach ($data as $datarow => $dataarray) {

    			show_result("disciplines", $dataarray);
    		//	echo $discipline_class;
		}


*/
?>