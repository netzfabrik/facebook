<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Jssdk;

class JssdkTest extends ViewhelperTestcase
{
/**
	 * Facebook tries to set cookies on construct. We need a separate
	 * process to avoid "headers already sent" errors.
	 * @runInSeparateProcess
	 */
	public function testInvoke()
	{
		$entity = new Jssdk();
		$this->doTestInvoke($entity);
	}
}
