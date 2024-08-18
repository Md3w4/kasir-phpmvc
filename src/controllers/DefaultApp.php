<?php

class DefaultApp extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'label1' => 'Main Menu',
            'label2' => 'General',
            'label3' => '',
        ];
        $this->view('partials/header', $data);
        $this->view('index', $data);
        $this->view('partials/footer');
    }
}
