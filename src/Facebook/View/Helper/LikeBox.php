<?php
namespace Facebook\View\Helper;

class LikeBox extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$facebookPageUrl = $this->getFacebookPage('likebox');
		if(empty($facebookPageUrl)) {
			return '';
		}

		$config = array_merge($this->getConfig('likebox')->toArray(), $config);
		return $this->getView()->render('helper/likeBox.phtml', array(
			'facebookPageUrl' => $facebookPageUrl,
			'config' => $config
		));
	}
}
