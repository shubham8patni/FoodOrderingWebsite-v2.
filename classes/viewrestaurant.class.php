<?php
	
	class viewrestaurant extends connection
	{
		
		public function restaurantlist(){
			$array1 = array();
			$query = "SELECT * FROM restaurantlist";
	     	$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_array($result)) 
			{	
				$array1[] = $row;
			}
			return $array1;
		}

		public function menulist($enc1){
			$array2 = array();
			$query = "SELECT * FROM menulist where rid = '" . $enc1 . "' ";
	     	$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_array($result)) 
			{
				$array2[] = $row;				
			}
			return $array2;
		}

		/* OLD public function cartlist(){
			$array2 = array();
			$array1 = array();
			$query = "SELECT * FROM foodnowcart where user_id = '" . $_SESSION['iuser_id'] . "' and session_id = '" . session_id() . "' ";
	     	$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_array($result)) 
			{	
				$array1[] = $row['item_id'];

			}

			foreach ($array1 as $row) {
					$query = "SELECT * FROM menulist where id = '" . $row. "' ";
			     	$result = mysqli_query($this->conn, $query);
					while($row1 = mysqli_fetch_array($result)) {
						$array2[] = $row1;		
					}		
			}
			return $array2;
		}*/

		public function cartlist($info){
			$array2 = array();
			$query = "SELECT * FROM menulist where id = '" . $info . "' ";
	     	$result = mysqli_query($this->conn, $query);
			while($row = mysqli_fetch_array($result)) 
			{
				$array2[] = $row;				
			}
			return $array2;
		}

	}

?>