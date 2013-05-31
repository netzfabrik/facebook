<?php
namespace FacebookTest\View;

class AbstractHelperTest extends ViewhelperTestcase
{
	public function testSetterAndGetter()
	{
		//
		$sm = $this->getConfiguredServicemanager();
		$facebookService = $sm->get('Facebook');

		/* @var $helper \Facebook\View\Helper\AbstractHelper */
		$helper = $this->getMockForAbstractClass('Facebook\View\Helper\AbstractHelper');

		// setting service
		$res = $helper->setFacebookService($facebookService);
		$this->assertSame($helper, $res);

		// getting service
		$this->assertSame($facebookService, $helper->getFacebookService());

		// test config getter
		$this->assertInstanceOf('Zend\Config\Config', $helper->getConfig());
		$this->assertEquals('12345', $helper->getConfig('appId'));

		// test getFBPage
		$this->assertEquals('http://facebookPageUrl', $helper->getFacebookPage());
		$this->assertEquals('http://customFacebookPageUrl', $helper->getFacebookPage('testHelper'));
	}
}
