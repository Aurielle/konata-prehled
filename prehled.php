<?php

/**
 * Konata prehled (version 1.0 released on 4.5.2013, http://www.konata.cz)
 *
 * Copyright (c) 2013 Václav Vrbka (aurielle@aurielle.cz)
 *
 * For the full copyright and license information, please view
 * the file license.md that was distributed with this source code.
 */

require_once __DIR__ . '/vendor/autoload.php';
Nette\Diagnostics\Debugger::enable(FALSE);

if (!file_exists($config = __DIR__ . '/config.php')) {
	echo 'Config file is missing.' . PHP_EOL;
	exit;
}

require_once $config;

$c = Nette\Utils\Strings::normalize(file_get_contents($file));
$c = explode("\n", $c);
$heading = NULL;
$return = array();

if ($hasHeading) {
	$heading = explode(';', array_shift($c));
}

foreach ($c as $anime) {
	$fields = explode(';', $anime);
	if ($hasHeading) {
		$new = array();
		foreach ($fields as $key => $field) {
			$new[$heading[$key]] = $field;
		}

		$return[] = $new;

	} else {
		$return[] = $fields;
	}
}

// template
$template = new Nette\Templating\FileTemplate($template);
$template->registerFilter(new Nette\Latte\Engine());
$template->registerHelperLoader('Nette\Templating\Helpers::loader');

$template->anime = $return;
$template->imagePrefix = $imagePrefix;
$template->imageExt = $imageExt;
$template->save($out);