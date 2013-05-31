<?php
namespace Facebook\View\Helper;

class Login extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('login')->toArray(), $config);
		return $this->getView()->render('helper/login.phtml',
			array('config' => $config)
		);
	}
}
