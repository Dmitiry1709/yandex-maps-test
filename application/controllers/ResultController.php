<?php

class ResultController extends Controller
{

	function __construct()
	{
		$this->model = new ResultsModel();
		$this->view = new View();
	}
	
	function execute()
	{
        $data = [
            'REQUEST_URI' => $_SERVER['REQUEST_URI'],
            'RESULTS' => $this->model->getResults()
        ];

		$this->view->generate('result-view.php', 'template-view.php', $data);
	}
}
