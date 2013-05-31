<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Send;

class SendTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Send();
		$this->doTestInvoke($entity);
	}
}
