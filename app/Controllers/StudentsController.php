<?php

namespace Quantox\Controllers;

use Quantox\Init\Controller;
use Quantox\Models\StudentModel;
use Quantox\Models\BoardMolel;

class StudentsController extends Controller{
    private $student;

    public function __construct($method, $param)
    {
        parent::__construct($method, $param);
    }

    public function index()
    {

    }

    public function edit($param)
    {
        $model = new StudentModel($param);
        if($model->is_user) {
            $grades = $model->get_student_grades();
            $board = new BoardMolel($param);
            $passedBoard = $board->board_pased($grades);
            $data = [];
            $data['user'] = $model->show_student();
            $data['grades'] = array_column($grades,'grade_value');
            $data['passed'] = $passedBoard;
            echo json_encode($data);
        }else{
            $this->view->load('404');
        }
    }

}
