<?php

class ourclass{
	
	
	//CREATE THE DATA VARIABLES
	
	public $query;
	public $month;
	

	public function checkNumofVisitors($query){
		$this->query=$query;
		if(mysql_num_rows($this->query)==0){ return false;}
		else { return true; }
		}//checkNumofVisitors
	
	
	
	
	public function getmonthname($num){
		$this->month=$num;
		if($num==1){echo "January";}
		
		if($this->month==2){echo "Febraury";}
		if($this->month==3){echo "March";}
		if($this->month==4){echo "April";}
		if($this->month==5){echo "May";}
		if($this->month==6){echo "June";}
		if($this->month==7){echo "July";}
		if($this->month==8){echo "August";}
		if($this->month==9){echo "September";}
		if($this->month==10){echo "October";}
		if($this->month==11){echo "November";}
		if($this->month==12){echo "December";}
	}
	
	
	public function countSus(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `purchase`");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				
				}
				
	
	}


?>