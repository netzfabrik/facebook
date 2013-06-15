<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Jssdk;

class JssdkTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Jssdk();
		$this->doTestInvoke($entity);
	}
}
