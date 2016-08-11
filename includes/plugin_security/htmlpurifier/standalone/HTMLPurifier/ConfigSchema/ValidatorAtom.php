<?php 
/** 
  * Copyright: dtbaker 2012
  * Licence: Please check CodeCanyon.net for licence details. 
  * More licence clarification available here:  http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
  * Deploy: 8355 2b2c359eb59e7773b80f07b9b4ee60fe
  * Envato: 9c900e67-0d83-4654-a65d-64710ffc8468
  * Package Date: 2016-07-19 00:42:15 
  * IP Address: 192.168.1.161
  */

/**
 * Fluent interface for validating the contents of member variables.
 * This should be immutable. See HTMLPurifier_ConfigSchema_Validator for
 * use-cases. We name this an 'atom' because it's ONLY for validations that
 * are independent and usually scalar.
 */
class HTMLPurifier_ConfigSchema_ValidatorAtom
{

    protected $context, $obj, $member, $contents;

    public function __construct($context, $obj, $member) {
        $this->context     = $context;
        $this->obj         = $obj;
        $this->member      = $member;
        $this->contents    =& $obj->$member;
    }

    public function assertIsString() {
        if (!is_string($this->contents)) $this->error('must be a string');
        return $this;
    }

    public function assertIsBool() {
        if (!is_bool($this->contents)) $this->error('must be a boolean');
        return $this;
    }

    public function assertIsArray() {
        if (!is_array($this->contents)) $this->error('must be an array');
        return $this;
    }

    public function assertNotNull() {
        if ($this->contents === null) $this->error('must not be null');
        return $this;
    }

    public function assertAlnum() {
        $this->assertIsString();
        if (!ctype_alnum($this->contents)) $this->error('must be alphanumeric');
        return $this;
    }

    public function assertNotEmpty() {
        if (empty($this->contents)) $this->error('must not be empty');
        return $this;
    }

    public function assertIsLookup() {
        $this->assertIsArray();
        foreach ($this->contents as $v) {
            if ($v !== true) $this->error('must be a lookup array');
        }
        return $this;
    }

    protected function error($msg) {
        throw new HTMLPurifier_ConfigSchema_Exception(ucfirst($this->member) . ' in ' . $this->context . ' ' . $msg);
    }

}

// vim: et sw=4 sts=4
