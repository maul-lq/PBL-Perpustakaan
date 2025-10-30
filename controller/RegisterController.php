<?php

class RegisterController
{
    private RegisterModel $model;

    public function __construct()
    {
        $this->model = new RegisterModel();
    }

    public function index()
    {
        $this->renderRegistView();
    }

    private function renderRegistView()
    {
        require __DIR__ . '/../view/login.php';
    }
}
