<?php
class Database
{
    protected $conn;
    public function __destruct()
    {
        unset($this->conn);
    }
    public function pdo_get_connection()
    {

        $host = DBHOST; // Change this to your database host
        $dbname = DBNAME; // Replace with your database name

        $username = DBUSER;
        $password = DBPASS;


        $this->conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }
    public function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }
    public function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }
    public function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }
    public function pdo_query_value($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->conn = $this->pdo_get_connection();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($this->conn);
        }
    }
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
