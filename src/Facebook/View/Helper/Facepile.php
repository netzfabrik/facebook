<?php
namespace Facebook\View\Helper;

class Facepile extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$facebookPageUrl = $this->getFacebookPage('facepile');
		if(empty($facebookPageUrl)) {
			return '';
		}

		$config = array_merge($this->getConfig('facepile')->toArray(), $config);
		return $this->getView()->render('helper/facepile.phtml', array(
			'facebookPageUrl' => $facebookPageUrl,
			'config' => $config
		));
	}
}
