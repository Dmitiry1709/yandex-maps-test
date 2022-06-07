<?php

class MainController extends Controller
{

	function execute()
	{
        $data = [
          'REQUEST_URI' => $_SERVER['REQUEST_URI']
        ];
		$this->view->generate('main-view.php', 'template-view.php',$data);
	}
}