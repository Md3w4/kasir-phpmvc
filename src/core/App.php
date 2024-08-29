<?php

class App
{
    private $controllerFile = 'DefaultApp';
    private $controllerMethod = 'index';
    private $parameter = [];
    private const DEFAULT_GET = 'GET';
    private const DEFAULT_POST = 'POST';
    private $handlers = [];

    public function setDefaultController($controller)
    {
        $this->controllerFile = $controller;
    }

    public function setDefaultMethod($method)
    {
        $this->controllerMethod = $method;
    }

    public function get($uri, $callback, $options = [])
    {
        $this->setHandler(self::DEFAULT_GET, $uri, $callback, $options);
    }

    public function post($uri, $callback, $options = [])
    {
        $this->setHandler(self::DEFAULT_POST, $uri, $callback, $options);
    }

    private function setHandler(string $method, string $path, $handler, $options = [])
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
            'middleware' => $options['middleware'] ?? []
        ];
    }

    public function run()
    {
        $execute = 0;
        $url = $this->getUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $handler) {
            $path = explode('/', ltrim(rtrim($handler['path'], '/'), '/'));
            $keyurl = (isset($url[0]) ? $url[0] : '') . (isset($url[1]) ? $url[1] : '');
            $keypath = (isset($path[0]) ? $path[0] : '') . (isset($path[1]) ? $path[1] : '');

            if ($keyurl != "" && $keyurl == $keypath && $requestMethod == $handler['method']) {
                // Execute middleware
                foreach ($handler['middleware'] as $middleware) {
                    if (is_callable($middleware)) {
                        $middleware();
                    } elseif (method_exists(AuthMiddleware::class, $middleware)) {
                        AuthMiddleware::$middleware();
                    }
                }

                // Set controller and method
                if (isset($handler['handler'][0]) && file_exists(__DIR__ . '/../controllers/' . $handler['handler'][0] . '.php')) {
                    $this->controllerFile = $handler['handler'][0];
                    unset($url[0]);
                }
                require_once __DIR__ . '/../controllers/' . $this->controllerFile . '.php';
                $this->controllerFile = new $this->controllerFile;
                $execute = 1;

                if (isset($handler['handler'][1]) && method_exists($this->controllerFile, $handler['handler'][1])) {
                    $this->controllerMethod = $handler['handler'][1];
                    unset($url[1]);
                }
            }
        }

        if ($execute == 0) {
            require_once __DIR__ . '/../controllers/' . $this->controllerFile . '.php';
            $this->controllerFile = new $this->controllerFile;
        }

        if (!empty($url)) {
            $this->parameter = array_values($url);
        }

        call_user_func_array([$this->controllerFile, $this->controllerMethod], $this->parameter);
    }

    private function getUrl()
    {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}
