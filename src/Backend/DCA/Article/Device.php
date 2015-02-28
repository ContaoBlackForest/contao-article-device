<?php
/**
 * Contao Article Device
 * Copyright (C) 2015 Sven Baumann
 *
 * PHP version 5
 *
 * @package   contaoblackforest/contao-article-device
 * @file      Device.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   LGPL-3.0+
 * @copyright ContaoBlackforest 2015
 */


namespace ContaoBlackforest\Backend\DCA\Article;


/**
 * Class Device
 *
 * @package ContaoBlackforest\Backend\DCA\Article
 */
class Device extends \Backend
{

	/**
	 * set to the article type if device selected
	 *
	 * @param array
	 *
	 * @return string
	 */
	public function addDeviceVisibility($row, $label)
	{
		$strName = 'tl_article';

		$callback = &$GLOBALS['TL_DCA'][$strName]['list']['label']['label_callback'];

		$reflectionClass = new \ReflectionClass($this);

		foreach ($callback as $k => $v) {
			if ($v == $reflectionClass->name || $v == __FUNCTION__) {
				unset($callback[$k]);
			}
		}
		$callback = array_values($callback);

		$label = static::importStatic($callback[0])
						->$callback[1](
							$row, $label
						);

		if ($row['deviceSelect'] && $row['deviceSelect'] != $GLOBALS['TL_DCA'][$strName]['fields']['deviceSelect']['default']) {
			$label .= '<span style="color:#b3b3b3;">[' . $GLOBALS['TL_LANG'][$strName][$row['deviceSelect']] . ']</span>';
		}

		array_insert($callback, 0, array($reflectionClass->name, __FUNCTION__));

		return $label;
	}

	public function addLabelCallback($table)
	{
		if ($table === 'tl_article') {
			$callback = &$GLOBALS['TL_DCA'][$table]['list']['label']['label_callback'];

			array_insert($callback, 0, array('ContaoBlackforest\Backend\DCA\Article\Device', 'addDeviceVisibility'));
		}
	}
}
