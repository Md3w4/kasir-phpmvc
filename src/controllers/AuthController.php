<?php

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
}
