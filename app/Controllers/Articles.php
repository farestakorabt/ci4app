<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index(): string
    {

        // $db = db_connect();

        // $db->listTables();

        $data = [
            ['title' => 'One', "content" => 'The first'],
            ['title' => 'Two', "content" => 'Some content'],
        ];
        return view('Articles/index', [
            "articles" => $data
        ]);
    }
}
