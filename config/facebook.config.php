<?php
return array(
	'facebook' => array(
		'locale' => 'en_US',
		'appId' => '',
		'secret' => '',
		'channelUrl' => '',
		'facebookPageUrl' => '',

		// oauth for app usage
		'oauth' => array(
			'redirect_uri' => '',   # see https://developers.facebook.com/docs/reference/php/facebook-getLoginUrl/
			'scope' => '',   # see https://developers.facebook.com/docs/reference/login/#permissions
			'classes' => '', # css classes for <a> tag
			'id' => '', # id attribute for <a> tag
			'link_text' => 'Login with Facebook', # link text being shown in link to oauth
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
			'data-layout' => 'standard',
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