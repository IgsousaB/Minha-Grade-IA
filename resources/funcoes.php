<?php

//	TRANSFORM DAY END AND DAY START IN AN ARRAY OF EACH DAY

	function make_days_query($days){


		$query = "(day = $days[0])";

		for($i = 1; $i < count($days); $i++){

			$query .= " OR (day = $days[$i])";
		}

		return $query;

	}

	function conflict($schedule_data, $DAY){


		for($i = 0; $i < count($days); $i++){ // FOR EACH DAY

			$match = 0;

			for($j = 0; $j < count($days); $j++){ // CHECK IF DISCIPLINE DAY MATCH ANY DAY IN THE GIVEN SCHEDULE 

				if($schedule_data[$j][day] == $days[$j]){
					$match = 1;
					break;

				}
			} 

			if($match == 0){

				return 1;

			}


	
			if( $schedule_data[$i][end_hour] <=  $day_start[0] ){  // IF DISCIPLINE ENDS BEFORE STUDENT LIMITS

				return 1;

			} else if( $schedule_data[$i][end_hour] ==  $day_start[0] && $schedule_data[$i][end_minute] <= $day_start[1] ){

				return 1;

			}


			echo $schedule_data[$i][end_hour] . ":" . $schedule_data[$i][end_minute] .  " > " . $day_start[0] . ":" . $day_start[1] . "<br>";

			
/*
if($schedule_data[$i][start_hour] >=  $day_end[0] ){ // IF THE DISCIPLINE STARTS AFTER STUDENT LIMITS

	return 1;

} else if( $schedule_data[$i][start_hour] ==  $day_end[0] && $schedule_data[$i][start_minute] > $day_end[1] ){
	 
	return 1;
}
*/


			if( !empty($lunch) ){ // IF THERE IS LUNCH TIME

// IF LUNCH INTERVAL IS BIGGER THAN 2 HOURS AND DISCIPLINE STARTS AT 13:00

				if ($lunch > 120 && $schedule_data[$i][start_hour] == 13 && $schedule_data[$i][start_minute] == 00){ 

					return 1; // CONFLICT

// IF LUNCH INTERVAL IS BIGGER THAN 1:30 HOURS AND DISCIPLINE ENDS AT 12:30

				} else if($lunch > 90 && $schedule_data[$i][end_hour] == 12 && $schedule_data[$i][end_minute] == 30){

					return 1;

				}				


			}



			if(!empty($dinner) ){ // IF THERE IS DINNER TIME
// IF DINNER INTERVAL IS BIGGER THAN 2:20 HOURS AND DISCIPLINE ENDS AT 16:40

				if ($dinner > 140 && $schedule_data[$i][end_hour] == 16 && $schedule_data[$i][end_minute] == 40){

					return 1; // CONFLICT

// IF DINNER INTERVAL IS BIGGER THAN 30 MINUTES AND DISCIPLINE ENDS AT 18:30
				} else if($dinner > 30 && $schedule_data[$i][end_hour] == 18 && $schedule_data[$i][end_minute] == 30){ 

					return 1;


 // IF DINNER INTERVAL IS BIGGER THAN 1:30 HOURS AND DISCIPLINE STARTS AT 18:30
				} else if($dinner > 90 && $schedule_data[$i][start_hour] == 18 && $schedule_data[$i][start_minute] == 30){ 

					return 1;

				}

			}


		}

		return 0;
	}


	
	function decide_day($day_number){

		switch($day_number){

			case 1:
				return "SEGUNDA";
				
			case 2:
				return "TERÇA";
							
			case 3:
				return "QUARTA";
				
			case 4:
				return "QUINTA";
				
			case 5:
				return "SEXTA";
				
			case 6:
				return "SÁBADO";
				
			case 7:
				return "DOMINGO";
				
		}
	}

 	function extract_numbers($str){

		preg_match_all('!\d+!', $str, $matches);
		return $matches[0];

	}



	function db_search($conn, $query){

		$result = pg_query($conn,  $query); // Recebe a solicitação do banco

		if(!$result){	// Se não houve resultado

			echo $query . " did not execute";
			return 0;

		} else	if(pg_num_rows($result) == 0){ // Se não há registros

		//	echo "<br></br>0 records of " . $query . "<br></br>";
			return 0;

		} else {

			$data = pg_fetch_all($result);
			
		//	echo $query . " sucessfull!<br></br>";
			
			return $data;


		}
		

	}


	function show_data($data){

		foreach ($data as $datarow => $dataarray) {
			foreach ($dataarray as $columnName => $columnData) {

    			echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . ' ';
    			//echo '<br />';

    		}
		}

	}

	function show_result($table, $row){ // Identifica qual tabela e formata respectivamente

		if($table == disciplines){

//echo "<p style='color: #FF08E3;'>";
//echo "Id - Nome - Código - Curriculo - Ementa <br>";

			echo $row[id] . "   -   " . $row[code] . "   -   " . $row[name] . "   -   " . $row[curriculum] . "   -   " . $row[load];
			if( empty($row[syllabus]) ){echo "|  Sem Ementa <br>"; };

	        echo "</p>";
			
		} else if($table == areas){

			echo "<p style='color: #FF08E3;'>";

			echo "Id:  " . $row[0] . "<br>";
			echo "Nome: " . $row[1] . "<br>";
			echo "Descrição: " . $row[2] . "<br></br>";
			
	        echo "</p>";


		} else if($table == course_class_offers){

			echo "<p style='color: #FF08E3;'>";

			echo "Id:  " . $row[0] . "<br>";
			echo "Código: " . $row[1] . "<br>";
			echo "Nome: " . $row[2] . "<br>";
			echo "Currículo: " . $row[5] . "<br>";
			echo "Ementa: " . $row[6] . "<br>";
			echo "Carga Horária: " . $row[7] . "<br></br>";
			
	        echo "</p>";

		} else {

			foreach ($row as $columnName => $columnData) {

        		echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . ' ';
//echo '<br />';

   			}

   		}

	}



?>