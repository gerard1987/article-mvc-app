<?php 

class ArticleController extends Controller
{
    public function __construct()
    {
        parent::__construct();    
    }

    public function index() 
    {
        $articles = Article::all();

        $data = [
            'title' => 'articles',
            'content' => $articles
        ];

        $viewData = new View($data);
        
        $this->renderView('index', $viewData);
    }

    public function create() 
    {
        $articles = Article::all();

        $data = [
            'title' => 'Edit article',
            'content' => $articles
        ];

        $viewData = new View($data);
        
        $this->renderView('edit', $viewData);
    }  

    public function edit($id) 
    {
        if (!empty($_POST))
        {
            $data = $this->sanitizePostData();
            $article = Article::edit($data);
        }
        else
        {
            $article = Article::getById($id)[0] ?? null;
        }

        $data = [
            'title' => 'Edit article',
            'content' => $article
        ];

        $viewData = new View($data);
        
        $this->renderView('edit', $viewData);
    } 

    public function delete() 
    {
        $articles = Article::all();

        $data = [
            'title' => 'Edit article',
            'content' => $articles
        ];

        $viewData = new View($data);
        
        $this->renderView('edit', $viewData);
    }  

}