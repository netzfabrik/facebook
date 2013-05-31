<?php
namespace Facebook\View\Helper;

class Follow extends AbstractHelper
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

		return $this->getView()->render('helper/follow.phtml', array(
			'facebookPageUrl' => $facebookPageUrl
		));
	}
}
