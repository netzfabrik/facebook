<?php
namespace FacebookTest\View;
use Zend\Config\Config;

use Facebook\Service\Factory\Facebook as FacebookFactory;


class ViewhelperTestcase extends \PHPUnit_Framework_TestCase
{
	public function doTestInvoke($entity)
	{
		$facebookService = $this->getConfiguredServicemanager()->get('Facebook');
		$entity->setFacebookService($facebookService);
		$entity->setView(new \Zend\View\Renderer\ConsoleRenderer);
		$this->assertInternalType('string', $entity->__invoke());
	}

	protected function getConfiguredServicemanager()
	{
		$config = $this->getConfig()->get('facebook');
		$serviceManagerService = $this->getMock('Zend\ServiceManager\ServiceManager', array('get'));
		$serviceManagerService
			->expects($this->once())
			->method('get')
			->will($this->returnValue($config));

		$factory = new FacebookFactory();
		$service = $factory->createService($serviceManagerService);

		$serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager', array('get'));
		$serviceManager
			->expects($this->once())
			->method('get')
			->will($this->returnValue($service));

		return $serviceManager;
	}

	private $conf;

	protected function getConfig()
	{
		if(!$this->conf) {
			$conf = array(
				'facebook' => array(
					'locale' => 'en_US',
					'appId' => '12345',
					'secret' => 'secret',
					'channelUrl' => 'http://channelUrl',
					'facebookPageUrl' => 'http://facebookPageUrl',

					// Testcase  plugin for abstract- test
					'testHelper' => array(
						'facebookPageUrl' => 'http://customFacebookPageUrl'
					),

					// plugin config - see https://developers.facebook.com/docs/plugins/
					'likebox' => array(
						'facebookPageUrl' => '', // override global setting
						'data-width' => 292,
						'data-show-faces' => 'true',
						'data-stream' => 'true',
						'data-show-border' => 'true',
						'data-header' => 'true'
					),
					'facepile' => array(
						'facebookPageUrl' => '', // override global setting
						'data-max-rows' => 1,
						'data-width' => 300
					),
					'follow' => array(
						'facebookPageUrl' => '', // override global setting
						'data-show-faces' => 'true',
						'data-width' => 450
					),
					'comments' => array(
						'data-width' => 470,
						'data-num-posts' => 10
					),
					'activity' => array(
						'data-width' => 300,
						'data-height' => 300,
						'data-header' => 'true',
						'data-recommendations' => 'false'
					),
					'like' => array(
						'data-send' => 'true',
						'data-width' => 450,
						'data-show-faces' => 'true'
					),
					'login' => array(
						'data-show-faces' => 'true',
						'data-width' => 200,
						'data-max-rows' => 1
					),
					'send' => array(

					)
				)
			);

			$this->conf = new Config($conf, true);
		}

		return $this->conf;
	}
}
