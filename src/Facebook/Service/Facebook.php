<?php
namespace Facebook\Service;

use Zend\Config\Config;
use \Facebook as FacebookBase;

class Facebook extends FacebookBase
{
	/**
	 * @var Zend\Config\Config
	 */
	private $config;

	/**
	 *
	 * @param unknown_type $config
	 */
	public function __construct($config)
	{
		$this->setConfig($config);

		/* Default options for curl. */
		self::$CURL_OPTS = array(
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT        => 60,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_USERAGENT      => 'facebook-php-3.2.2',
		);

		parent::__construct(
			array(
				'appId' => $this->getConfig()->appId,
				'secret' => $this->getConfig()->secret
			)
		);
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
}
