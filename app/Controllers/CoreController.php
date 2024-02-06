<?php
class CoreController
{
    protected $data;

    public function loadView($viewName, $data = [])
    {
        extract($data);
        include_once '../app/Views/header.php';
        include_once '../app/Views/' . $viewName . '.php';
        include_once '../app/Views/footer.php';
    }
    public function loadModel($modelName)
    {
        return new ($modelName . 'Model')();
    }
    // public function data($controller,$methodName) {
    //     $str1 = lcfirst($controller);
    //     return $this->$str1->$methodName();
    // }
}
