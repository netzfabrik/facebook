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
		return $this->getView()->render('helper/FB-SDK.phtml', array(
			'appId' => $service->getAppId(),
			'channelUrl' => $service->getChannelUrl()
		));
	}
}
