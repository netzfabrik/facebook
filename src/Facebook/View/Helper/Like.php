<?php
namespace Facebook\View\Helper;

class Like extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('like')->toArray(), $config);
		return $this->getView()->render('helper/like.phtml',
			array('config' => $config)
		);
	}
}
