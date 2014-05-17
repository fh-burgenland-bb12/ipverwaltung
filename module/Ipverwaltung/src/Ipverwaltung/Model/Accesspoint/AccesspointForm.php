<?php

namespace Ipverwaltung\Model\Accesspoint;
use Zend\Form\Form;
use Zend\Form\Element;

class AccesspointForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$accesspointId = new Element\Number('accesspointId');
		$accesspointId->setLabel('AccesspointId');
		$accesspointId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($accesspointId);
		$name = new Element\Text('name');
		$name->setLabel('Name');
		$name->setAttributes(array('type' => 'text'));
		$this->add($name);
		$seriennummer = new Element\Text('seriennummer');
		$seriennummer->setLabel('Seriennummer');
		$seriennummer->setAttributes(array('type' => 'text'));
		$this->add($seriennummer);
		$bemerkung = new Element\Text('bemerkung');
		$bemerkung->setLabel('Bemerkung');
		$bemerkung->setAttributes(array('type' => 'text'));
		$this->add($bemerkung);
		$typId = new Element\Number('typId');
		$typId->setLabel('TypId');
		$typId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($typId);
		$standortId = new Element\Number('standortId');
		$standortId->setLabel('StandortId');
		$standortId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($standortId);
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