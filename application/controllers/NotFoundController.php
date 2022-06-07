<?php

class NotFoundController extends Controller
{
	
	function execute()
	{
		$this->view->generate('not-found-view.php', 'template-view.php');
	}

}
