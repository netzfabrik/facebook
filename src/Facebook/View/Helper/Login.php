<?php
namespace Facebook\View\Helper;

class Login extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		return $this->getView()->render('helper/login.phtml',
			array('config' => $this->getConfig('login'))
		);
	}
}
