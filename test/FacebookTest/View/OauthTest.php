<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Oauth;

class OauthTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$_SERVER['HTTP_HOST'] = 'localhost'; // needed to avoid undefined index error
		$_SERVER['REQUEST_URI'] = 'http://localhost'; // needed to avoid undefined index error
		$entity = new Oauth();
		$this->doTestInvoke($entity);
	}
}
