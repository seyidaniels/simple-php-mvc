<?php


class HomeController extends Controller

{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        return $this->view('home/index', [
            'user' => $user
        ]);
    }
}