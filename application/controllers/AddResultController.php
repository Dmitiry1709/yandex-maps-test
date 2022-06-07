<?php

class AddResultController extends Controller
{
    function __construct()
    {
        $this->model = new ResultsModel();
        $this->view = new View();
    }

	function execute()
	{
        $this->model->addResult();

		$data = [
          'RESULT' => $_REQUEST
        ];

		$this->view->generate('add-result-view.php', 'template-view.php', $data);
	}
	
}
