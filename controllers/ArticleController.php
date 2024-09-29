<?php 

class ArticleController extends Controller
{
    private $viewData;

    public function __construct()
    {
        parent::__construct();

        $this->viewData = [
            'title' => 'articles',
            'content' => null,
            'message' => null
        ];
    }

    public function index() 
    {
        $articles = Article::all();

        $this->viewData['content'] = $articles;
        $viewData = new ViewData($this->viewData);
        
        $this->renderView('index', $viewData);
    }

    public function create() 
    {
        $this->viewData['title'] = 'Add article';

        if (!empty($_POST))
        {
            $data = $this->sanitizePostData($_POST);
            $article = Article::create($data);

            $this->viewData['content'] = $article;
            $this->viewData['message'] = "Article added";

            $this->redirect("/articles" . $article->id);
        }      

        $viewData = new ViewData($this->viewData);
        
        $this->renderView('create', $viewData);
    }  

    public function edit($id) 
    {
        $this->viewData['title'] = 'Edit article';

        if (!empty($_POST))
        {
            $data = $this->sanitizePostData($_POST);
            $article = Article::edit($data);

            $this->viewData['content'] = $article;
            $this->viewData['message'] = "Article edited";

            $this->redirect("/articles/edit/" . $article->id);
        }
        else
        {
            $this->viewData['content'] = Article::getById($id) ?? null;
        }

        $viewData = new ViewData($this->viewData);
        
        $this->renderView('edit', $viewData);
    } 

    public function delete($id) 
    {
        if (!empty($id))
        {
            $id = (int)$this->sanitizePostData($id)[0] ?? throw new Exception("Couldn't sanitize id");

            $deleted = Article::delete($id);
            if (!$deleted){
                throw new Exception("Could not delete article");
            }

            $this->viewData['message'] = 'Article deleted';
        }

        return $this->redirect('/articles');
    }  

}