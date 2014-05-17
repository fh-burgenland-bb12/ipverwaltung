<?php

namespace Ipverwaltung\Model\Server;
use Zend\InputFilter\InputFilter;

class ServerInputFilter extends InputFilter
{

    public function __construct()
    {
        parent::__construct();
		$this->add(array(
            'name' => 'serverId',
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
            'name' => 'name',
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
                        'max' => '150'
                        )
                    ))
            ));
		$this->add(array(
            'name' => 'beschreibung',
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
                        'max' => '250'
                        )
                    ))
            ));
		$this->add(array(
            'name' => 'vlanId',
            'required' => false,
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
            'name' => 'standortId',
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
