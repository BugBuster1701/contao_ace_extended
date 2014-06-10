<?php
/**
 * Extension for Contao Open Source CMS, Copyright (C) 2005-2014 Leo Feyer
 *
 * Modul ACE Extended
 *
 * @copyright  Glen Langer 2014 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @licence    LGPL
 * @filesource
 * @package    Ace_extended
 * @see	       https://github.com/BugBuster1701/contao_ace_extended
 */

/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 */
if (TL_MODE == 'BE')
{
    
    if ( !( ($_GET['do'] == 'repository_manager' && $_GET['uninstall'] == 'ace_extended') || 
            (strpos($_SERVER['PHP_SELF'], 'contao/install.php') !== false)
          )
       )
    {
        if ($_GET['act'] == 'edit') 
        {
            $GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('AceExtended\AceExtendedHook', 'addBeTemplate');
        }
    }
}
