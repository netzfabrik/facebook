<?php
namespace Facebook\View\Helper;

class Activity extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('activity')->toArray(), $config);
		return $this->getView()->render('helper/activity.phtml',
			array('config' => $config)
		);
	}
}
