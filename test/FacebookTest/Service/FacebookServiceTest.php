<?php
namespace FacebookTest\Service;

use Zend\Config\Config;
use Facebook\Service\Factory\Facebook as FacebookFactory;

class FacebookServiceTest extends \PHPUnit_Framework_TestCase
{
	public function testFactory()
	{
		$factory = new FacebookFactory();
		$service = $factory->createService($this->getConfiguredServicemanager());

		$this->assertInstanceOf('Facebook\Service\Facebook', $service);
		$this->assertInstanceOf('Zend\Config\Config', $service->getConfig());
	}

	public function testProxyCall()
	{
		$factory = new FacebookFactory();
		$service = $factory->createService($this->getConfiguredServicemanager());
		$this->assertEquals('12345', $service->getAppId());
	}

	protected function getConfiguredServicemanager()
	{
		$config = array(
			'facebook' => array(
				'locale' => 'en_US',
				'appId' => '12345',
				'secret' => '',
				'channelUrl' => '',
				'facebookPageUrl' => '',
			)
		);

		$serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager', array('get'));
		$serviceManager
			->expects($this->once())
			->method('get')
			->will($this->returnValue($config));

		return $serviceManager;
	}
}