<?php 
										/******************************************************************
											Class dbConnect - This is the database class of the project.
										*******************************************************************/
	class dbConnect  {
		var $connId;
		var $host;
		var $db;
		var $user;
		var $pass;	

		// constructor
		function dbConnect() {				
			$this->host 								= 	getenv('XEROUND_DATABASE_HOST').':'.getenv('XEROUND_DATABASE_PORT');
			$this->db 									= 	getenv('XEROUND_DATABASE_NAME');
			$this->user 								= 	getenv('XEROUND_DATABASE_USERNAME');
			$this->pass 								= 	getenv('XEROUND_DATABASE_PASSWORD');
#			$this->host 								= 	'instance11231.db.xeround.com:7638';
#			$this->db 									= 	'app3966440';
#			$this->user 								= 	'app3966440';
#			$this->pass 								= 	'admin';

			$this->connId 								=	@mysql_pconnect($this->host, $this->user, $this->pass);
			if (!$this->connId) {			
				trigger_error("Error connecting to <b>Server</b> $this->host", E_USER_ERROR);
				die();						
			}
			if (!mysql_select_db('ieee_click', $this->connId)) {			
				trigger_error("Unable to connect to database $this->db", E_USER_ERROR);
				die();
			}	
		}
		function __destruct(){
			if ($this->connId){	
				mysql_close($this->connId);
			}
		}
	}	
	class dbQuery {
		var $connId;
		var $result;
		var $insertId;
		var $success 									= 	1; 
		var $rowsAffected								=	0;
		#function dbQuery 
		function dbQuery($sql,$connId) {		
			$this->connId 								= 	$connId;
			$this->result 								= 	mysql_query($sql, $this->connId);
			if (!$this->result) {			
				$this->success 							= 	0;
			}
			else {
				$this->insertId							= 	mysql_insert_id($this->connId);
				if($this->affectedRows() != 0) 
					$this->success 						= 	1;
				$this->rowsAffected						=	$this->affectedRows();
			}
			return $this->success;		
		}
		#function executeQuery 
		function executeQuery($sql,$connId) {	
			$this->connId 								= 	$connId;				
			$this->result 								= 	mysql_query($sql, $this->connId);
			if (!$this->result) {
				$this->success 							= 	0;
			}
			else {
				$this->insertId 						= 	mysql_insert_id($this->connId);
				if($this->affectedRows() != 0) 
					$this->success 						= 	1;
			}		
			return $this->success;		
		}
		#function affectedRows 
		function affectedRows() {
			return mysql_affected_rows($this->connId);
		}
		function getAffectedRows(){
			return $this->rowsAffected;
		}
		#function numRows 
		function numRows() {
			if($this->success == 1) 
				return mysql_num_rows($this->result);
		}
		#function getRow 	
		function getRow() {
			if($this->success == 1) 
				return mysql_fetch_row($this->result);
		}
		#function getArray 		
		function getArray() {
			if($this->success == 1) 
				return mysql_fetch_array($this->result);
		}
		#function getAssocArray 		
		function getAssocArray() {
			return mysql_fetch_assoc($this->result);
		}
		#function getFieldName 		
		function getFieldName($field) {
			return mysql_field_name($this->result, $field);
		}	
		#function getFieldType 		
		function getFieldType($field) {
			return mysql_field_type($this->result, $field);
		}	
		#function getFieldLength 		
		function getFieldLength($field) {
			return mysql_field_len($this->result, $field);
		}	
		#function getFieldFlags 		
		function getFieldFlags($field) {
			return mysql_field_flags($this->result, $field);
		}	
		#function getSingleValue 	
		function getSingleValue() {
			return mysql_result($this->result);
		}	
		#function numFields 	
		function getNumFields() {
			return mysql_num_fields($this->result);
		}
		function moveToFirst(){
			mysql_data_seek($this->result,0);
		}	
		#function fieldTable 	
		function getFieldTable() {
			return mysql_field_table($this->result, 0);
		}
		#function insertID	
		function getInsertID(){
			return $this->insertId;
		}
	}
?>
