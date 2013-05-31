<?php
namespace Facebook\View\Helper;

class LikeBox extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		$facebookPageUrl = $this->getFacebookPage('likebox');
		if(empty($facebookPageUrl)) {
			return '';
		}

		return $this->getView()->render('helper/likeBox.phtml', array(
			'facebookPageUrl' => $facebookPageUrl,
			'config' => $this->getConfig('likebox')
		));
	}
}
