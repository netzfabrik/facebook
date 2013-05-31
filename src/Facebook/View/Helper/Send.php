<?php
namespace Facebook\View\Helper;

class Send extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('send')->toArray(), $config);
		return $this->getView()->render('helper/send.phtml',
			array('config' => $config)
		);
	}
}
