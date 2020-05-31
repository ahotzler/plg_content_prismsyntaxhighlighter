<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.prismsyntaxhighlighte
 *
 * @copyright   Copyright (C) 2018 Andre Hotzler. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class plgContentprismsyntaxhighlighter extends JPlugin
	{
		public function onContentPrepare($context, &$article, &$params, $page = 0)
			{
				$regex = '/<pre class=".*language-.*>/i';
				preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);
				if ($matches)
					{
						$app = JFactory::getApplication();
						if ($app->isClient('site'))
							{
								$document = JFactory::getDocument();
								$document->addStyleSheet(JURI::base($pathonly=true).'/media/plg_content_prismsyntaxhighlighter/css/prism-' . $this->params->def('prismstyle','default') .'.css');
								$document->addStyleSheet(JURI::base($pathonly=true).'/media/plg_content_prismsyntaxhighlighter/css/prism-linenumbers.css');
								$document->addScript(JURI::base($pathonly=true).'/media/plg_content_prismsyntaxhighlighter/js/prism-' . $this->params->def('prismtype','tinymce') . '.js');
							}
					}
			}
	}
?>


