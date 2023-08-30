<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Password extends BaseController
{
    public function set()
    {
        return view("password/set");
    }

    public function update()
    {
        $rules = [
            "password" => [
                "label" => "Password",
                "rules" => "required|matches[password]",
            ],
            "password_confirmation" => [
                "label" => "Confirm password",
                "rules" => "required|matches[password]",
            ]
        ];

        if(!$this->validate($rules))
        {
            return redirect()->back()
                             ->with("errors", $this->validator->getErrors());

        } else {
            $user = auth()->user();

            $user->password = $this->request->getPost("password");

            $model = new UserModel;

            $model->save($user);

            session()->removeTempdata("magicLogic");

            return redirect()->to("/")
                             ->with("message", "Password changed successfully !");
        }
    }
}
