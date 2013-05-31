<?php
namespace FacebookTest\View;

use Facebook\View\Helper\Comments;

class CommentsTest extends ViewhelperTestcase
{
	public function testInvoke()
	{
		$entity = new Comments();
		$this->doTestInvoke($entity);
	}
}
