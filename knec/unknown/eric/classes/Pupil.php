<?php

class Pupil
{

  public $pupilid = null;
  public $joined = null;
  public $firstname = null;
  public $secondname = null;
  public $sex = null;
  public $admno = null;
  public $pclass = null;
  public $pterm = null;
  public $math = null;
  public $eng = null;
  public $kisw = null;
  public $sci = null;
  public $sos = null;
  public $cre = null;
  public $avrg = null;
  public $tot = null; 
  public $code = null; 
  
  public function __construct( $data=array() ) {
    if ( isset( $data['pupilid'] ) ) $this->pupilid = (int) $data['pupilid'];
    if ( isset( $data['joined'] ) ) $this->joined = (int) $data['joined'];
	if ( isset( $data['firstname'] ) ) $this->firstname = $data['firstname'];
	if ( isset( $data['secondname'] ) ) $this->secondname = $data['secondname'];
	if ( isset( $data['sex'] ) ) $this->sex = $data['sex'];
	if ( isset( $data['admno'] ) ) $this->admno = $data['admno'];
	if ( isset( $data['pterm'] ) ) $this->pterm = $data['pterm'];
	if ( isset( $data['pclass'] ) ) $this->pclass = $data['pclass'];
	if ( isset( $data['math'] ) ) $this->math = $data['math'];
	if ( isset( $data['eng'] ) ) $this->eng = $data['eng'];
	if ( isset( $data['kisw'] ) ) $this->kisw = $data['kisw'];
	if ( isset( $data['sci'] ) ) $this->sci = $data['sci'];
	if ( isset( $data['sos'] ) ) $this->sos = $data['sos'];
	if ( isset( $data['cre'] ) ) $this->cre = $data['cre'];
	if ( isset( $data['avrg'] ) ) $this->avrg = $data['avrg'];
	if ( isset( $data['tot'] ) ) $this->tot = $data['tot'];
	if ( isset( $data['code'] ) ) $this->code = $data['code'];
		
  }

  public function storeFormValues ( $params ) {
	$this->__construct( $params );
    if ( isset($params['joined']) ) {
      $joined = explode ( '-', $params['joined'] );

      if ( count($joined) == 3 ) {
        list ( $y, $m, $d ) = $joined;
        $this->joined = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  public static function getById( $pupilid ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(joined) AS joined FROM pupils WHERE pupilid = :pupilid";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":pupilid", $pupilid, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Pupil( $row );
  }
  
  public static function getByAdmno( $admno ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT *, UNIX_TIMESTAMP(joined) AS joined FROM pupils WHERE admno = :admno";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":admno", $admno, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Pupil( $row );
  }
  
   public static function getByFullNameAdmno( $admno ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM pupils WHERE admno = :admno";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":admno", $admno, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Pupil( $row['firstname'] );
  }
  
  public static function getBy_Admno( $admno ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM pupils WHERE admno = :admno";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":admno", $admno, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return true;
	else if (!$row) return false;
  }

  public static function loginPupil( $admno, $password ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM pupils WHERE admno = :admno AND password = :password";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":admno", $admno, PDO::PARAM_INT );
	$st->bindValue( ":password", $password, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return true;
	else if (!$row) return false;
  }
  
  public static function getList( $numRows=1000000, $order="tot DESC") {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(joined) AS joined FROM pupils
            WHERE code=".$_GET['school']." ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $pupil = new Pupil( $row );
      $list[] = $pupil;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
  
  public function insert() {

    if ( !is_null( $this->pupilid ) ) trigger_error ( "Pupil::insert(): Attempt to insert an Pupil object that already has its ID property set (to $this->pupilid).", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //joined, firstname, secondname, sex, admno, pterm, pclass
    $sql = "INSERT INTO pupils ( joined, firstname, secondname, sex, admno, pterm, pclass, code ) 
		VALUES ( FROM_UNIXTIME(:joined), :firstname, :secondname, :sex, :admno, :pterm, :pclass, :code )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":joined", $this->joined, PDO::PARAM_INT );
    $st->bindValue( ":firstname", $this->firstname, PDO::PARAM_INT );
    $st->bindValue( ":secondname", $this->secondname, PDO::PARAM_INT );
    $st->bindValue( ":sex", $this->sex, PDO::PARAM_INT );
    $st->bindValue( ":admno", $this->admno, PDO::PARAM_INT );
    $st->bindValue( ":pterm", $this->pterm, PDO::PARAM_INT );
    $st->bindValue( ":pclass", $this->pclass, PDO::PARAM_INT );
    $st->bindValue( ":code", $this->code, PDO::PARAM_INT );
    $st->execute();
    $this->pupilid = $conn->lastInsertId();
    $conn = null;
  }
  
  //pupilid, code, firstname, secondname, sex, admno, pclass, pterm
	public function update() {
		if ( is_null( $this->pupilid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE pupils SET code=:code, firstname=:firstname, secondname=:secondname, sex=:sex, admno=:admno, pclass=:pclass, pterm=:pterm WHERE pupilid = :pupilid";	
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":firstname", $this->firstname, PDO::PARAM_INT );
		$st->bindValue( ":secondname", $this->secondname, PDO::PARAM_INT );
		$st->bindValue( ":admno", $this->admno, PDO::PARAM_INT );
		$st->bindValue( ":pterm", $this->pterm, PDO::PARAM_INT );
		$st->bindValue( ":pclass", $this->pclass, PDO::PARAM_INT );
		$st->bindValue( ":code", $this->code, PDO::PARAM_INT ); 
		$st->bindValue( ":pupilid", $this->pupilid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}
	
	public function putMarks() {
		if ( is_null( $this->pupilid ) ) trigger_error ( "Condition::update(): Attempt to update an Condition object that does not have its ID property set.", E_USER_ERROR );   
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE pupils SET math=:math, eng=:eng, kisw=:kisw, sci=:sci, sos=:sos, cre=:cre,avrg=:avrg, tot=:tot WHERE pupilid = :pupilid";	
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":math", $this->math, PDO::PARAM_INT );
		$st->bindValue( ":eng", $this->eng, PDO::PARAM_INT );
		$st->bindValue( ":kisw", $this->kisw, PDO::PARAM_INT );
		$st->bindValue( ":sci", $this->sci, PDO::PARAM_INT );
		$st->bindValue( ":sos", $this->sos, PDO::PARAM_INT );
		$st->bindValue( ":cre", $this->cre, PDO::PARAM_INT ); 
		$st->bindValue( ":avrg", round((($this->math + $this->eng + $this->kisw + $this->sci + $this->sos + $this->cre) / 6),2), PDO::PARAM_INT );
		$st->bindValue( ":tot", ($this->math + $this->eng + $this->kisw + $this->sci + $this->sos + $this->cre), PDO::PARAM_INT );
		$st->bindValue( ":pupilid", $this->pupilid, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}

  public function delete() {

    if ( is_null( $this->pupilid ) ) trigger_error ( "Pupil::delete(): Attempt to delete an Pupil object that does not have its ID property set.", E_USER_ERROR );

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM pupils WHERE pupilid = :pupilid LIMIT 1" );
    $st->bindValue( ":pupilid", $this->pupilid, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>
