<?php

namespace Ipverwaltung\Model\AccesspointIp;
use Zend\InputFilter\InputFilter;

class AccesspointIpInputFilter extends InputFilter
{

    public function __construct()
    {
        parent::__construct();
		$this->add(array(
            'name' => 'accesspointIpId',
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
                        'max' => 4294967295
                        )
                    )
                )
            ));
		$this->add(array(
            'name' => 'accesspoint',
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
                        'max' => 16777215
                        )
                    )
                )
            ));
		$this->add(array(
            'name' => 'ip',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits')
                ),
            'validators' => array(array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 0,
                        'max' => '15'
                        )
                    ))
            ));
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
	}
}
