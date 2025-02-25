<?php

use dokuwiki\Extension\SyntaxPlugin;

/**
 * DokuWiki Plugin dokuflashcard (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author dodotori@dokuwikiforum <dodotori@dokuwikiforum>
 */
class syntax_plugin_dokuflashcard extends SyntaxPlugin
{
	
	

	
	
	
	
	
	
    /** @inheritDoc */
    public function getType()
    {
        return 'protected';
    }

    /** @inheritDoc */
    public function getPType()
    {
        return 'block';
    }

    /** @inheritDoc */
    public function getSort()
    {
        return 32;
    }

    /** @inheritDoc */
    public function connectTo($mode)
    {
       // $this->Lexer->addSpecialPattern('<FIXME>', $mode, 'plugin_dokuflashcard');
        $this->Lexer->addEntryPattern('<flashcard>', $mode, 'plugin_dokuflashcard');
    }

//    /** @inheritDoc */
    public function postConnect()
    {
        $this->Lexer->addExitPattern('</flashcard>', 'plugin_dokuflashcard');
    }

    /** @inheritDoc */
    public function handle($match, $state, $pos, Doku_Handler $handler)
    {
        
	
		switch ($state) {
          case DOKU_LEXER_ENTER :
                return array($state, '');
 
          case DOKU_LEXER_UNMATCHED :  
				return array($state, $match);
				
				
          case DOKU_LEXER_EXIT :       
				return array($state, '');
        }


	
        return array();
		
		
		
		
    }

    /** @inheritDoc */
    public function render($mode, Doku_Renderer $renderer, $data)
    {
        if ($mode !== 'xhtml') {
            return false;
        }

		
		list($state,$match) = $data;
            switch ($state) {
                case DOKU_LEXER_ENTER :      
                    $renderer->doc .= '<div id="cardpanel" class="unflipped"  onclick="flipcard()">Start!</div>';
					$renderer->doc .= '
					<div class="fbuttoncontainer">
					<button class="flashcardbutton" onclick="startcard()">start</button>
     					<button class="flashcardbutton" onclick="randomcard()">random</button>
     					<button class="flashcardbutton" onclick="oldcard()">back</button>
					<button class="flashcardbutton" onclick="newcard()">next</button>
					</div>';
					//$renderer->doc .= '<div id = "carddata">'; 
                    break;
 
                case DOKU_LEXER_UNMATCHED :  
					
                $renderer->doc .= '<div class="carddata">' . $renderer->_xmlEntities($match) . '</div>';

					
                    break;
                case DOKU_LEXER_EXIT :       
                    $renderer->doc .= '</div>'; 
                    break;
		
		
		
		
        return true;
    }
	}
}
