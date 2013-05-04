<?php

/**
 * Konata prehled (version 1.0 released on 4.5.2013, http://www.konata.cz)
 *
 * Copyright (c) 2013 Václav Vrbka (aurielle@aurielle.cz)
 *
 * For the full copyright and license information, please view
 * the file license.md that was distributed with this source code.
 */

/**
 * IMPORTANT!
 *
 * Modify this file and save it as config.php. Don't modify other files unless you know what are you doing.
 * You can adjust the look of generated HTML by modifying the template - file template.latte.
 */

// This would be the source for the overview, in CSV/TXT format, delimiter is ; (semicolon), must be in UTF-8
$file = __DIR__ . '/prehled.csv';

// Where to put generated HTML
$out = __DIR__ . '/output.html';

// Name of the template file
$template = __DIR__ . '/template.latte';

// Image extensions
$imageExt = '.jpg';

// Prefix for images, that means string that would be in front of image filename (typically URL to konata.cz)
$imagePrefix = 'http://www.konata.cz/wp-content/gallery/asdf/';

// Is there a heading describing each column? If yes, you will be able to access each column by its name.
$hasHeading = TRUE;