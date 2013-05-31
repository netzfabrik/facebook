<?php
namespace Facebook\View\Helper;

use Zend\View\Helper\AbstractHelper as AbstractViewHelper;

/**
 * Abstract class for view helpers
 */
class AbstractHelper extends AbstractViewHelper
{
	/**
	 * @var Facebook\Service\Facebook
	 */
	private $facebookService;

	/**
	 * @param Facebook\Service\Facebook $facebookService
	 * @return Like
	 */
	public function setFacebookService($facebookService)
	{
		$this->facebookService = $facebookService;
		return $this;
	}

	/**
	 * @return Facebook\Service\Facebook
	 */
	public function getFacebookService()
	{
		return $this->facebookService;
	}

	/**
	 * Get configured facebook page url
	 * @param string helperkey
	 * @return string
	 */
	public function getFacebookPage($helper = null)
	{
		// check for helper specific facebookPageUrl
		if($helper && $helperConf = $this->getConfig($helper)) {
			if(!empty($helperConf['facebookPageUrl'])) {
				return $helperConf['facebookPageUrl'];
			}
		}

		return $this->getConfig('facebookPageUrl');
	}

	/**
	 * Get Config - alternative by key
	 * @param string $key
	 * @return Zend\Config\Config | mixed
	 */
	public function getConfig($key)
	{
		$config = $this->getFacebookService()->getConfig();
		if($key) {
			return $config->get($key);
		}
		return $config;
	}
}
