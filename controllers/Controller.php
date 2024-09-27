<?php 

class Controller
{
    protected $root;
    private $viewsFolder;
    private $layoutsFolder;
    private $pagesFolder;

    public function __construct()
    {
        $this->root = dirname(__DIR__);
        $this->viewsFolder = 'views';
        $this->layoutsFolder = 'layout';
        $this->pagesFolder = 'pages';
    }

    private function renderHeader()
    {
        require_once($this->root . DIRECTORY_SEPARATOR . $this->viewsFolder . DIRECTORY_SEPARATOR . $this->layoutsFolder . DIRECTORY_SEPARATOR . 'header.php');   
    }

    private function renderBody($filePath)
    {
        require_once($filePath);
    }

    protected function renderView($view, View $viewData)
    {
        $controllerFolder = strtolower(str_replace('Controller', '', get_class($this)));
        $fullPath = $this->root . DIRECTORY_SEPARATOR . $this->viewsFolder . DIRECTORY_SEPARATOR . $this->pagesFolder  . DIRECTORY_SEPARATOR . $controllerFolder . DIRECTORY_SEPARATOR . $view . '.php';

        if (file_exists($fullPath)) 
        {
            extract($viewData->getViewData());  // Extract data variables for use in the view

            $this->renderHeader();
            // $this->renderBody($fullPath);

            $viewData->render($fullPath);
        }
        else 
        {
            echo "View $view file not found: ";
        }
    }

    protected function sanitizePostData()
    {
        if (!empty($_POST)) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            return [
                'id' => htmlspecialchars($id),
                'name' => htmlspecialchars($name),
                'price' => htmlspecialchars($price)
            ];
        }
    }
}