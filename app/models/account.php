<?php
/*
 * Account Database Models
 * 
 * enables CRUD functionality
 * 
 * This file is part of the Tap2Tab Package
 *
 * (c) Robby McCullough <mybbor@gmail.com>
 *
 */
class Account {
	public $db;
	
	// Load the database object
    public function __construct($db) {
    	$this->db = $db;
    }
	
	// Create a new account
	public function create($userSlug) {
		$queryStr = sprintf("
			INSERT INTO `accounts` (
				`id` ,
				`page_slug` ,
				`date_joined` ,
				`last_visit` ,
				`tap_count` ,
				`saved_page`
			) VALUES (
				NULL ,
				'%s',
				CURRENT_TIMESTAMP(),
				CURRENT_TIMESTAMP(),
				'0',
				''
			);",
			$this->db->real_escape_string($userSlug)
		);
		
		if ($this->db->query($queryStr)) {
			return $this->db->insert_id;
		} else {
			return false;
		}
	}
	
	public function updateSavedPage($userSlug, $savedPage) {
		return $this->update($userSlug, array('saved_page' => $savedPage));	
	}
	
	public function readUserId($userSlug) {
		$queryStr = sprintf(
			"SELECT
				`id` 
			FROM
				`accounts`
			WHERE  `page_slug` =  '%s'
			LIMIT 1",
			$this->db->real_escape_string($userSlug)
		);

		$dbResult = $this->db->query($queryStr);
		if (is_object($dbResult)) {
			$dbResult = $dbResult->fetch_assoc();
			return $dbResult['id'];
		}
		
		return false;
	}
	
	// Reads account information
	public function readSavedPage($userSlug)   {
		$queryStr = sprintf(
			"SELECT
				`saved_page` 
			FROM
				`accounts`
			WHERE  `page_slug` =  '%s'
			LIMIT 1",
			$this->db->real_escape_string($userSlug)
		);

		$dbResult = $this->db->query($queryStr);
		if (is_object($dbResult)) {
			$dbResult = $dbResult->fetch_assoc();
			return $dbResult['saved_page'];
		}
		
		return false;
	}
	
	// Remove a saved page
	public function deleteSavedPage($userSlug) {
		$queryStr = sprintf(
			"UPDATE
				`accounts`
			SET
				`saved_page` = ''
			WHERE 
				`page_slug` = '%s';",
			$this->db->real_escape_string($userSlug)
		);
		
		return $this->db->query($queryStr);
	}
	
	// Remove an account
	public function delete() { }
	
	// Updates an account row
	private function update($userSlug, $updates) {
		// Escape just to be safe
		$userSlug = $this->db->real_escape_string($userSlug);
		
		// Escape all values & split keys and values
		$values = array_map(array($this->db,'real_escape_string'), array_values($updates));
    	$keys = array_keys($updates);
		
		// Build the query
		$queryStr = 'UPDATE `accounts` SET ';
		for ($i=0; $i<count($keys);$i++) {
			$queryStr .= "`$keys[$i]` = '$values[$i]', ";
		}
		$queryStr = substr($queryStr, 0, strlen($queryStr) -2);
		$queryStr .= " WHERE `page_slug` ='$userSlug' LIMIT 1;";

		return $this->db->query($queryStr);
	}
}

$account = new Account($db);
?>
