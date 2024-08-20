<?php //DBCRUDAPI.php
class DBCRUDAPI
{

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'rcnhs_db';


    private $result = array();
    private $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_values = array_values($para);

        $value_placeholders = implode(',', array_fill(0, count($table_values), '?'));

        $sql = "INSERT INTO $table ($table_columns) VALUES ($value_placeholders)";

        $stmt = $this->mysqli->prepare($sql);

        if ($stmt === false) {
            throw new Exception($this->mysqli->error);
        }

        $types = str_repeat('s', count($table_values));
        $stmt->bind_param($types, ...$table_values);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception($this->mysqli->error);
        }
    }


    // public function update($table, $para = array(), $id)
    // {
    //     $args = array();

    //     foreach ($para as $key => $value) {
    //         $args[] = "$key = '$value'";
    //     }

    //     $sql = "UPDATE  $table SET " . implode(',', $args);

    //     $sql .= " WHERE $id";

    //     $result = $this->mysqli->query($sql);
    //     if ($this->mysqli->errno) {
    //         throw new Exception($this->mysqli->errno);
    //     }

    // }
    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '" . $this->mysqli->real_escape_string($value) . "'";
        }

        $sql = "UPDATE $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
        if ($this->mysqli->errno) {
            throw new Exception($this->mysqli->error);
        }
    }


    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $sql;
        $result = $this->mysqli->query($sql);
        if ($this->mysqli->errno) {
            throw new Exception($this->mysqli->errno);
        }
    }

    public $sql;

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectGalYear()
    {

        $sql = "SELECT DISTINCT EXTRACT(YEAR FROM created_at) AS distinct_years FROM galleries ORDER BY distinct_years DESC";


        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectFullleftjoins($table, $table1, $attributename1, $attributename, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT * AS create FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename WHERE $where";
        } else {
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectFullleftjoin($table, $table1, $attributename1, $attributename, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename WHERE $where";
        } else {
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjoinannounce($table, $table1, $attributename1, $attributename, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT *,announcements.created_at as create_a FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename WHERE $where";
        } else {
            $sql = "SELECT *,announcements.created_at as create_a FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjointeacher($table, $table1, $attributename1, $attributename, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename  $where";
        } else {
            $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjointeacher2($table, $table1, $attributename1, $attributename, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT * FROM `teachers` WHERE `teacher_pos_id` NOT IN (5) AND (19)";
        } else {
            $sql = "SELECT * FROM `teachers` WHERE `teacher_pos_id` NOT IN (5) AND (19)";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjoin2($where = NULL)
    {
        if ($where != null) {
            $sql = "SELECT DISTINCT strands.strand_name, strands.* FROM advisory LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name WHERE $where";
        } else {
            $sql = "SELECT DISTINCT strands.strand_name, strands.* FROM advisory LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjoin3($where = NULL)
    {
        if ($where != null) {
            $sql = "SELECT * FROM advisory LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name WHERE $where";
        } else {
            $sql = "SELECT * FROM advisory LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectFullleftjoinstudentGrades($where = NULL)
    {
        if ($where != null) {
            $sql = "SELECT * FROM `student_grades` LEFT JOIN advisory ON student_grades.section = advisory.advisory_id LEFT JOIN student ON student_grades.student = student.student_id LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id WHERE $where";
        } else {
            $sql = "SELECT * FROM `student_grades` LEFT JOIN advisory ON student_grades.section = advisory.advisory_id LEFT JOIN student ON student_grades.student = student.student_id LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function selectFullleftjoin4($where = NULL)
    {
        if ($where != null) {
            $sql = "SELECT * FROM student LEFT JOIN advisory ON student.student_section = advisory.advisory_id LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name WHERE $where";
        } else {
            $sql = "SELECT * FROM student LEFT JOIN advisory ON student.student_section = advisory.advisory_id LEFT JOIN strands ON strands.strand_id = advisory.strand_acronym_id LEFT JOIN teachers ON teachers.teacher_id = advisory.adviser_name";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }






    public function selectleftjoin($table, $table1, $attributename1, $attributename, $attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename $where";
        } else {
            $sql = "SELECT $attributess FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoinauth($where)
    {
        $sql = "SELECT * FROM users LEFT JOIN permissions ON permissions.permission_id = users.user_permission_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);

    }

    public function selectleftjoinauth2($where)
    {
        $sql = "SELECT * FROM `teachers` LEFT JOIN teacher_positions ON teachers.teacher_pos_id = teacher_positions.teacher_position_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);

    }

    public function selectleftjoinauth3($where)
    {
        $sql = "SELECT * FROM `student` LEFT JOIN student_grades ON student.student_id = student_grades.student LEFT JOIN advisory ON student_grades.section = advisory.advisory_id LEFT JOIN strands  ON advisory.strand_acronym_id = strands.strand_id WHERE $where";
        $this->sql = $result = $this->mysqli->query($sql);

    }


    public function selectDocuments($attributes, $where = null)
    {
        $attributess = implode(',', $attributes);
        if ($where != null) {
            $sql = "SELECT $attributess FROM documents LEFT JOIN categories ON documents.category_id = categories.id left JOIN users ON documents.user_id=users.id WHERE $where";
        } else {
            $sql = "SELECT $attributess FROM documents LEFT JOIN categories ON documents.category_id = categories.id left JOIN users ON documents.user_id=users.id";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectleftjoin100($table, $table1, $attributename1, $attributename, $attributesName, $where = null)
    {
        $attributes = implode(',', $attributesName);
        if ($where != null) {
            $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename $where";
        } else {
            $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
        }
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoin1($table, $table1, $attributename1, $attributename, $att, $whereClause)
    {
        $atts = implode(',', $att);
        $sql = "SELECT $atts FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename where $whereClause";

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function selectleftjoin3($table, $table1, $attributename1, $table2, $attributename3, $attributesName = array())
    {
        $attributes = implode(',', $attributesName);
        $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.id = $table.$attributename1 LEFT JOIN $table2 ON $table2.id=$attributename3";

        $this->sql = $result = $this->mysqli->query($sql);
    }

}
?>