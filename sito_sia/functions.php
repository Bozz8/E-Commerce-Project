<?php
	function ext($reason)
	{
		echo "
			<script type='text/javascript'>
				setTimeout(function(){
				document.redirect.submit();
				},2500);
			</script>";
		exit($reason);
	}

	function extRT($reason, $redirect, $time)
	{
		echo "
		<form name = \"mredirect\" action = \"$redirect\">
			<input type = \"submit\"  style = \"display: none;\">
		</form>
			<script type='text/javascript'>
				setTimeout(function(){
				document.mredirect.submit();
				},$time);
			</script>";
		exit($reason);
	}

	function extR($reason, $redirect)
	{
		extRT($reason, $redirect, 2500);
	}

	function extBT($reason, $time)
	{
		echo "
			<script type='text/javascript'>
				setTimeout(function(){
					window.history.back();
				},$time);
			</script>";
		exit($reason);
	}

	function extB($reason)
	{
		extBT($reason, 2500);
	}



	function checkAllSet()
	{
		if(empty($_POST))
			extB("Devi compilare tutti i campi");
		foreach($_POST as $v)
			if(empty($v))
				extB("Devi compilare tutti i campi");
	}

	function checkSet($parametri)
	{
		if(empty($_POST))
			extB("Devi compilare tutti i campi");
		foreach($parametri as $p)
			if(empty($_POST[$p]))
				extB("Devi compilare tutti i campi richiesti");
	}

	class DBConn
	{
		private $url = "localhost";
		private $user = "root";
		private $pwd = "";
		private $conn;
		private $result;
		private $row;
		private $noApex = false;

		public function __construct($db)
		{
			$this->conn = new mysqli($this->url, $this->user, $this->pwd, $db);
			$this->checkErr();
		}

		public function doQ($query)
		{
			// deprecata
			$this->result = $this->conn->query($query)
				or ext("Query non valida: " . mysqli_error($this->conn));
		}

		public function doQP($query, $parameters)
		{
			if(substr_count($query, '?') != count($parameters))
				ext("Query non valida: Errore nel codice, contattare l'amministratore");
			if(is_array($parameters))
				foreach ($parameters as $p)
					$query = preg_replace('/\?/', $this->prep($p), $query, 1);
			else
				$query = preg_replace('/\?/', $this->prep($parameters), $query);
			$this->result = $this->conn->query($query)
				or ext("Query non valida: " . mysqli_error($this->conn));
		}

		public function close()
		{
			$this->conn->close();
		}

		public function getErrNo()
		{
			return $this->conn->connect_errno;
		}

		public function checkErr()
		{
			if($this->getErrNo())
				exit("Errore di connessione");
		}

		public function getNumRows()
		{
			return $this->result->num_rows;
		}

		public function fetch()
		{
			$this->row = $this->result->fetch_array();
			if(!empty($this->row["IMG"]))
				$this->row["IMG"] = "img/articoli/" . $this->row["IMG"];
			return $this->row;
		}

		public function get($name)
		{
			if(!empty($this->row[$name]));
				return $this->row[$name];
		}

		public function getRow()
		{
			return $this->row;
		}

		public function changeApex()
		{
			if($this->noApex)
				$this->noApex = false;
			else
				$this->noApex = true;
		}

		public function getInsertId()
		{
			return $this->conn->insert_id;
		}

		private function prep($par)
		{
			if($this->noApex)
				$string = $this->conn->real_escape_string($par);
			else
				$string = "'" . $this->conn->real_escape_string($par) . "'";
			$string = preg_replace('/\%/', '\%', $string);
			return $string;
		}

		public function getResult()
		{
			return $this->result;
		}
	}

	function checkCharValidity($regex,$var)
	{
		if (!preg_match($regex,$_POST[$var]))
		{
			echo "Caratteri non validi nel campo $var <br/>";
			return false;
		}
		else
			return true;
	}

	function getArticlebyID($id)
	{
		$connessione = new DBConn("UData");

		if(empty($id))
			ext("Inserisci un ID");

		$query = "SELECT * FROM Articles WHERE ID = ?";
		$connessione->doQP($query, $id);

		if(!$connessione->getNumRows()) // se la query non ha trovato risultati...
			ext("Prodotto non trovato");

		$riga = $connessione->fetch();

		return $riga;
	}

	/*function DisplayResult ($row)
	{

		echo "
				<a class = \"FlexRow\" style = \" height: 150px; width: 75%; margin-top: 5px;\" href = \" Display.php?PID={$row['ID']} \">
						<p style = \"background-image: url('{$row['IMG']}'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; height: 100%; width: 25%; border: 1px solid blue; \">
						</p>
						<div class = \"FlexCol FSize\">
							<div class = \"FlexRow hcenter\" style = \" height: 25%; width: 100%; border: 1px solid green;\">
								{$row['PN']}
							</div>
							<div style = \" height: 75%; width: 100%; border: 1px solid green;\">
								{$row['Description']}
							</div>
						</div>
				</a>";
	}

	function DisplayBasketResult ($row)
	{

		echo "
				<div class = \"FlexRow\" style = \" height: 150px; width: 75%; margin-top: 5px;\">
						<p class = \"center FlexCol\" style = \"width:10% \">
								<input type = 'checkbox' name = 'basketRemove[]' value = \"{$row['AID']}\">	Quantità: {$row['Quantity']}
						</p>
						<a class = \"flexRow\" style = \"width: 75%\" href = \" Display.php?PID={$row['ID']} \">
							<p style = \"background-image: url('{$row['IMG']}'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; height: 100%; width: 25%; border: 1px solid blue; \">
							</p>
							<div class = \"FlexCol\" style = \"width:75% \">
								<div class = \"FlexRow hcenter\" style = \" height: 25%; width: 100%; border: 1px solid green;\">
									{$row['PN']}
								</div>
								<div style = \" height: 75%; width: 100%; border: 1px solid green;\">
									{$row['Description']}
								</div>
							</div>
						</a>
				</div>";
	}*/

	function checkValidDate($date)
	{
		$gma = explode("-", $date);
			if(count($gma) != 3)
				return false;
		return checkdate($gma[1], $gma[2], $gma[0]);
	}
	
	
	function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
	{
		$algorithm = strtolower($algorithm);
		if(!in_array($algorithm, hash_algos(), true))
			trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
		if($count <= 0 || $key_length <= 0)
			trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

		if (function_exists("hash_pbkdf2")) {
			// The output length is in NIBBLES (4-bits) if $raw_output is false!
			if (!$raw_output) {
				$key_length = $key_length * 2;
			}
			return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
		}

		$hash_length = strlen(hash($algorithm, "", true));
		$block_count = ceil($key_length / $hash_length);

		$output = "";
		for($i = 1; $i <= $block_count; $i++) {
			// $i encoded as 4 bytes, big endian.
			$last = $salt . pack("N", $i);
			// first iteration
			$last = $xorsum = hash_hmac($algorithm, $last, $password, true);
			// perform the other $count - 1 iterations
			for ($j = 1; $j < $count; $j++) {
				$xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
			}
			$output .= $xorsum;
		}

		if($raw_output)
			return substr($output, 0, $key_length);
		else
			return bin2hex(substr($output, 0, $key_length));
	}
	
	function myHash($password, $salt)
	{
		return pbkdf2("SHA256", $password, $salt, 2048, 20);
	}
?>
