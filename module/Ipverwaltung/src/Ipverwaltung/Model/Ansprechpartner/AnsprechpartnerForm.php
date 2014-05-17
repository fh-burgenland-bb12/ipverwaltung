<?php

namespace Ipverwaltung\Model\Ansprechpartner;
use Zend\Form\Form;
use Zend\Form\Element;

class AnsprechpartnerForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$ansprechpartnerId = new Element\Number('ansprechpartnerId');
		$ansprechpartnerId->setLabel('AnsprechpartnerId');
		$ansprechpartnerId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($ansprechpartnerId);
		$standortId = new Element\Number('standortId');
		$standortId->setLabel('StandortId');
		$standortId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($standortId);
		$nachname = new Element\Text('nachname');
		$nachname->setLabel('Nachname');
		$nachname->setAttributes(array('type' => 'text'));
		$this->add($nachname);
		$vorname = new Element\Text('vorname');
		$vorname->setLabel('Vorname');
		$vorname->setAttributes(array('type' => 'text'));
		$this->add($vorname);
		$email = new Element\Text('email');
		$email->setLabel('Email');
		$email->setAttributes(array('type' => 'text'));
		$this->add($email);
		$sprache = new Element\Text('sprache');
		$sprache->setLabel('Sprache');
		$sprache->setAttributes(array('type' => 'text'));
		$this->add($sprache);
		$telefonnummer = new Element\Text('telefonnummer');
		$telefonnummer->setLabel('Telefonnummer');
		$telefonnummer->setAttributes(array('type' => 'text'));
		$this->add($telefonnummer);
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