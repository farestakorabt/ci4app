<?php

namespace App\Controllers\Article;

use App\Controllers\BaseController;
use App\Entities\Article;
use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use finfo;
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
            $error_code = $file->getError();

            if($error_code === UPLOAD_ERR_NO_FILE)
            {
                return redirect()->back()
                                 ->with("errors", ["No file uploaded !"]);
            }

            throw new RuntimeException($file->getErrorString() . " " . $error_code);
        }
        
        if($file->getSizeByUnit("mb") > 2)
        {
            return redirect()->back()
                             ->with("errors", ["File too large !"]);
        }

        if(!in_array($file->getMimeType(), ["image/png", "image/jpeg"]))
        {
            return redirect()->back()
                             ->with("errors", ["Please upload a file with 'png' or 'jpeg' extension "]);
        }

        $path = $file->store("article_images");

        $path = WRITEPATH . "uploads/" . $path;

        service("image")
                ->withFile($path)
                ->fit(500, 500, "center")
                ->save($path); // if we want to make a copy of the image => put a different path

        $article->image = $file->getName();

        $this->model->protect(false)
                    ->save($article);

        return redirect()->to("articles/$id")
                         ->with("message", "Image uploaeded.");
    }

    public function get($id)
    {
        // Obtient l'article correspondant à l'ID fourni ou affiche une erreur 404 si l'article n'existe pas.
        $article = $this->getArticleOr404($id);
    
        // Vérifie si l'article a une image associée.
        if ($article->image) {
            // Construit le chemin complet vers le fichier de l'image en utilisant WRITEPATH et le nom du fichier image.
            $path = WRITEPATH . "uploads/article_images/" . $article->image;
    
            // Crée une instance de la classe finfo pour obtenir le type MIME du fichier.
            $finfo = new finfo(FILEINFO_MIME);
    
            // Obtient le type MIME du fichier image.
            $type = $finfo->file($path);
    
            // Configure l'en-tête de la réponse HTTP pour indiquer le type MIME du fichier.
            header("Content-type: $type");
    
            // Configure l'en-tête de la réponse HTTP pour indiquer la taille du fichier en octets.
            header("Content-Length: " . filesize($path));
    
            // Lit le contenu du fichier image et le renvoie en tant que réponse HTTP.
            readfile($path);
    
            // Termine l'exécution du script après avoir renvoyé le contenu de l'image.
            exit;
        }
    }

    public function delete($id)
    {
        $article = $this->getArticleOr404($id);

        $path = WRITEPATH . "uploads/article_images/" . $article->id;

        if(is_file($path))
        {
            unlink($path);
        }

        $article->image = null;

        $this->model->protect(false)
                    ->save($article);
        
        return redirect()->back()
                         ->with("message", "Image deleted.");
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
