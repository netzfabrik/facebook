<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Follow;

class FollowTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Follow();
		$this->doTestInvoke($entity);
	}

	public function testInvokeWithoutPage()
	{
		$entity = new Follow();
		$config = $this->getConfig();
		$config->get('facebook')->offsetSet('facebookPageUrl', '');
		$res = $this->doTestInvoke($entity);

		$this->assertEmpty($res);
	}
}
