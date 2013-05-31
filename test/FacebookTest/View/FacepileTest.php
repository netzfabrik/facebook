<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Facepile;

class FacepileTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Facepile();
		$this->doTestInvoke($entity);
	}

	public function testInvokeWithoutPage()
	{
		$entity = new Facepile();
		$config = $this->getConfig();
		$config->get('facebook')->offsetSet('facebookPageUrl', '');
		$res = $this->doTestInvoke($entity);

		$this->assertEmpty($res);
	}
}
