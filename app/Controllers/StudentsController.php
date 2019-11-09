<?php

namespace Quantox\Controllers;

use Quantox\Init\Controller;
use Quantox\Models\StudentModel;

class StudentsController extends Controller{

    public function __construct($method, $param)
    {
        parent::__construct($method, $param);
    }

    public function index()
    {

    }

    public function edit()
    {
        $model = new StudentModel();

    }

}
