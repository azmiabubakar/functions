<?php
function concatestaffno($injabatan){
	$connect = mysqli_connect("10.34.1.51", "wajihah", "wajihah1", "sada_staff");
	$SQLstring = "select lpad(nopekerja,5,'0') nostaff from staffs_list where jab_id like '%$injabatan%'";
	
	$strOutput = '';
	$iLoop = 0;
	$result = mysqli_query($connect, $SQLstring);
	while($row = mysqli_fetch_array($result)){
		if( $iLoop == 0){
			$strOutput = "'". $row["nostaff"] ."'";
		}
		else
		{
			$strOutput = $strOutput . ",'" . $row["nostaff"] ."'";
		}
		$iLoop++;
	}
	return $strOutput;
}

function getUSerdept($inUser){
	$connect = mysqli_connect("10.34.1.51", "wajihah", "wajihah1", "sada_staff");
        $SQLstring = "select id_jab from staffs_list where username ='$inUser'";

	$result = mysqli_query($connect, $SQLstring);
	while($row = mysqli_fetch_array($result)){
        	$strOutput = "'". $row["id_jab"] ."'";
        }
	
	return $strOutput;

}

function getJabatanName($inID){
        if(empty($inID)){
                return "-";
        }
        $connect = mysqli_connect("10.34.1.51", "acap", "acap1231", "practicum");
        $SQLstring = "select tindakan from letter_tindakan where id =$inID";

        $result = mysqli_query($connect, $SQLstring);
        while($row = mysqli_fetch_array($result)){
                $strOutput = $row["tindakan"];
        }

        return $strOutput;

}

?>
