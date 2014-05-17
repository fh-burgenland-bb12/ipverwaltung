<?php

namespace Ipverwaltung\Model\Typ;
use Zend\Form\Form;
use Zend\Form\Element;

class TypForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$typId = new Element\Number('typId');
		$typId->setLabel('TypId');
		$typId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($typId);
		$art = new Element\Select('art');
		$art->setLabel('Art');
		$art->setAttributes(array());
		$art->setValueOptions(array (
  0 => 'FW',
  1 => 'AP',
));
		$this->add($art);
		$bezeichnung = new Element\Text('bezeichnung');
		$bezeichnung->setLabel('Bezeichnung');
		$bezeichnung->setAttributes(array('type' => 'text'));
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