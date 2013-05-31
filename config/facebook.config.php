<?php
return array(
	'facebook' => array(
		'appId' => '',
		'secret' => '',
		'channelUrl' => '',
		'facebookPageUrl' => '',

		// plugin config - see https://developers.facebook.com/docs/plugins/
		'comments' => array(
			'data-width' => 470,
			'data-num-posts' => 10
		),
		'likebox' => array(
			'data-width' => 292,
			'data-show-faces' => 'true',
			'data-stream' => 'true',
			'data-show-border' => 'true',
			'data-header' => 'true'
		),
		'activity' => array(
			'data-width' => 300,
			'data-height' => 300,
			'data-header' => 'true',
			'data-recommendations' => 'false'
		),
		'facepile' => array(
			'data-max-rows' => 1,
			'data-width' => 300
		),
		'follow' => array(
			'data-show-faces' => 'true',
			'data-width' => 450
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