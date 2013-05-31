<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Like;

class LikeTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Like();
		$this->doTestInvoke($entity);
	}
}
