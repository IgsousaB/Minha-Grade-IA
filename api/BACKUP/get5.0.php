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

    $courses = explode(" ", $_GET['courses']); // Remove space chars

	$max_disciplines = $_GET['max_disciplines'];


	//GET Schedule

	$days = explode(" ", $_GET['days']);


	$day_start = extract_numbers($_GET['day_start']);
	$day_end = extract_numbers($_GET['day_end']);
	
	$lunch = explode("-", $_GET['lunch'] );
	$lunch_start = extract_numbers($lunch[0]);
	$lunch_end = extract_numbers($lunch[1]);

	$dinner = explode("-", $_GET['dinner'] );
	$dinner_start = extract_numbers($dinner[0]);
	$dinner_end = extract_numbers($dinner[1]);

	

	$dinner = $_GET['dinner'];

//
// RESULTADO 
//


	if( // VERIFICA SE TODOS OS DADOS FORAM
		!empty($courses) &&
		!empty($day_start) &&
		!empty($day_end) &&
		!empty($days[0]) 
	 ){ 
	

		$k = 0; // INITIALIZE CHOSEN DISCIPLINES ARRAY COUNTER

	 	foreach($courses as $key => $course_name){

			$course_data = db_search($conn, "SELECT * FROM courses WHERE name LIKE '$course_name%'"); // BUSQUE NO BANCO
			
			$course_id = $course_data[0][id]; // O ID DOS CURSOS PEDIDOS


			$course_disciplines_data = db_search($conn, "SELECT * FROM course_disciplines WHERE course_id = '$course_id'"); // COM OS IDS DOS CURSOS, BUSQUE AS DISCIPLINAS DO CURSO


			for ($i = 0; $i < count($course_disciplines_data); $i++){ // PARA CADA DISCIPLINA DO CURSO


				$array = $course_disciplines_data[$i];


				$discipline_nature = $array['nature']; // PEGUE A NATUREZA
				$discipline_semester = $array['semester']; // PEGUE O SEMESTRE



				$discipline_data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$array[discipline_id]'"); // COM O ID, BUSQUE AS INFORMAÇÕES DA DISCIPLINA
				$discipline_classes_data = db_search($conn, "SELECT * FROM discipline_classes WHERE discipline_id = '$array[discipline_id]'"); // E BUSQUE NO BANCO SUAS TURMAS
				

		
				for($j = 0; $j < count($discipline_classes_data); $j++){ // PARA CADA TURMA
				


					$id = $discipline_classes_data[$j]['id']; // SERVER ERROR WHEN ARRAY IS USED

					$discipline_class_offer_data = db_search($conn, "SELECT * FROM discipline_class_offers WHERE discipline_class_id = '$id'"); // BUSQUE NO BANCO
					$discipline_class_vacancies = $$discipline_class_ofer_data[$j]['vacancies']; // AS VAGAS


					//$schedule_query = make_schedule_query($id, $days, $day_start, $day_end, $lunch_start, $lunch_end, $dinner_start, $dinner_end);

					//echo $query . "<br><br>";

					$days_query = make_days_query($days);
					$schedule_data = db_search($conn,
													"SELECT * FROM schedules WHERE (discipline_class_id = '$id')
													 AND(
												   			start_hour >= '$day_start[0]' OR (start_hour = '$day_start[0]'
												   			AND  start_minute >= '$day_start[1]')
												     	)
												   	 AND(
												   	 		end_hour <= '$day_end[0]' OR (end_hour = '$day_end[0]'
												   	 		AND  end_minute <= '$day_end[1]')
												   	 	)
												   	 AND(
												   	 		$days_query
												   	 	)
												   	"); // E BUSQUE NO BANCO OS HORARIOS



					if(!$schedule_data){ // SE NÃO ATENDE OS HORARIOS TENTE COM OUTRA TURMA

						continue;
					
					} else { // SE ATENDE OS HORARIOS


						if(conflict($schedule_data, $lunch_start, $lunch_end, $dinner_start, $dinner_end, $day_start, $day_end)){

							continue;

						} else {

							//echo "$k discipline classes<br>";
							$my_disciplines[$k] = $schedule_data[0];
							$k++;
						}
						

						$discipline_class_code = $discipline_classes_data[$j]['class_number']; // PEGUE O CODIGO DA TURMA


						for($k = 0; $k < count($schedule_data); $k++){ // PARA CADA HORARIO


							$discipline_class_id = $schedule_data[$k]['discipline_class_id']; // PEGUE O ID DA TURMA
							$discipline_day = decide_day($schedule_data[$k]['day']); // O DIA
							$discipline_class_count = $schedule_data[$k]['class_count']; // NUMERO DE TURMAS
							

							$discipline_start_hour = $schedule_data[$k]['start_hour']; // PEGUE OS HORÁRIOS
							$discipline_start_minute = $schedule_data[$k]['start_minute'];
							$discipline_end_hour = $schedule_data[$k]['end_hour'];
							$discipline_end_minute = $schedule_data[$k]['end_minute'];


							// MOSTRE A DISCIPLINA
							echo "<p style='color: #FF08E3;'>";
							echo "Esta disciplina tem natureza: " . $discipline_nature . " para o curso ". "$course_name <br>";
							if(!empty($discipline_semester) ){ echo " | Semester: " . $discipline_semester; }
							
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

			echo "Not enough information. Please fill in courses, days, day_start and day_end. ";
			http_response_code(400);
		
	}





?>