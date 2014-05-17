<?php

namespace Ipverwaltung\Model\Firewall;
use Zend\InputFilter\InputFilter;

class FirewallInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(array(
            'name' => 'FirewallId',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits'),
            ),
            'validators' => array(
                array('name' => 'Digits'),
                array('name' => 'Between', options => array('min' => 0, 'max' => 16777215)),
            ),
        ));

        $this->add(array(
            'name' => 'typId',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'Digits'),
                array('name' => 'Between', options => array('min' => 0, 'max' => 65535)),
            ),
        ));

        $this->add(array(
            'name' => 'seriennummer',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'StringLength', options => array('min' => 3, 'max' => 45)),
            ),
        ));

        $this->add(array(
            'name' => 'inventarnummer',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'StringLength', options => array('min' => 3, 'max' => 45)),
            ),
        ));

        $this->add(array(
            'name' => 'lieferdatum',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                //array('name' => 'DateTimeFormatter', 'format' => '%Y-%m-%d'),
            ),
            'validators' => array(
                array('name' => 'Date', 'format' => '%Y-%m-%d'),
            ),
        ));

        $this->add(array(
            'name' => 'managementIp',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'Ip'),
            ),
        ));

        $this->add(array(
            'name' => 'gateway',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'Ip'),
            ),
        ));

        $this->add(array(
            'name' => 'bemerkung',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'StringLength', options => array('min' => 3, 'max' => 500)),
            ),
        ));

        $this->add(array(
            'name' => 'proxyIp',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'Ip'),
            ),
        ));

        $this->add(array(
            'name' => 'proxyport',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits'),
            ),
            'validators' => array(
                array('name' => 'Digits'),
                array('name' => 'Between', options => array('min' => 0, 'max' => 65535)),
            ),
        ));

        $this->add(array(
            'name' => 'standortId',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits'),
            ),
            'validators' => array(
                array('name' => 'Digits'),
                array('name' => 'Between', options => array('min' => 0, 'max' => 65535)),
            ),
        ));
    }
}