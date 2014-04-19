<?php

namespace Ipverwaltung\Model\Vlan;
use Ipverwaltung\Model\ModelInterface;

class Vlan implements VlanInterface, ModelInterface
{
	protected $vlanId;
	protected $bezeichnung;

	public function getVlanId()
	{
		return $this->vlanId;
	}

	public function setVlanId($vlanId)
	{
		$this->vlanId = $vlanId;
		return $this;
	}

	public function getBezeichnung()
	{
		return $this->bezeichnung;
	}

	public function setBezeichnung($bezeichnung)
	{
		$this->bezeichnung = $bezeichnung;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['vlanId'])) $this->setVlanId($data['vlanId']);
		if(isset($data['bezeichnung'])) $this->setBezeichnung($data['bezeichnung']);
	}

	public function toArray()
	{
		$data = array();
		$data['vlanId'] = $this->getVlanId();
		$data['bezeichnung'] = $this->getBezeichnung();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'vlanId',
);
	}

}