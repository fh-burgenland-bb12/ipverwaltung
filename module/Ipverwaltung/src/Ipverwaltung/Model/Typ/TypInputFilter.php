<?php

namespace Ipverwaltung\Model\Typ;
use Zend\InputFilter\InputFilter;

class TypInputFilter extends InputFilter
{

    public function __construct()
    {
        parent::__construct();
		$this->add(array(
            'name' => 'typId',
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
            'name' => 'art',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Digits')
                ),
            'validators' => array(array(
                    'name' => 'InArray',
                    'options' => array('haystack' => array(
                            'FW',
                            'AP'
                            ))
                    ))
            ));
		$this->add(array(
            'name' => 'bezeichnung',
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
                        'max' => '500'
                        )
                    ))
            ));
	}
}
