<?php
/**
* @package      jcommunity
* @author       Laurent Jouanneau <laurent@jelix.org>
* @copyright    2015 Laurent Jouanneau
* @link         http://jelix.org
* @licence      http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
*/
namespace Jelix\JCommunity;

class Config {

    protected $responseType = 'html';

    protected $registrationEnabled = true;

    protected $resetPasswordEnabled = true;

    /**
     */
    function __construct() {
        $config = (isset(\jApp::config()->jcommunity)?\jApp::config()->jcommunity:null);
        if ($config) {
            if (isset($config['loginResponse'])) {
                $this->responseType = $config['loginResponse'];
            }
        }
        if (class_exists('jPref')) {
            $pref = \jPref::get('jcommunity_registrationEnabled');
            if ($pref !== null) {
                $this->registrationEnabled = $pref;
            }
            $pref = \jPref::get('jcommunity_resetPasswordEnabled');
            if ($pref !== null) {
                $this->resetPasswordEnabled = $pref;
            }
        }
        else if ($config) {
            if (isset($config['registrationEnabled'])) {
                $this->registrationEnabled = !!$config['registrationEnabled'];
            }
            if (isset($config['resetPasswordEnabled'])) {
                $this->resetPasswordEnabled = !!$config['resetPasswordEnabled'];
            }
        }
    }

    function getResponseType() {
        return $this->responseType;
    }

    function isRegistrationEnabled() {
        return $this->registrationEnabled;
    }

    function isResetPasswordEnabled() {
        return $this->resetPasswordEnabled;
    }
}