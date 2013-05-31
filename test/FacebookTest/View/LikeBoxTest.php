<?php
namespace FacebookTest\View;

use Facebook\View\Helper\LikeBox;

class LikeBoxTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new LikeBox();
		$this->doTestInvoke($entity);
	}

	public function testInvokeWithoutPage()
	{
		$entity = new LikeBox();
		$config = $this->getConfig();
		$config->get('facebook')->offsetSet('facebookPageUrl', '');
		$res = $this->doTestInvoke($entity);

		$this->assertEmpty($res);
	}
}
