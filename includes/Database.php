<?php

class Database
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "gest_trainees";
    private $con = false;
    private $result = array();
    private $myQuery = "";
    private $numResults = "";
    private $myconn = "";

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        if (!$this->con) {
            $this->myconn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
            if ($this->myconn) {
                $seldb = mysqli_select_db($this->myconn, $this->db_name);
                mysqli_set_charset($this->myconn,'UTF-8');
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    array_push($this->result, mysqli_error($this->myconn));
                    return false;
                }
            }
        } else {
            return true;
        }
    }

    public function disconnect()
    {
        if ($this->con) {
            if (mysqli_close()) {
                $this->con = false;
                return true;
            } else {
                return false;
            }
        }
    }

    public function sql($sql)
    {
        $query = mysqli_query($this->myconn,$sql);
        $this->myQuery = $sql;
        if ($query) {
            $this->numResults = mysqli_num_rows($query);
            for ($i = 0; $i < $this->numResults; $i++) {
                $r = mysqli_fetch_array($query);
                $key = array_keys($r);
                for ($x = 0; $x < count($key); $x++) {
                    if (!is_int($key[$x])) {
                        if (mysqli_num_rows($query) >= 1) {
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        } else {
                            $this->result = null;
                        }
                    }
                }
            }
            return true;
        } else {
            array_push($this->result, mysqli_error());
            return false;
        }
    }

    public function select($table, $rows = '*', $join = null,$where = null, $order = null, $limit = null,$orderBy = null)
    {
        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($join != null) {
            $q .= ' ' . $join;
        }
        if ($where != null) {
            $q .= ' WHERE ' . $where;
        }
        if ($order != null) {
            $q .= ' ORDER BY ' . $order;
        }
        if ($limit != null) {
            $q .= ' LIMIT ' . $limit;
        }
        if ($orderBy != null) {
            $q .= ' ORDER BY ' . $orderBy;
        }
        $this->myQuery = $q;
        if ($this->tableExists($table)) {
            $query = mysqli_query($this->myconn,$q);
            if ($query) {
                $this->numResults = mysqli_num_rows($query);
                for ($i = 0; $i < $this->numResults; $i++) {
                    $r = mysqli_fetch_array($query);
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++) {
                        if (!is_int($key[$x])) {
                            if (mysqli_num_rows($query) >= 1) {
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            } else {
                                $this->result = null;
                            }
                        }
                    }
                }
                return true;
            } else {
                array_push($this->result, mysqli_error($this->myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    public function insert($table, $params = array())
    {
        if ($this->tableExists($table)) {
            $sql = 'INSERT INTO `' . $table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES ("' . implode('", "', $params) . '")';
            $this->myQuery = $sql;
            if ($ins = mysqli_query($this->myconn,$sql)) {
                array_push($this->result, mysqli_insert_id($this->myconn));
                return true;
            } else {
                array_push($this->result, mysqli_error($this->myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($table, $where = null)
    {
        if ($this->tableExists($table)) {
            if ($where == null) {
                $delete = 'DROP TABLE ' . $table;
            } else {
                $delete = 'DELETE FROM ' . $table . ' WHERE ' . $where;
            }

            if ($del = mysqli_query($this->myconn,$delete)) {
                array_push($this->result, mysqli_affected_rows($this->myconn));
                $this->myQuery = $delete;
                return true;
            } else {
                array_push($this->result, mysqli_error($this->myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    public function update($table, $params = array(), $where='')
    {
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $field => $value) {
                $args[] = $field . '="' . $value . '"';
            }
            $sql = 'UPDATE ' . $table . ' SET ' . implode(',', $args) . ' WHERE ' . $where;
            $this->myQuery = $sql; // Pass back the SQL
            if ($query = mysqli_query($this->myconn,$sql)) {
                array_push($this->result, mysqli_affected_rows($this->myconn));
                return true;
            } else {
                array_push($this->result, mysqli_error($this->myconn));
                return false;
            }
        } else {
            return false;
        }
    }

    private function tableExists($table)
    {
        if (strpos($table, 'as') !== false) {
            $table = explode(' ',$table);
            $table = $table[0];
        }
        $tablesInDb = mysqli_query($this->myconn,'SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb) {
            if (mysqli_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                array_push($this->result, $table . " does not exist in this database");
                return false;
            }
        }
    }

    public function getResult()
    {
        $val = $this->utf8_converter($this->result);
        $this->result = array();
        return $val;
    }

    function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    public function getSql()
    {
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

    public function numRows()
    {
        $val = $this->numResults;
        $this->numResults = array();
        return $val;
    }

    public function escapeString($data)
    {
        return mysqli_real_escape_string($this->myconn,htmlspecialchars(addslashes($data),ENT_QUOTES));
    }
}
