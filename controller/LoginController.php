<?php

class LoginController
{
    private LoginModel $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    public function index()
    {
        $this->renderLoginView();
    }

    private function renderLoginView()
    {
        require __DIR__ . '/../view/login.php';
    }
}
