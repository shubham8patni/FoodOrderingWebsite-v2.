<?php

	class SessionCheck extends Register{

		private function redirect(){
			
				header("Location:./login.php");
				exit;
		}


		public function session(){
		
				
			if(!isset($_SESSION['email']) && empty($_SESSION['email'] )){
			
				$this->redirect();
			}else{
				
				return true;
				exit;
			}

		}
	}