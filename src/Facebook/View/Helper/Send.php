<?php
namespace Facebook\View\Helper;

class Send extends AbstractHelper
{
	/**
	 * View helper invoke
	 */
	public function __invoke()
	{
		return $this->getView()->render('helper/send.phtml');
	}
}
