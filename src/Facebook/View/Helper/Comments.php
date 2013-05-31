<?php
namespace Facebook\View\Helper;

class Comments extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('comments')->toArray(), $config);
		return $this->getView()->render('helper/comments.phtml',
			array('config' => $config)
		);
	}
}
