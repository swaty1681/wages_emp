<?php
//Connecting to database
if($conn = mysqli_connect("localhost", "root", "")){
	//connecting to table
	if(!mysqli_select_db($conn, "wages_emp")){
		echo "Error in connecting to database - ".mysqli_error($conn);
	}
} else 
	echo "Error in connection - ".mysqli_error($conn);
