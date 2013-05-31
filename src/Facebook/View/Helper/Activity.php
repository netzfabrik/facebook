<?php
namespace Facebook\View\Helper;

class Activity extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		return $this->getView()->render('helper/activity.phtml');
	}
}
