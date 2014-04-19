<?php

namespace Ipverwaltung\Model\Land;
use Zend\Form\Form;
use Zend\Form\Element;

class LandForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$landId = new Element\Number('landId');
		$landId->setLabel('LandId');
		$landId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($landId);
		$iso = new Element\Text('iso');
		$iso->setLabel('Iso');
		$iso->setAttributes(array (
  'type' => 'text',
));
		$this->add($iso);
		$bezeichnung = new Element\Text('bezeichnung');
		$bezeichnung->setLabel('Bezeichnung');
		$bezeichnung->setAttributes(array (
  'type' => 'text',
));
		$this->add($bezeichnung);
            $send = new Element('submit');
            $send->setLabel('');
            $send->setValue('Submit');
            $send->setAttributes(array(
                'type'  => 'submit'
            ));

            $this->add($send);

            $csrf = new Element\Csrf('csrf');
            $this->add($csrf);
	}
}