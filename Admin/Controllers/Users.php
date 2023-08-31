<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        $users = $this->model->orderBy("created_at")->paginate(3);

        return view("Admin\Views\Users\index", [
            "users" => $users,
            "pager" => $this->model->pager,
        ]);
    }

    public function show($id)
    {
        $user = $this->getAUserOr404($id);

        return view('Admin\Views\Users\show', [
            "user" => $user
        ]);
    }

    private function getAUserOr404($id): User
    {        
        $user = $this->model->find($id);

        if($user === null)
        {
            throw new PageNotFoundException("User with the id $id not found !");
        }
        return $user;
    }
}
