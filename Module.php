<?php
namespace Facebook;

use Zend\Mvc\MvcEvent;

use Facebook\View\Helper\Jssdk;
use Facebook\View\Helper\Oauth;
use Facebook\View\Helper\Activity;
use Facebook\View\Helper\Comments;
use Facebook\View\Helper\Facepile;
use Facebook\View\Helper\Follow;
use Facebook\View\Helper\Like;
use Facebook\View\Helper\LikeBox;
use Facebook\View\Helper\Login;
use Facebook\View\Helper\Send;

class Module
{
	public function onBootstrap(MvcEvent $e)
	{
		/* @var $app \Zend\Mvc\Application */
		$app = $e->getTarget();
		$config = $app->getConfig();

		if ($config['facebook']['og']['enabled']) {
			$em = $app->getEventManager();
			$em->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'addMetaOnDispatch'));
		}
	}

	/**
	 * Add facebook OG Meta tags to layout
	 * @param MvcEvent $e
	 */
	public function addMetaOnDispatch(MvcEvent $e)
	{
		/* @var $controller \zend\Mvc\Controller\AbstractActionController */
		$controller = $e->getTarget();

		$config = $e->getTarget()->getServiceLocator()->get('Config');
		$config = $config['facebook']['og'];

		/* @var $vhm \Zend\View\HelperPluginManager */
		$vhm = $controller->getServiceLocator()->get('viewhelpermanager');
		$vhm->get('headmeta')->setProperty('og:image', 		 $config['image']);
		$vhm->get('headmeta')->setProperty('og:title', 		 $config['title']);
		$vhm->get('headmeta')->setProperty('og:url', 		 $config['url']);
		$vhm->get('headmeta')->setProperty('og:description', $config['description']);
		$vhm->get('headmeta')->setProperty('og:site_name',   $config['site_name']);
		$vhm->get('headmeta')->setProperty('og:type', 		 $config['type']);
	}

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
				'Facebook' => 'Facebook\Service\Factory\Facebook',
			)
		);
	}

	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(

				// basic FB JS SDK
				'facebookJssdk' => function($sm) {
					$helper = new Jssdk();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},

				// oauth link
				'facebookOauth' => function($sm) {
					$helper = new Oauth();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				// social plugins below
				'facebookLikebox' => function($sm) {
					$helper = new LikeBox();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookFollow' => function($sm) {
					$helper = new Follow();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookFacepile' => function($sm) {
					$helper = new Facepile();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookLike' => function($sm) {
					$helper = new Like();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookLogin' => function($sm) {
					$helper = new Login();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookActivity' => function($sm) {
					$helper = new Activity();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookSend' => function($sm) {
					$helper = new Send();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				},
				'facebookComments' => function($sm) {
					$helper = new Comments();
					$helper->setFacebookService($sm->getServiceLocator()->get('Facebook'));
					return $helper;
				}
			)
		);
	}

	public function getConfig()
	{
		$moduleConfig   = include __DIR__ . '/config/module.config.php';
		$facebookConfig = include __DIR__ . '/config/facebook.config.php';
		return array_merge_recursive($moduleConfig, $facebookConfig);
	}
}
