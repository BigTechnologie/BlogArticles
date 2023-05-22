<?php

namespace App;

class Router
{

    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var \AltoRouter
     */
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self //
    {
        $this->router->map('GET', $url, $view, $name); // map en GET l'url

        return $this;
    }

    public function run(): self
    {
        $match = $this->router->match(); // Permet d'interroger le router pour savoir si l'url appelée correspond à une de ces routes
        $view = $match['target']; // Je recupère la clé target
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR . 'layouts/default.php';

        return $this;
    }
}
