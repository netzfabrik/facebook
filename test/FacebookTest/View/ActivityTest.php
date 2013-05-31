<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Activity;

class ActivityTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Activity();
		$this->doTestInvoke($entity);
	}
}
