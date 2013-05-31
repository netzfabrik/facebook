<?php
namespace Facebook\Service;

use Zend\Config\Config;
use \Facebook as FacebookBase;

class Facebook
{
	/**
	 * @var FacebookBase
	 */
	private $facebook;

	/**
	 * @var Zend\Config\Config
	 */
	private $config;

	/**
	 * Proxy call into Facebook baseclass
	 * @param string $method
	 * @param mixed $params
	 * @throws \RuntimeException
	 * @return mixed
	 */
	public function __call($method, $params)
	{
		$facebookBase = $this->getFacebook();
		if (method_exists($facebookBase, $method)) {
			return call_user_func_array(array($facebookBase, $method), $params);
		}
		throw new \RuntimeException("Method '$method' not existing.");
	}

	/**
	 * Get channel file for x-domain comms
	 * @return string
	 */
	public function getChannelUrl()
	{
		return $this->getConfig()->get('channelUrl');
	}

	/**
	 * @param Zend\Config\Config $config
	 * @return Facebook
	 */
	public function setConfig(Config $config)
	{
		$this->config = $config;
		return $this;
	}

	/**
	 * @return Zend\Config\Config
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * @return FacebookBase
	 */
	private function getFacebook()
	{
		if(!$this->facebook) {
			// lazy load on first call
			$facebookBase = new FacebookBase($this->getConfig()->toArray());
			$this->facebook = $facebookBase;
		}
		return $this->facebook;
	}
}
