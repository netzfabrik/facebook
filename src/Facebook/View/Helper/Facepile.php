<?php
namespace Facebook\View\Helper;

class Facepile extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		$facebookPageUrl = $this->getFacebookPage();
		if(empty($facebookPageUrl)) {
			return '';
		}

		return $this->getView()->render('helper/facepile.phtml', array(
			'facebookPageUrl' => $facebookPageUrl,
			'config' => $this->getConfig('facepile')
		));
	}
}
