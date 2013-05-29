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

	public function getViewHelperConfig()
	{
		return array();
	}

	public function getConfig()
	{
		return array();
	}

}
