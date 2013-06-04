<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Oauth;

class OauthTest extends ViewhelperTestcase
{
	/**
	 * Facebook tries to set cookies on construct. We need a separate
	 * process to avoid "headers already sent" errors.
	 * @runInSeparateProcess
	 */
	public function testInvoke()
	{
		$_SERVER['HTTP_HOST'] = 'localhost'; // needed to avoid undefined index error
		$_SERVER['REQUEST_URI'] = 'http://localhost'; // needed to avoid undefined index error
		$entity = new Oauth();
		$this->doTestInvoke($entity);
	}
}
