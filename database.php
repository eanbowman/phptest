<?php
	/* Database.php
	 * Implements a simple interface for a MySQL connection to a database.
	 */

class Database {
	private $database = 'phptest'; // Database name
	private $username = 'phptest'; // Username for MySQL connection
	private $password = '931BV29vDSv191x'; // Password for MySQL connection
	private $host = 'localhost'; // Hostname for MySQL connection
	private $mysqli; // MySQLi resource

	public $error;

	function __construct() {
		/* Initialize a database connection */
		$this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
		if ($this->mysqli->connect_errno) {
		    $this->error[] = "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
		$this->error[] = $this->mysqli->host_info . "\n";
	}

	/* Returns an associative array of database rows returned from the given query */
	public function query( $sql ) {
		$res = mysqli_query($this->mysqli, $sql);
		if( $res ) while( $row[] =  mysqli_fetch_assoc($res) ); else return( null );
		return $row;
	}

	/* Prepares an SQL query */
	public function prepare( $sql ) {
		return $this->mysqli->prepare( $sql );
	}
}

$db = new Database();