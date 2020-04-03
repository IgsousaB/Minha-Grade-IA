<?php

	include_once 'resources/banco.php';
	include_once 'resources/funcoes.php';



//
// RECEBE Variaveis
// 


    $courses = explode(" ", $_POST['curso']); // Remove space chars
	$discipline_limit = $_POST['a'];


	//Schedule
	$lunch = $_POST['lunch'];
	$dinner = $_POST['dinner'];

	$SEG = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	$TER = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	$QUA = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	$QUI = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	$SEX = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	$SAB = ["day_start" => null, "lunch_start" => null, "lunch_end" => null, "dinner_start" => null, "dinner_end" => null, "day_end" => null];
	
	$SEG['day_start'] = $_POST['seg7'];


	
/* Debug de Variaveis
	echo "<br> Discipline Limit: " . $discipline_limit . "<br>";
	echo "lunch: " . $lunch  . "<br>";
	echo "dinner: " . $dinner  . "<br>";
	var_dump($courses);
*/

//
// RESULTADO 
//



	if( // VERIFICA SE TODOS OS DADOS FORAM
		!empty($courses[0]) &&
		!empty($discipline_limit) &&
		!empty($lunch) &&
		!empty($dinner)
		 // && !$SEG && !empty($TER) && !empty($QUA) && !empty($QUI) && !empty($SEX) && !empty($SAB) &&  */
	){ 
	

	 	foreach($courses as $key => $search_key){



			if(!$course_data = db_search($conn, "SELECT * FROM courses WHERE name LIKE '%$search_key%'") ){continue;}
			// BUSQUE NO BANCO
			
			$course_id = $course_data[0][id]; // O ID DOS CURSOS PEDIDOS
			$course_name = $course_data[0][name];

			if(!$course_disciplines_data = db_search($conn, "SELECT * FROM course_disciplines WHERE course_id = '$course_id'") ){continue;}
			 // COM OS IDS DOS CURSOS, BUSQUE AS DISCIPLINAS DO CURSO


			for ($i = 0; $i < count($course_disciplines_data); $i++){ // PARA CADA DISCIPLINA DO CURSO


				$array = $course_disciplines_data[$i];


				$discipline_nature = $array['nature']; // PEGUE A NATUREZA
				$discipline_semester = $array['semester']; // PEGUE O SEMESTRE


				if(!$discipline_data = db_search($conn, "SELECT * FROM disciplines WHERE id = '$array[discipline_id]'")){continue;}
				 // COM O ID DA DISCIPLINA, BUSQUE SUAS INFORMAÇÕES
				if(!($discipline_classes_data = db_search($conn, "SELECT * FROM discipline_classes WHERE discipline_id = '$array[discipline_id]' ")) ){continue;}  // E BUSQUE SUAS TURMAS

					
				for($j = 0; $j < count($discipline_classes_data); $j++){ // PARA CADA TURMA
			


					$id = $discipline_classes_data[$j]['id']; // ? SERVER ERROR WHEN ARRAY IS USED

					if(!$discipline_class_offer_data = db_search($conn, "SELECT * FROM discipline_class_offers WHERE discipline_class_id = '$id'")){continue;}
					 // BUSQUE NO BANCO
					$discipline_class_vacancies = $$discipline_class_ofer_data[$j]['vacancies']; // AS VAGAS


					if(!$schedule_data = db_search($conn, "SELECT * FROM schedules WHERE discipline_class_id = '$id' ")){continue;}
					 // E BUSQUE NO BANCO OS HORARIOS


					if( 0//conflict($schedule_data, $SEG) ||
						//conflict($schedule_data, $TER) ||
						//conflict($schedule_data, $QUA) ||
						//conflict($schedule_data, $QUI) ||
						//conflict($schedule_data, $SEX)
					){  // SE NÃO ATENDE OS HORARIOS

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


							// MOSTRE A DISCIPLINA
							$DATA  = ["name", "nature", "course_name", "semester", "class_code", "day", "start_hour", "start_minute", "end_hour", "end_minute"];
							$DATA['name'] =  $discipline_data[0][]
							$DISCIPLINE = array();
							
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

		echo "Not enough information. Please fill in courses, discipline limit and schedule information. ";
		http_response_code(400);
		
	}



/*
"SELECT * FROM schedules WHERE (discipline_class_id = '$id')
												   AND (
												   			 (start_hour >= '$day_start[0]'
												    	 OR  (start_hour = '$day_start[0]' AND  start_minute >= '$day_start[1]'))
												   		 AND (end_hour <= '$day_end[0]'
												    	 OR  (end_hour = '$day_end[0]' AND  end_minute <= '$day_end[1]'))
												   		 AND ($days_query)
												   	   )")
*/

?>