<?php

namespace Quantox\Models;

use Quantox\Init\Model;
use \PDO;

class StudentModel extends Model
{
    private $student_id;
    private $student_firstname;
    private $student_lastname;
    private $student_index;
    public $is_user = false;

    protected $table_name = 'students';

    public function __construct($student)
    {
        parent::__construct();

        $this->get_student_data($student);
    }

    public function get_student_data($student)
    {
        $query = "SELECT student_firstname, student_lastname, student_indexnomber 
                  FROM " . DB_NAME . "." . $this->table_name . " 
                  WHERE student_id = :student";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':student' => $student]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $this->student_id = $student;
            $this->student_firstname = $result['student_firstname'];
            $this->student_lastname = $result['student_lastname'];
            $this->student_index = $result['student_indexnomber'];
            $this->is_user = true;
        }
    }

    public function get_student_grades()
    {
        $query = "SELECT grade_value 
                  FROM " . DB_NAME . ".grades  
                  WHERE student_id = :student";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':student' => $this->student_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function show_student()
    {
        $student = [];
        $student['First Name'] = $this->student_firstname;
        $student['Last Name'] = $this->student_lastname;
        $student['Index Nomber'] = $this->student_index;
        return $student;
    }

}
