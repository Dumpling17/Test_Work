<?php

$cfg = [
    'dbhost' => 'mysql-test',
    'dbuser' => 'www',
    'dbpasswd' => 'my_password',
    'dbname' => 'testdb',
];

class Database
{
	private $dbh;

	public function __construct()
	{
		global $cfg;

        $this->dbh = mysqli_connect($cfg['dbhost'], $cfg['dbuser'], $cfg['dbpasswd']);

		if ($this->dbh) {

			mysqli_select_db($this->dbh, $cfg['dbname']) || die (mysqli_error($this->dbh));
			$this->do_sql("set lc_time_names='ru_RU'");
			$this->do_sql("set names utf8");
			
		} else {
			die(mysqli_error($this->dbh));
		}

	}

	private function do_sql($sql)
	{
		$r =  mysqli_query($this->dbh, $sql);
		if ($r) {
			return $r;
		} else {
			error_log("Error in sql:$sql" . "Exception:" . mysqli_error($this->dbh));
			throw new Exception('Error in sql: ' . $sql . "Exception:" . mysqli_error($this->dbh));
		}
	}

	public function get_rows($sql)
	{
		$r = $this->do_sql($sql);
		$res = array();
		while ($row = mysqli_fetch_assoc($r)) {
			array_push($res, $row);
		}
		return $res;
	}
}
?>