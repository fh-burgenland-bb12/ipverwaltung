<?php

namespace Ipverwaltung\Model\Vlan;
use Zend\InputFilter\InputFilter;

class VlanInputFilter extends InputFilter
{

    public function __construct()
    {
		$this->add(array(
            'name' => 'vlanId',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits')
                ),
            'validators' => array(
                array('name' => 'Digits'),
                array(
                    'name' => 'Between',
                    'options' => array(
                        'min' => 0,
                        'max' => 65535
                        )
                    )
                )
            ));
		$this->add(array(
            'name' => 'bezeichnung',
            'required' => false,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits')
                ),
            'validators' => array(array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 0,
                        'max' => '70'
                        )
                    ))
            ));
	}
}
