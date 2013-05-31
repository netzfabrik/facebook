<?php
namespace Facebook\View\Helper;

class Jssdk extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		$service = $this->getFacebookService();
		$config = $service->getConfig();

		return $this->getView()->render('helper/FB-SDK.phtml', array(
			'appId' => $service->getAppId(),
			'locale' => $config->locale,
			'channelUrl' => $config->channelUrl
		));
	}
}
