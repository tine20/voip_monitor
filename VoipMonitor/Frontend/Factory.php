<?php
/**
 * VoIP Monitor Deamon
 * 
 * @package     VoipMonitor
 * @license     http://www.gnu.org/licenses/agpl.html AGPL Version 3
 * @copyright   Copyright (c) 2010 Metaways Infosystems GmbH (http://www.metaways.de)
 * @author      Lars Kneschke <l.kneschke@metaways.de>
 * @version     $Id$
 */

/**
 * abstract class for VoipMonitor frontends
 * 
 * @package     VoipMonitor
 */
class VoipMonitor_Frontend_Factory
{
    /**
     * constant for Sql contacts backend class
     *
     */
    const ASTERISK = 'Asterisk';
    
    /**
     * constant for LDAP contacts backend class
     *
     */
    const FRITZBOX = 'Fritz';

    /**
     * factory function to return a selected contacts backend class
     *
     * @param   string       $_type
     * @param   Zend_Config  $_config
     * @return  VoipMonitor_Frontend_Abstract
     * @throws  Addressbook_Exception_InvalidArgument if unsupported type was given
     */
    static public function factory($_type, Zend_Config $_config)
    {
        switch (ucfirst(strtolower($_type))) {
            case self::ASTERISK:
                $instance = new VoipMonitor_Frontend_Asterisk($_config);
                break;            
            case self::FRITZ:
                $instance = new VoipMonitor_Frontend_Fritz($_config);
                break;            
            default:
                throw new Addressbook_Exception_InvalidArgument('Unknown backend type (' . $_type . ').');
                break;
        }
        
        return $instance;
    }
}    
