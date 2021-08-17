<?php


abstract class Crud extends PDO{

  protected $table;
  protected $primaryKey;

  public function __construct(){
     parent::__construct("mysql:host=localhost; dbname=stampee_encheres", "root", "");
   // parent::__construct("mysql:host=localhost; dbname=e2095322", "e2095322", "AWnDjWwYTkpPV89rkpIk");

  }
//========================================================================
//========================================================================

  public function select($fieldOrder = null, $order = null){
    if($fieldOrder == null){
      $sql = "SELECT * FROM $this->table";
    }else{
      $sql = "SELECT * FROM $this->table ORDER BY $fieldOrder $order";
    }
    $stmt = $this->query($sql);
    //return $stmt->fetchAll();
    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }
//========================================================================
//========================================================================

  public function selectId($id){
    $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = $id";
    $stmt = $this->query($sql);
    //return $stmt->rowCount();
    return $stmt->fetch();

  }
//========================================================================
//========================================================================

public function selectBy($field, $value){
  $sql = "SELECT * FROM $this->table WHERE $field = $value";
  $stmt = $this->query($sql);
  // var_dump($sql);
  //return $stmt->rowCount();
  return $stmt->fetchAll();

}
//========================================================================
//========================================================================

  public function insert($data){
    $fieldName ="`". implode("`, `",array_keys($data))."`";
    $fieldValues = ':'.implode(", :", array_keys($data));
    

    $sql = "INSERT INTO  $this->table  ($fieldName) VALUES ($fieldValues)";
    // print_r( $sql);
    $stmt = $this->prepare($sql);

    foreach ($data as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }

    if(!$stmt->execute()){
      return $stmt->errorInfo();
    }
    return $this->lastInsertId();
  }
//========================================================================
//========================================================================


  public function update($data){

		$fieldDetails=null;
		foreach($data as $key=>$value){
			$fieldDetails .="`$key`= :$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ', ');

		$stmt = $this->prepare("UPDATE $this->table SET $fieldDetails WHERE $this->primaryKey={$data[$this->primaryKey]}");
    // print_r( $stmt);

		foreach($data as $key=>$value){
			$stmt->bindValue(":$key", $value);
		}

		if(!$stmt->execute()){
			print_r($stmt->errorInfo());
		}else{
			return $data[$this->primaryKey];
		}

	}

//========================================================================
//========================================================================

  public function delete($data){

    $sql="Delete from $this->table WHERE $this->primaryKey={$data[$this->primaryKey]}";

    if(!$this->query($sql)){
      print_r($this);
    }

  }






}
