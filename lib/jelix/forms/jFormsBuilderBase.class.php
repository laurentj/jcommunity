<?php
/**
* @package     jelix
* @subpackage  forms
* @author      Laurent Jouanneau
* @contributor Loic Mathaud, Dominique Papin
* @copyright   2006-2007 Laurent Jouanneau, 2007 Dominique Papin
* @copyright   2007 Loic Mathaud
* @link        http://www.jelix.org
* @licence     http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

/**
 * base class of all builder form classes generated by the jform compiler.
 *
 * a builder form class is a class which help to generate a form for the output
 * (html form for example)
 * @package     jelix
 * @subpackage  forms
 */
abstract class jFormsBuilderBase {
    /**
     * a form object
     * @var jFormsBase
     */
    protected $_form;

    /**
     * the action selector
     * @var string
     */
    protected $_action;

    /**
     * params for the action
     * @var array
     */
    protected $_actionParams = array();

    /**
     * form name
     */
    protected $_name;

    protected $_endt = '/>';
    /**
     * @param jFormsBase $form a form object
     * @param string $action action selector where form will be submit
     * @param array $actionParams  parameters for the action
     */
    public function __construct($form, $action, $actionParams){
        $this->_form = $form;
        $this->_action = $action;
        $this->_actionParams = $actionParams;
        $this->_name = jFormsBuilderBase::generateFormName();
        if($GLOBALS['gJCoord']->response!= null && $GLOBALS['gJCoord']->response->getType() == 'html'){
            $this->_endt = ($GLOBALS['gJCoord']->response->isXhtml()?'/>':'>');
        }
    }

    public function getName(){ return  $this->_name; }

    /**
     * output the header content of the form
     * @param array $params some parameters, depending of the type of builder
     */
    abstract public function outputHeader($params);

    /**
     * output the footer content of the form
     */
    abstract public function outputFooter();

    /**
     * displays the content corresponding of the given control
     * @param jFormsControl $ctrl the control to display
     */
    abstract public function outputControl($ctrl);

    /**
     * displays the label corresponding of the given control
     * @param jFormsControl $ctrl the control to display
     */
    abstract public function outputControlLabel($ctrl);

    /**
     * generates a name for the form
     */
    public static function generateFormName(){
        static $number = 0;
        $number++;
        return 'jform'.$number;
    }
}

?>