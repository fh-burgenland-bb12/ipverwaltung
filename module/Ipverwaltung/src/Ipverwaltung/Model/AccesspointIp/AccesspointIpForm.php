<?php

namespace Ipverwaltung\Model\AccesspointIp;
use Zend\Form\Form;
use Zend\Form\Element;

class AccesspointIpForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$accesspointIpId = new Element\Number('accesspointIpId');
		$accesspointIpId->setLabel('AccesspointIpId');
		$accesspointIpId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($accesspointIpId);
		$accesspoint = new Element\Number('accesspoint');
		$accesspoint->setLabel('Accesspoint');
		$accesspoint->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($accesspoint);
		$ip = new Element\Text('ip');
		$ip->setLabel('Ip');
		$ip->setAttributes(array (
  'type' => 'text',
));
		$this->add($ip);
		$vlanId = new Element\Number('vlanId');
		$vlanId->setLabel('VlanId');
		$vlanId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($vlanId);
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