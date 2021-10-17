<?php


class refer extends connection{
	
	public function checkrefer(){

		if($_SERVER["HTTP_REFERER"] == "")
		{

			header("location:logout.php");
			exit();

		}
		else {

			return true;

		}

	}

}
?>