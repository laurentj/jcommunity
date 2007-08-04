<?php
/**
* @package      jcommunity
* @subpackage   
* @author       Laurent Jouanneau <laurent@xulfr.org>
* @contributor
* @copyright    2007 Laurent Jouanneau
* @link         http://jelix.org
* @licence      http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
*/


class registrationSentZone extends jZone {

   protected $_tplname='registration_sent';


    protected function _prepareTpl(){
        $form = jForms::get('registration');
        if($form == null){
            $form = jForms::create('registration');
        }
        $this->_tpl->assign('form',$form->getContainer());

    }

}

?>