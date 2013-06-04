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
