<?php
include_once './banco.php';

if (isset($_GET['term'])){

    $term = $_GET['term'];

    $result = pg_query($conn,  "SELECT id, name from courses where name LIKE '%$term%' "); // Recebe a solicitação do banco

    if(!$result){	// Se não houve resultado

        echo $query . " did not execute";

    } else	if(pg_num_rows($result) == 0){ // Se não há registros

        echo "<br></br>0 records of " . $query . "<br></br>";

    } else {

        $SkillData = array();

        while($row = pg_fetch_assoc($result)){

            $SkillData[] = $row['name'];

        }

        
        echo json_encode($SkillData);

    }

}

?>