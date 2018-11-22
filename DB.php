<?php
namespace budget;

//Since this is not a docker and is using forge.laravel.com the env are stored in this file
include '.env';
class DB
{
	private $mysqli;
	function __construct()
	{
		$this->connect();
	}
	/**
	 *
	 */
	private function connect (){
		$this->mysqli = new \mysqli( getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));
		if ($this->mysqli->connect_error) {
			die('Connect Error (' . $this->mysqli->connect_errno . ') '
				. $this->mysqli->connect_error);
		}
		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
		}
	}


	public function insertTransaction ($type,$category,$name,$amount){
		if (!($stmt = $this->mysqli->prepare("INSERT INTO `movieList`.`transactions` (`type`, `category`, `name`, `amount`) 
													VALUES (?, ?, ?, ?);"))) {
			echo "Prepare failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
		}
		if (!$stmt->bind_param("sssi",$type,$category,$name,$amount)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
	}
	/**
	 * Just a simple function to get a list of movies
	 */
	public function listMovies ($title="DESC",$format="DESC",$length="DESC",$year="DESC",$rating="DESC"){
		$sql="SELECT 
				    *
				FROM
				    movieList.movies
				ORDER BY title $title , `format` $format , `length` $length , `year` $year , rating $rating;";
		$data = array();
		if ($result = $this->mysqli->query($sql)) {
			while($row = $result->fetch_object()){
				array_push($data,$row);
			}
		}else{
			echo($this->mysqli->error);
		}
		//$result->close();
		return $data;
	}
	private function update (){
	}
	/**
	 * Keep it clean and close it out when done
	 */
	public function __destruct() {
		$this->mysqli->close();
	}
}