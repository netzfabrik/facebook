<?php
namespace Facebook\View\Helper;

class Comments extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		return $this->getView()->render('helper/comments.phtml',
			array('config' => $this->getConfig('comments'))
		);
	}
}
