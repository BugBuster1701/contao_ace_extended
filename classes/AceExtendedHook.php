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
 * Run in a custom namespace, so the class can be replaced
 */
namespace BugBuster\AceExtended;

/**
 * Class AceExtendedHook 
 *
 * @copyright  Glen Langer 2014 <http://www.contao.glen-langer.de>
 * @author     Glen Langer (BugBuster)
 * @package    Ace_extended
 * @license    LGPL 
 */
class AceExtendedHook extends \Backend
{
    private $addJsTextareaSize = "
<script>
window.addEvent('domready', function() {
    $$('.ace_editor').each(function(editor) {
        editor.env.editor.setOptions({
            maxLines: 30,     // maximal number of displayed lines 
            minLines: 10,     // minimal number of displayed lines
            autoScrollEditorIntoView: true  
          // this is needed if editor is inside of scrollable page
        });
    })
});
</script>
";
    
    /**
     * Initialize the object, import the user class
     */
    function __construct ()
    {
        $this->import('BackendUser', 'User');
        parent::__construct();
    }
    
    /**
     * Add content to the be_main Template
     * 
     * @param string $strContent
     * @param string $strTemplate
     * @return string
     */
    public function addBeTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'be_main') {
            $strContent = str_replace('</body>', $this->addJsTextareaSize . '</body>', $strContent);
        }
        return $strContent;
    }
}
