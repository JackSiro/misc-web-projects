<?php

class School
{

  public $schoolid = null;
  public $created = null;
  public $schoolname = null;
  public $county = null;
  public $subcounty = null;
  public $location = null;
  public $code = null;
  
  public function __construct( $data=array() ) {
    if ( isset( $data['schoolid'] ) ) $this->schoolid = (int) $data['schoolid'];
    if ( isset( $data['created'] ) ) $this->created = (int) $data['created'];
	if ( isset( $data['schoolname'] ) ) $this->schoolname = $data['schoolname'];
	if ( isset( $data['county'] ) ) $this->county = $data['county'];
	if ( isset( $data['subcounty'] ) ) $this->subcounty = $data['subcounty'];
	if ( isset( $data['location'] ) ) $this->location = $data['location'];	
	if ( isset( $data['code'] ) ) $this->code = $data['code'];		
  }

  public function storeFormValues ( $params ) {
	$this->__construct( $params );
    if ( isset($params['created']) ) {
      $created = explode ( '-', $params['created'] );

      if ( count($created) == 3 ) {
        list ( $y, $m, $d ) = $created;
        $this->created = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  public static function getById( $schoolid ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(created) AS created FROM schools WHERE schoolid = :schoolid";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":schoolid", $schoolid, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new School( $row );
  }
  
  public static function getByCode( $code ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(created) AS created FROM schools WHERE code = :code";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":code", $code, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new School( $row );
  }
  
  
  public static function getList( $numRows=1000000, $order="created DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(created) AS created FROM schools
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $school = new School( $row );
      $list[] = $school;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  public function insert() {

    if ( !is_null( $this->schoolid ) ) trigger_error ( "School::insert(): Attempt to insert an School object that already has its ID property set (to $this->schoolid).", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
    $sql = "INSERT INTO schools ( created, schoolname, county, subcounty, location, code ) 
		VALUES ( FROM_UNIXTIME(:created), :schoolname, :county, :subcounty, :location, :code )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":created", $this->created, PDO::PARAM_INT );
    $st->bindValue( ":schoolname", $this->schoolname, PDO::PARAM_INT );
    $st->bindValue( ":county", $this->county, PDO::PARAM_INT );
    $st->bindValue( ":subcounty", $this->subcounty, PDO::PARAM_INT );
    $st->bindValue( ":location", $this->location, PDO::PARAM_INT );
    $st->bindValue( ":code", $this->code, PDO::PARAM_INT );
    $st->execute();
    $this->schoolid = $conn->lastInsertId();
    $conn = null;
  }
  
  
	public function update() {
		if ( is_null( $this->schoolid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE schools SET schoolname=:schoolname, county=:county, subcounty=:subcounty, location=:location, code=:code WHERE schoolid = :schoolid";	
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":schoolname", $this->schoolname, PDO::PARAM_INT );
		$st->bindValue( ":county", $this->county, PDO::PARAM_INT );
		$st->bindValue( ":subcounty", $this->subcounty, PDO::PARAM_INT );
		$st->bindValue( ":location", $this->location, PDO::PARAM_INT );
		$st->bindValue( ":code", $this->code, PDO::PARAM_INT );
		$st->bindValue( ":schoolid", $this->schoolid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}

  public function delete() {

    if ( is_null( $this->schoolid ) ) trigger_error ( "School::delete(): Attempt to delete an School object that does not have its ID property set.", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM schools WHERE schoolid = :schoolid LIMIT 1" );
    $st->bindValue( ":schoolid", $this->schoolid, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
