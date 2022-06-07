<?php

class Route
{

	static function start()
	{
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET' && $uri === '/') {
            include 'application/controllers/MainController.php';

            $controller = new MainController();
            $controller->execute();

            return;
        }

        if($method === 'GET' && $uri === '/result') {
            include 'application/models/ResultsModel.php';
            include 'application/controllers/ResultController.php';

            $controller = new ResultController();
            $controller->execute();
            return;
        }

        if($method === 'POST' && $uri === '/result') {
            include 'application/models/ResultsModel.php';
            include 'application/controllers/AddResultController.php';

            $controller = new AddResultController();
            $controller->execute();
            return;
        }

        include 'application/controllers/NotFoundController.php';

        $controller = new NotFoundController();
        $controller->execute();

        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        exit();
	}
}
