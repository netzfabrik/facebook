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

	/**
	 * Facebook tries to set cookies on construct. We need a separate
	 * process to avoid "headers already sent" errors.
	 * @runInSeparateProcess
	 */
	public function testProxyCall()
	{
		$factory = new FacebookFactory();
		$service = $factory->createService($this->getConfiguredServicemanager());
		$this->assertEquals('12345', $service->getAppId());
	}

	/**
	 * Facebook tries to set cookies on construct. We need a separate
	 * process to avoid "headers already sent" errors.
	 * @runInSeparateProcess
	 */
	public function testProxyCallException()
	{
		$factory = new FacebookFactory();
		$service = $factory->createService($this->getConfiguredServicemanager());
		$method = 'wrongNotExistingMethodCausingxception';
		try {
			$this->assertEquals('12345', $service->wrongNotExistingMethodCausingxception());
		}
		catch(\RuntimeException $e) {
			$this->assertEquals("Method '$method' not existing.", $e->getMessage());
			return;
		}

		$this->fail("Exception was not raised when trying to invoke not existing method.");
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