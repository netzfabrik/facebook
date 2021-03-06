<?php
namespace Facebook\Service\Factory;

use Zend\Config\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Facebook\Service\Facebook as FacebookService;

class Facebook implements FactoryInterface
{
	/**
	 * Create Facebook service
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return Facebook\Service\Facebook
	 */
	public function createService(ServiceLocatorInterface $sm)
	{
		$config = $sm->get('Config');
		if(is_array($config)) {
			$config = new Config($config['facebook']);
		}

		$service = new FacebookService($config);
		return $service;
	}
}
