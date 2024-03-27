<?php

namespace App\Controller;

use Kernel\Controller\Controller;
use Kernel\Validator\Validator;

class AddController extends Controller
{
    public function add()
    {
        $this->view('add');

    }

    public function store()
    {
        $data = ["name" => ""];
        $rules = ["name" => ["required", "min:3", "max:255"]];

        $validator = new Validator();
        dd($validator->validate($data, $rules), $validator->errors());
        dd($this->input("name"));    //

    }

}