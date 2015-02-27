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
 * Table tl_article
 */
$tl_article = &$GLOBALS['TL_DCA']['tl_article'];

// Palettes
foreach ($tl_article['palettes'] as &$pallet) {
	if (!is_array($pallet) && stristr($pallet, 'publish_legend')) {
		$string = '{device_legend:hide},deviceSelect;{publish_legend';

		$pallet = str_replace('{publish_legend', $string, $pallet);
	}
}

//Fields
$fields = array
(
	'deviceSelect' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_article']['deviceSelect'],
		'default'   => '--',
		'exclude'   => true,
		'inputType' => 'select',
		'options'   => array('--', 'desktop', 'mobile', 'phone', 'tablet'),
		'reference' => &$GLOBALS['TL_LANG']['tl_article'],
		'sql'       => "varchar(32) NOT NULL default ''"
	)
);

$tl_article['fields'] = array_merge($tl_article['fields'], $fields);
