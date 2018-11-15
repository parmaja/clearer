<?php
/**
 * Info Plugin: Displays information about various DokuWiki internals without "start" page
 * Based on: nslist plugin by Andreas Gohr <andi@splitbrain.org>
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Zaher Dirkey <zaherdirkey@yahoo.com>
 * @similar to http://www.dokuwiki.org/plugin:clearfloat
 * @desc use \\\ at end of line to add clearer tag with break
 * url: http://www.dokuwiki.org/plugin:clearer
 */

/*todo
  add carrier return for windows file \n?\r
*/

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

class syntax_plugin_clearer extends DokuWiki_Syntax_Plugin {

  function getInfo(){
        return array(
            'author' => 'Zaher Dirkey',
            'email'  => 'zaherdirkey@yahoo.com',
            'date'   => '2012-06-4',
            'name'   => 'Clearer',
            'desc'   => 'Add clearer div class using \\\ chars before new line char.',
            'url'    => 'http://dokuwiki.org/plugin:clearer',
        );
    }
    function getType(){
        return 'substition';
    }
    function getPType(){
        return 'block';
    }
    function getSort(){
        return 138;
    }
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('\x5C{3}\n', $mode, 'plugin_clearer');
    }
    function handle($match, $state, $pos, Doku_Handler $handler){
        return array($match, $state, $pos);
    }
    function render($mode, &$renderer, $data) {
            if ($mode == 'xhtml') {
         $renderer->doc .= '<div class="clearer" ></div>';
        return true;
      }
      return false;
    }
}
