<?php 

class ArticleController extends Controller
{
    public function __construct()
    {
        parent::__construct();    
    }
    public function index() 
    {
        $data = [
            'title' => 'articles',
            'content' => 'Welcome to the Home Page'
        ];

        $viewData = new View($data);
        
        $this->renderView('index', $viewData);
    }
}