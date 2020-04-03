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


		$course_disciplines_data = db_search($conn, "SELECT * FROM course_disciplines WHERE course_id = '$course_id'"); // COM OS IDS DOS CURSOS, BUSQUE AS DISCIPLINAS DO CURSO


		//var_dump($course_disciplines_data);
		foreach ($course_disciplines_data as $row => $array){ // PARA CADA DISCIPLINA DO CURSO


			$discipline_nature = $array['nature']; // PEGUE A NATUREZA
			$discipline_semester = $array['semester']; // PEGUE O SEMESTRE
			$discipline_data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$array[discipline_id]'"); // COM O ID, BUSQUE AS INFORMAÇÕES DA DISCIPLINA
			$discipline_classes_data = db_search($conn, "SELECT * FROM discipline_classes WHERE discipline_id = '$array[discipline_id]'"); // E BUSQUE NO BANCO SUAS TURMAS



			foreach($discipline_classes_data as $row2 => $array2){ // PARA CADA TURMA
// SERVER ERROR WHEN ARRAY IS USED
				$id = $array2['id']; 
				$schedule_data = db_search($conn, "SELECT * FROM schedules WHERE (discipline_class_id = '$id') AND ( (start_hour >= '$start_hour' AND start_minute >= '$start_minute') AND (end_hour <= '$end_hour' AND end_minute <= '$end_minute' ) )"); // E BUSQUE NO BANCO OS HORARIOS


				if($schedule_data == -1){ // SE NÃO ATENDE OS HORARIOS TENTE COM OUTRA TURMA

					//echo "This discipline has no class matches in the requested schedule";
					continue;
				
				} else { // SE ATENDE OS HORARIOS

					$discipline_class_code = $array2['class_number']; // PEGUE O CODIGO DA TURMA


					foreach($schedule_data as $row3 => $array3){ // PARA CADA HORARIO

						$discipline_class_id = $array3['discipline_class_id']; // PEGUE O ID DA TURMA
						$discipline_day = $array3['day']; // O DIA
						$discipline_class_count = $array3['class_count']; // NUMERO DE TURMAS
						
						
						echo "Class Info <br></br>";
						echo "Class Code: " . $discipline_class_code . "<br></br>";
						echo "Start: " . $start_hour . ":" . $start_minute . "<br></br>";
						echo "End: " . $end_hour . ":" . $end_minute . "<br></br>";
						echo "Day: " . $discipline_day . "<br></br>";
						echo "Number of Classes: " . $discipline_class_count . "<br></br>";
						
						echo "<br></br>";

						echo "Discipline Info <br></br>";
						echo "Nature: " . $discipline_nature . "<br></br>";
						echo "Semester: " . $discipline_semester . "<br></br>";
						show_result("disciplines", $discipline_data); // MOSTRE OS DADOS

					}


				}


			}


		}


	}


?>