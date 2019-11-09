<?php

namespace Quantox\Controllers;

use Quantox\Init\Controller;
use Quantox\Models\StudentModel;

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
            echo "postoji";
        }else{
            $this->view->load('404');
        }
    }

}
