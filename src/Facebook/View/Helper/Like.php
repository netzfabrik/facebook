<?php
namespace Facebook\View\Helper;

class Like extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		return $this->getView()->render('helper/like.phtml',
			array('config' => $this->getConfig('like'))
		);
	}
}
