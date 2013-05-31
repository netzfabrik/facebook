<?php
namespace Facebook\View\Helper;

class Follow extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$facebookPageUrl = $this->getFacebookPage('follow');
		if(empty($facebookPageUrl)) {
			return '';
		}

		$config = array_merge($this->getConfig('follow')->toArray(), $config);
		return $this->getView()->render('helper/follow.phtml', array(
			'facebookPageUrl' => $facebookPageUrl,
			'config' => $config
		));
	}
}
