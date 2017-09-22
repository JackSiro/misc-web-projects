<?php

class Category
{
 
  public $catid = null;
  public $created = null;
  public $name = null;
  public $description = null;
  
  public function __construct( $data=array() ) {
    if ( isset( $data['catid'] ) ) $this->catid = (int) $data['catid'];
    if ( isset( $data['created'] ) ) $this->created = (int) $data['created'];
	if ( isset( $data['name'] ) ) $this->name = $data['name'];
	if ( isset( $data['description'] ) ) $this->description = $data['description'];
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

  public static function getById( $catid ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(created) AS created FROM categorys WHERE catid = :catid";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":catid", $catid, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Category( $row );
  }
  
  public static function getByCode( $catid ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(created) AS created FROM categorys WHERE catid = :catid";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":catid", $catid, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Category( $row );
  }
  
  
  public static function getList( $numRows=1000000, $order="created DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(created) AS created FROM categorys
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $category = new Category( $row );
      $list[] = $category;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  public function insert() {

    if ( !is_null( $this->catid ) ) trigger_error ( "Category::insert(): Attempt to insert a Category object that already has its ID property set (to $this->catid).", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
    $sql = "INSERT INTO categorys ( created, name, description ) 
		VALUES ( FROM_UNIXTIME(:created), :name, :description )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":created", $this->created, PDO::PARAM_INT );
    $st->bindValue( ":name", $this->name, PDO::PARAM_INT );
    $st->bindValue( ":description", $this->description, PDO::PARAM_INT );
    $st->execute();
    $this->catid = $conn->lastInsertId();
    $conn = null;
  }
  
  
	public function update() {
		if ( is_null( $this->catid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE categorys SET name=:name, description=:description WHERE catid = :catid";	
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":name", $this->name, PDO::PARAM_INT );
		$st->bindValue( ":description", $this->description, PDO::PARAM_INT );
		$st->bindValue( ":catid", $this->catid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}

  public function delete() {

    if ( is_null( $this->catid ) ) trigger_error ( "Category::delete(): Attempt to delete an Category object that does not have its ID property set.", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM categorys WHERE catid = :catid LIMIT 1" );
    $st->bindValue( ":catid", $this->catid, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
