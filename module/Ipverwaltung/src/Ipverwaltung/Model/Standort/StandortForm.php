<?php

namespace Ipverwaltung\Model\Standort;
use Zend\Form\Form;
use Zend\Form\Element;

class StandortForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$standortId = new Element\Number('standortId');
		$standortId->setLabel('StandortId');
		$standortId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($standortId);
		$bezeichnung = new Element\Text('bezeichnung');
		$bezeichnung->setLabel('Bezeichnung');
		$bezeichnung->setAttributes(array('type' => 'text'));
		$this->add($bezeichnung);
		$adresse = new Element\Text('adresse');
		$adresse->setLabel('Adresse');
		$adresse->setAttributes(array('type' => 'text'));
		$this->add($adresse);
		$firmaId = new Element\Number('firmaId');
		$firmaId->setLabel('FirmaId');
		$firmaId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firmaId);
		$landId = new Element\Number('landId');
		$landId->setLabel('LandId');
		$landId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($landId);
		$gpscoords = new Element\Text('gpscoords');
		$gpscoords->setLabel('Gpscoords');
		$gpscoords->setAttributes(array('type' => 'text'));
		$this->add($gpscoords);
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