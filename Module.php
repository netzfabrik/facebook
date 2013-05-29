<?php
namespace Facebook;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
			)
		);
	}

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'Facebook' => 'Facebook\Service\Facebook'
			)
		);
	}

	public function getViewHelperConfig()
	{
		return array();
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

}
