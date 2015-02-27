<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Table tl_layout
 */
$tl_content = &$GLOBALS['TL_DCA']['tl_content'];

//Header Fields
if ($tl_content['config']['ptable'] === 'tl_article') {

	array_insert($tl_content['list']['sorting']['headerFields'], 4, array('deviceSelect'));
}
