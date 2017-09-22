<?php

class Item
{

	public $itemid = null;
	public $datein = null;
	public $name = null;
	public $partno = null;
	public $colour = null;
	public $serial = null;
	public $weight = null;
	public $size = null;
	public $value = null;
	public $description = null;
	public $dateout = null;
	public $broughtby = null;
	public $takenby = null;
	public $givenby = null;
	public $state = null;
	public $catid = null;
	public $receiver = null;
	
	public $statusid = null;
	public $created = null;
	public $content = null;
  
  public function __construct( $data=array() ) {
    if ( isset( $data['itemid'] ) ) $this->itemid = (int) $data['itemid'];
	if ( isset( $data['datein'] ) ) $this->datein = (int) $data['datein'];
	if ( isset( $data['name'] ) ) $this->name = $data['name'];
	if ( isset( $data['partno'] ) ) $this->partno = $data['partno'];
	if ( isset( $data['colour'] ) ) $this->colour = $data['colour'];
	if ( isset( $data['serial'] ) ) $this->serial = $data['serial'];
	if ( isset( $data['weight'] ) ) $this->weight = $data['weight'];
	if ( isset( $data['size'] ) ) $this->size = $data['size'];
	if ( isset( $data['value'] ) ) $this->value = $data['value'];
	if ( isset( $data['description'] ) ) $this->description = $data['description'];
	if ( isset( $data['dateout'] ) ) $this->dateout = (int) $data['dateout'];
	if ( isset( $data['broughtby'] ) ) $this->broughtby = $data['broughtby'];
	if ( isset( $data['takenby'] ) ) $this->takenby = $data['takenby'];
	if ( isset( $data['givenby'] ) ) $this->givenby = $data['givenby'];
	if ( isset( $data['state'] ) ) $this->state = $data['state'];
	if ( isset( $data['catid'] ) ) $this->catid = $data['catid'];
	if ( isset( $data['receiver'] ) ) $this->receiver = $data['receiver'];
	
	if ( isset( $data['statusid'] ) ) $this->statusid = (int) $data['statusid'];
	if ( isset( $data['created'] ) ) $this->created = $data['created'];
	if ( isset( $data['content'] ) ) $this->content = $data['content'];
		
  }

  public function storeFormValues ( $params ) {
	$this->__construct( $params );
    if ( isset($params['datein']) ) {
      $datein = explode ( '-', $params['datein'] );

      if ( count($datein) == 3 ) {
        list ( $y, $m, $d ) = $datein;
        $this->datein = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }
  
  
  public function storexFormValues ( $params ) {
	$this->__construct( $params );
    if ( isset($params['created']) ) {
      $created = explode ( '-', $params['created'] );

      if ( count($created) == 3 ) {
        list ( $y, $m, $d ) = $created;
        $this->created = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  public static function getById( $itemid ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(datein) AS datein FROM items WHERE itemid = :itemid";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":itemid", $itemid, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Item( $row );
  }
  
  public static function getList( $numRows=1000000, $order="datein DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(datein) AS datein FROM items
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $item = new Item( $row );
      $list[] = $item;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
    
  public static function getListIn( $numRows=1000000, $order="datein DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(datein) AS datein FROM items
            WHERE state='in' ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $item = new Item( $row );
      $list[] = $item;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  public static function getListOut( $numRows=1000000, $order="datein DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(datein) AS datein FROM items
            WHERE state='out' ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $item = new Item( $row );
      $list[] = $item;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  public function insert() {

    if ( !is_null( $this->itemid ) ) trigger_error ( "Item::insert(): Attempt to insert an Item object that already has its ID property set (to $this->itemid).", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
    $sql = "INSERT INTO items ( datein, name, broughtby, catid, partno, serial, colour, weight, value, state, receiver ) 
		VALUES ( FROM_UNIXTIME(:datein), :name, :broughtby, :catid, :partno, :serial, :colour, :weight, :value, :state, :receiver )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":datein", $this->datein, PDO::PARAM_INT );
    $st->bindValue( ":name", $this->name, PDO::PARAM_INT );
    $st->bindValue( ":broughtby", $this->broughtby, PDO::PARAM_INT );
    $st->bindValue( ":catid", $this->catid, PDO::PARAM_INT );
    $st->bindValue( ":partno", $this->partno, PDO::PARAM_INT );
    $st->bindValue( ":serial", $this->serial, PDO::PARAM_INT );
    $st->bindValue( ":colour", $this->colour, PDO::PARAM_INT );
    $st->bindValue( ":weight", $this->weight, PDO::PARAM_INT );
    $st->bindValue( ":value", $this->value, PDO::PARAM_INT );
    $st->bindValue( ":state", $this->state, PDO::PARAM_INT );
    $st->bindValue( ":receiver", $this->receiver, PDO::PARAM_INT );
    $st->execute();
    $this->itemid = $conn->lastInsertId();
    $conn = null;
  }
  
  public function status() {

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
  
	public function update() {
		if ( is_null( $this->itemid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE items SET code=:code, name=:name, partno=:partno, serial=:serial, colour=:colour, size=:size, weight=:weight WHERE itemid = :itemid";	
		$st = $conn->prepare ( $sql );
		 $st->bindValue( ":name", $this->name, PDO::PARAM_INT );
		$st->bindValue( ":broughtby", $this->broughtby, PDO::PARAM_INT );
		$st->bindValue( ":catid", $this->catid, PDO::PARAM_INT );
		$st->bindValue( ":partno", $this->partno, PDO::PARAM_INT );
		$st->bindValue( ":serial", $this->serial, PDO::PARAM_INT );
		$st->bindValue( ":colour", $this->colour, PDO::PARAM_INT );
		$st->bindValue( ":weight", $this->weight, PDO::PARAM_INT );
		$st->bindValue( ":value", $this->value, PDO::PARAM_INT );
		$st->bindValue( ":itemid", $this->itemid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}
	
	public function giveout() {
		if ( is_null( $this->itemid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE items SET dateout=:dateout, takenby=:takenby, givenby=:givenby, state=:state WHERE itemid = :itemid";	
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":dateout", $this->dateout, PDO::PARAM_INT );
		$st->bindValue( ":takenby", $this->takenby, PDO::PARAM_INT );
		$st->bindValue( ":givenby", $this->givenby, PDO::PARAM_INT );
		$st->bindValue( ":state", $this->state, PDO::PARAM_INT );
		$st->bindValue( ":itemid", $this->itemid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}

  public function delete() {

    if ( is_null( $this->itemid ) ) trigger_error ( "Item::delete(): Attempt to delete an Item object that does not have its ID property set.", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM items WHERE itemid = :itemid LIMIT 1" );
    $st->bindValue( ":itemid", $this->itemid, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
