<?php

	function make_days_query($days){


		$query = "(day = $days[0])";

		for($i = 1; $i < count($days); $i++){

			$query .= " OR (day = $days[$i])";
		}

		return $query;

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

		} else	if(pg_num_rows($result) == 0){ // Se não há registros

			//echo "<br></br>0 records of " . $query . "<br></br>";

		} else {

			$data = pg_fetch_all($result);
		  //  echo $query . " sucessfull!<br></br>";
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