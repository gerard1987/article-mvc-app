<?php 

class ArticleController extends Controller
{
    private $viewData;

    public function __construct()
    {
        parent::__construct();

        $this->viewData = [
            'title' => 'articles',
            'content' => null
        ];
    }

    public function index() 
    {
        try 
        {
            $articles = Article::all();

            $this->viewData['content'] = $articles;
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('index', $viewData);
        }
        catch(Exception $ex)
        {
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('index', $viewData);
        }
    }

    public function create() 
    {
        try 
        {
            $this->viewData['title'] = 'Add article';

            if (!empty($_POST))
            {
                $data = $this->sanitizePostData($_POST);
                $article = Article::create($data);

                $this->redirect("/articles" . $article->id);
            }      
    
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('create', $viewData);
        }
        catch(Exception $ex)
        {
            
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('create', $viewData);
        }
    }  

    public function edit($id) 
    {
        try 
        {
            $this->viewData['title'] = 'Edit article';

            if (!empty($_POST))
            {
                $data = $this->sanitizePostData($_POST);
                $article = Article::edit($data);
    
                $this->redirect("/articles/edit/" . $article->id);
            }
            else
            {
                $this->viewData['content'] = Article::getById($id) ?? null;
            }
    
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('edit', $viewData);
        }
        catch(Exception $ex)
        {
            
            $viewData = new ViewData($this->viewData);
            
            $this->renderView('edit', $viewData);
        }
    } 

    public function delete($id) 
    {
        try 
        {
            if (!empty($id))
            {
                $id = (int)$this->sanitizePostData($id)[0] ?? throw new Exception("Couldn't sanitize id");
    
                $deleted = Article::delete($id);
                if (!$deleted){
                    throw new Exception("Could not delete article");
                }
            }
    
            return $this->redirect('/articles');
        }
        catch(Exception $ex)
        {
            return $this->redirect('/articles');
        }
    }  

}