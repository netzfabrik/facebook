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
	 * @return string
	 */
	public function getFacebookPage()
	{
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
