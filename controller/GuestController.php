<?php

class GuestController
{
    public function __construct()
    {

    }

    public function index()
    {
        $this->renderGuestView();
    }

    private function renderGuestView()
    {
        require __DIR__ . '/../view/login.php';
    }
}