<?php

namespace Ipverwaltung\Model\Ansprechpartner;
use Zend\InputFilter\InputFilter;

class AnsprechpartnerInputFilter extends InputFilter
{

    public function __construct()
    {
		$this->add(array(
            'name' => 'ansprechpartnerId',
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
		$this->add(array(
            'name' => 'nachname',
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
                        'max' => '50'
                        )
                    ))
            ));
		$this->add(array(
            'name' => 'vorname',
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
                        'max' => '45'
                        )
                    ))
            ));
		$this->add(array(
            'name' => 'email',
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
            'name' => 'sprache',
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
                        'max' => '2'
                        )
                    ))
            ));
		$this->add(array(
            'name' => 'telefonnummer',
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
                        'max' => '45'
                        )
                    ))
            ));
	}
}
