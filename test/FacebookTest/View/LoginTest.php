<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Login;

class LoginTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Login();
		$this->doTestInvoke($entity);
	}
}
