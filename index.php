<?php

$phpVersion = phpversion();
if (version_compare($phpVersion, '8.1.11', '<'))
{
	die("PHP 8.1.11 or newer is required. $phpVersion does not meet this requirement. Please ask your host to upgrade PHP.");
}

$dir = __DIR__;
require($dir . '/src/XF.php');

XF::start($dir);

if (\XF::requestUrlMatchesApi())
{
	\XF::runApp('XF\Api\App');
}
else
{
	\XF::runApp('XF\Pub\App');
}