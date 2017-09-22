<?php

class Status
{
  
	public $statusid = null;
	public $created = null;
	public $content = null;
  
  public function __construct( $data=array() ) {
    if ( isset( $data['statusid'] ) ) $this->statusid = (int) $data['statusid'];
	if ( isset( $data['created'] ) ) $this->created = (int) $data['created'];
	if ( isset( $data['content'] ) ) $this->content = $data['content'];
		
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
    
  public static function getList( $numRows=1000000, $order="created DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(created) AS created FROM status
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $status = new Status( $row );
      $list[] = $status;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  
  public function insert() {

    if ( !is_null( $this->statusid ) ) trigger_error ( "Status::insert(): Attempt to insert an Status object that already has its ID property set (to $this->statusid).", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
    $sql = "INSERT INTO status ( created, content ) VALUES ( FROM_UNIXTIME(:created), :content )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":created", $this->created, PDO::PARAM_INT );
    $st->bindValue( ":content", $this->content, PDO::PARAM_INT );
    $st->execute();
    $this->statusid = $conn->lastInsertId();
    $conn = null;
  }
}

?>
