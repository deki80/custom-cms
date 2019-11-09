<?php

namespace Quantox\Models;
use Quantox\Init\Model;
use \PDO;

class BoardMolel extends Model
{
    private $student_id = null;
    private $board_name;
    protected $table_name = 'boards';

    public function __construct($student)
    {
        parent::__construct();
        $this->student_id = $student;
        $this->boad_name();
    }

    public function boad_name()
    {
        $query = "SELECT board_name 
                  FROM " . DB_NAME . ".boards 
                  WHERE board_id IN (SELECT board_id FROM " . DB_NAME . ".board_student WHERE student_id = :student_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':student_id'=>$this->student_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->board_name = $result['board_name'];
    }

    public function board_pased($grades)
    {
        if($this->board_name === "CSM") {

        }elseif ($this->boad_name === "CSMB") {

        }
    }


}