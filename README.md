Facebook integration module 
===========================

This Zend Framework 2 module provides several view helpers for easy integration of the Facebook social plugins. There is a view helper that includes the Facebook JS SDK in frontend. You can configure each of the plugins available indivdually. Additionally an OAuth dialog link can easily be added to your application.

## Installation

Simply add the module by adding the repository to your composer.json file:

	{
		"repositories": [
	        {
	            "type": "vcs",
	            "url": "https://github.com/netzfabrik/facebook"
	        }
	    ],
	    "require": {
	        "netzfabrik/facebook": "1.1.0"
	    }
	}	

Afterwards run an update to fetch the module to your vendor path

	composer update

Add the new module to your application.config and you are done.

	return array(
		'modules' => array(
			'<some_module>',
			'<another_module>',
			'Facebook'
		),

## Configuration

There is a configuration for the module providing settings for your Facebook connectivity in general (appId, secret, etc). All social plugins have their own configuration part. Check the configuration file located at `vendor/netzfabrik/facebook/config/facebook.config.php`. You can simply put a new configuration file to your application config and override values as desired. 

For example `config/autoload/facebook.local.php` in your application root should do the job:

	return array(
		'facebook' => array(
			'locale' => 'en_US',
			'appId' => '1234567',
			'secret' => '654321',
			'facebookPageUrl' => 'http://www.facebook.com/pages/1234567',
			'likebox' => array(
				'data-width' => 292,
				'data-show-faces' => 'false',
			),
			'facepile' => array(
				'data-max-rows' => 1,
				'data-width' => 300
			),
		)
	);

## Add JS SDK to layout

To make the module work correctly, you have to append the Facebook JS SDK in your layout somewhere. This can be done using the view helper `facebookJssdk`:

	<html>
	<head>
	 <title>My Page using Facebook plugins</title>
	</head>
	 <body>
	  <h1>Welcome!</h1>
	  <?php
		echo $this->facebookJssdk();
	  ?>
	 </body>
	</html>

From now on you should be able to add all social Plugins available in this module.

## Plugins available in this module

The following viewhelpers are available in this module:

`facebookJssdk` : Facebook JS SDK

`facebookOauth` : Create link to [OAuth dialog](https://developers.facebook.com/docs/reference/dialogs/oauth/) for FB-app interaction.

`facebookLikebox` :  [Like Box](https://developers.facebook.com/docs/reference/plugins/like-box)

`facebookFollow` : [Follow Button](https://developers.facebook.com/docs/reference/plugins/follow)

`facebookFacepile` : [Facepile](https://developers.facebook.com/docs/reference/plugins/facepile)

`facebookLike` : [Like Button](https://developers.facebook.com/docs/reference/plugins/like)

`facebookLogin` : [Login Button](https://developers.facebook.com/docs/reference/plugins/login/)

`facebookActivity` : [Activity Feed](https://developers.facebook.com/docs/reference/plugins/activity)

`facebookSend` : [Send Button](https://developers.facebook.com/docs/reference/plugins/send)

`facebookComments` : [Comments](https://developers.facebook.com/docs/reference/plugins/comments)

To include the plugins all you need to do is to invoke the viewhelper in a viewscript. 

	<?php echo $this->facebookSend(); ?>

Optionally you can pass an array wih parameters, that will override the configuration made. For example, if you need a smaller Like Button, you can pass according options when invoking the viewhelper:

	<?php echo $this->facebookLike(array('data-width' => 100)); ?>  