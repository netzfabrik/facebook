<?php
namespace Facebook\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use \Facebook as FacebookBase;

class Facebook implements FactoryInterface
{
	/**
	 * @var FacebookBase
	 */
	private $facebook;

	/**
	 * Create Facebook service
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return mixed
	 */
	public function createService(ServiceLocatorInterface $sm)
	{
		$service = new self();
		$config = $sm->get('Config');
		$facebookBase = new FacebookBase($config['facebook']);
		$service->setFacebook($facebookBase);
		return $service;
	}

	/**
	 * Proxify call into facebook baseclass
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
	 * @param FacebookBase $value
	 * @return Facebook
	 */
	public function setFacebook($facebookBase)
	{
		$this->facebook = $facebookBase;
		return $this;
	}

	/**
	 * @return FacebookBase
	 */
	public function getFacebook()
	{
		return $this->facebook;
	}
}
