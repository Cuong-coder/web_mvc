<?php
/**
 *  hàm trong lớp này này sẽ được gọi tại các file trong folder model
 *  thực hiện các câu truy vấn được định nghĩa tại các hàm ở model
 *  Và kết quả return của class này sẽ được trả lại Controller và từ đó sẽ truyền vào view để hiển thị
 */
class Database extends PDO{

    public function __construct($connect,$user,$pass){
        parent:: __construct($connect,$user,$pass);
    }


    public function select($sql,$data = array(),$fetchStyle = PDO::FETCH_ASSOC){
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindParam($key,$value);
        }

        
        $stmt->execute();
        return $stmt->fetchAll($fetchStyle);
    }

    public function insert($table,$data){
        $key = implode(",", array_keys($data));
        $value = ":" .implode(", :", array_keys($data));
        
        $sql = "INSERT INTO $table($key) VALUE($value)";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt -> bindValue(":$key",$value);
        }
        return $stmt->execute();

    }

    public function update($table, $data, $cond){
        $updateKeys = NULL;
        foreach($data as $key => $value){
            $updateKeys .= "$key=:$key,";
        }
        $updateKeys = rtrim($updateKeys,',');

        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt -> bindValue(":$key",$value);
        }
        return $stmt->execute();
    }

    public function delete($table, $cond, $limit = 1){
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);
    }

    public function affectedRows($sql, $username, $password){
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username, $password));
        return $stmt->rowCount();
        
    }
    public function selectUser($sql, $username, $password){
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username, $password));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



