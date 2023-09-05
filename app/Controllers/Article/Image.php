<?php

namespace App\Controllers\Article;

use App\Controllers\BaseController;
use App\Entities\Article;
use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;

class Image extends BaseController
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    public function new($id)
    {
        $article = $this->getArticleOr404($id);

        return view("Article/Image/new", [
            "article" => $article
        ]);
    }

    public function create($id)
    {
        $article = $this->getArticleOr404($id);

        $file = $this->request->getFile("image");

        if(!$file->isValid())
        {
            throw new RuntimeException($file->getErrorString());
        }

    }

    private function getArticleOr404($id): Article
    {        
        $article = $this->model->find($id);

        if($article === null)
        {
            throw new PageNotFoundException ("Article with the id $id not found !");
        }
        return $article;
    }
}
