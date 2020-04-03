<?php


	include_once 'resources/funcoes.php';



//
// BANCO DE DADOS
//

	$conn = pg_connect("host=localhost dbname=meuhorario_dev user=meuhorario password=123456") or die ("Can't connect to database". pg_last_error()); // Conecta banco de dados
	pg_set_client_encoding ([$conn], "utf8" ); 	// muda charset




//
// RECEBE Variaveis GET
// 

    $courses = explode(" ", $_POST['courses']); // Remove space chars
	$max_disciplines = $_POST['max_disciplines'];
	$days = explode(" ", $_POST['days']);
	$day_start = extract_numbers($_POST['day_start']);
	$day_end = extract_numbers($_POST['day_end']);
	$lunch = $_POST['lunch'];
	$dinner = $_POST['dinner'];

//
// RESULTADO 
//


	if( 	// VERIFICA SE TODOS OS DADOS FORAM
		!empty($courses) &&
		!empty($day_start) &&
		!empty($day_end) &&
		!empty($days[0]) 
	 ){ 
	

	 	foreach($courses as $key => $course_name){

			$course_data = db_search($conn, "SELECT * FROM courses WHERE name LIKE '$course_name%'"); // BUSQUE NO BANCO
			$course_id = $course_data[0][id]; // O ID DOS CURSOS PEDIDOS
			$course_disciplines_data = db_search($conn, "SELECT * FROM course_disciplines WHERE course_id = '$course_id'"); // COM OS IDS DOS CURSOS, BUSQUE AS DISCIPLINAS DO CURSO


			for ($i = 0; $i < count($course_disciplines_data); $i++){ // PARA CADA DISCIPLINA DO CURSO


				$array = $course_disciplines_data[$i];
				$discipline_nature = $array['nature']; // PEGUE A NATUREZA
				$discipline_semester = $array['semester']; // PEGUE O SEMESTRE

				$discipline_data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$array[discipline_id]'"); // COM O ID, BUSQUE AS INFORMAÇÕES DA DISCIPLINA
				$discipline_classes_data = db_search($conn, "SELECT * FROM discipline_classes WHERE discipline_id = '$array[discipline_id]' "); // E BUSQUE NO BANCO SUAS TURMAS
	
		
				for($j = 0; $j < count($discipline_classes_data); $j++){ // PARA CADA TURMA
				

					$id = $discipline_classes_data[$j]['id']; // SERVER ERROR WHEN ARRAY IS USED
					$discipline_class_offer_data = db_search($conn, "SELECT * FROM discipline_class_offers WHERE discipline_class_id = '$id'"); // BUSQUE NO BANCO
					$discipline_class_vacancies = $$discipline_class_ofer_data[$j]['vacancies']; // AS VAGAS


					$schedule_data = db_search($conn, "SELECT * FROM schedules WHERE discipline_class_id = '$id' "); // E BUSQUE NO BANCO OS HORARIOS


					if(conflict($schedule_data, $days, $day_start, $day_end, $lunch, $dinner) ){  // SE NÃO ATENDE OS HORARIOS

						continue; // VOLTE E TENTE COM OUTRA TURMA

					} else {


						$discipline_class_code = $discipline_classes_data[$j]['class_number']; // PEGUE O CODIGO DA TURMA


						for($k = 0; $k < count($schedule_data); $k++){ // PARA CADA HORARIO

							$discipline_class_id = $schedule_data[$k]['discipline_class_id']; // PEGUE O ID DA TURMA
							$discipline_day = decide_day($schedule_data[$k]['day']); // O DIA
							$discipline_class_count = $schedule_data[$k]['class_count']; // NUMERO DE TURMAS
							

							$discipline_start_hour = $schedule_data[$k]['start_hour']; // PEGUE OS HORÁRIOS
							$discipline_start_minute = $schedule_data[$k]['start_minute'];
							$discipline_end_hour = $schedule_data[$k]['end_hour'];
							$discipline_end_minute = $schedule_data[$k]['end_minute'];


//
// MOSTRE A DISCIPLINA
//

							echo "<p style='color: #FF08E3;'>";
							echo "Esta disciplina tem natureza: " . $discipline_nature . " para o curso ". "$course_name <br>";
							if( !empty($discipline_semester) ){ echo " | Semester: " . $discipline_semester; }
							show_result("disciplines", $discipline_data[0]); // MOSTRE OS DADOS							
//echo "Class Code - Start - End - Day - Classes Count - Class Vacancies <br>";
							echo $discipline_class_code  . "   -   " . $discipline_start_hour . ":" . $discipline_start_minute . " - " . $discipline_end_hour . ":" . $discipline_end_minute .  "   -   " . $discipline_day . "<br>";
							echo "<br><br>";
							echo "<br><br>";

						}


					}


				}


			}


		}

	} else {

			echo "Not enough information. Please fill in";
			if( empty($courses[0]) ) { echo " Courses,"; } else { echo $courses[0] . "<br>";}

			if( empty($day_start) ) { echo " Start Hour,"; } else { echo $day_start . "<br>";}

			if( empty($day_end) ) { echo " End Hour,"; } else { echo $day_end . "<br>";}

			if( empty($days[0]) ) { echo " Schedule Day"; } else { $days[0] . "<br>";}

			echo ".";
			http_response_code(400);
		
	}





?>