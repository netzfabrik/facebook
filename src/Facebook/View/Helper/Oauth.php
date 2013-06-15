<?php
namespace Facebook\View\Helper;

class Oauth extends AbstractHelper
{
	/**
	 * View helper invoke
	 * @param array $config
	 */
	public function __invoke($config = array())
	{
		$config = array_merge($this->getConfig('oauth')->toArray(), $config);
		$oauthUrl = $this->getFacebookService()->getLoginUrl(array(
			'redirect_uri'  => $config['redirect_uri'],
			'scope' 	    => $config['scope'],
			'response_type' => $config['response_type'],
		));
		return $this->getView()->render('helper/oauth.phtml',
			array(
				'oauth_url' => $oauthUrl,
				'id' => $config['id'],
				'classes' => $config['classes'],
				'link_text' => $config['link_text'],
			)
		);
	}
}
