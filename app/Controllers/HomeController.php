<?php

namespace Quantox\Controllers;

use Quantox\Init\Controller;
use Quantox\Models\HomeModel;

class HomeController extends Controller {

    public function __construct($method)
    {
        parent::__construct($method);
    }

    public function index()
    {
        $model = new HomeModel();
        $data = $model->load_students();

        $this->view->load('/layout/header');
        $this->view->load('app', $data);
        $this->view->load('/layout/footer');
    }

}
