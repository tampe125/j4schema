<?php
/**
 * @package 	J4Schema
 * @copyright 	Copyright (c)2011 Davide Tampellini
 * @license 	GNU General Public License version 3, or later
 */

defined('_JEXEC') or die();

class J4schemaToolbar extends FOFToolbar
{
	function onAuthorsBrowse()
	{
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton('Confirm', JText::_('COM_J4SCHEMA_CONFIRM_SYNC_AUTH'), 'refresh', JText::_('COM_J4SCHEMA_SYNC_AUTH'), 'synchAuthors', false);

		JToolBarHelper::divider();

		parent::onBrowse();
	}

	function onEditors()
	{
		return true;
	}

	function onOverridesBrowse()
	{
		// Set toolbar title
		if($this->input instanceof FOFInput) {
		    $option = $this->input->getString('option', 'com_foobar');
		    $view 	= $this->input->getString('view', 'cpanel');
		} else {
		    $option = FOFInput::getCmd('option','com_foobar',$this->input);
		    $view	= FOFInput::getCmd('view','cpanel',$this->input);
		}

		$subtitle_key = $option.'_TITLE_'.strtoupper($view);
		JToolBarHelper::title(JText::_($option).' &ndash; <small>'.JText::_($subtitle_key).'</small>', str_replace('com_', '', $option));

		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton('Confirm', JText::_('COM_J4SCHEMA_CONFIRM_OVERRIDES'), 'new-style', JText::_('COM_J4SCHEMA_COPY_OVERRIDES'), 'copyOverrides', false);

		$this->renderSubmenu();
	}
}