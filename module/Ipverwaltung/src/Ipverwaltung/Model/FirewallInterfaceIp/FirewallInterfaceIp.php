<?php

namespace Ipverwaltung\Model\FirewallInterfaceIp;
use Ipverwaltung\Model\ModelInterface;

class FirewallInterfaceIp implements FirewallInterfaceIpInterface, ModelInterface
{
	protected $interfaceId;
	protected $ipadresse;
	protected $vlanId;

	public function getInterfaceId()
	{
		return $this->interfaceId;
	}

	public function setInterfaceId($interfaceId)
	{
		$this->interfaceId = $interfaceId;
		return $this;
	}

	public function getIpadresse()
	{
		return $this->ipadresse;
	}

	public function setIpadresse($ipadresse)
	{
		$this->ipadresse = $ipadresse;
		return $this;
	}

	public function getVlanId()
	{
		return $this->vlanId;
	}

	public function setVlanId($vlanId)
	{
		$this->vlanId = $vlanId;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['interfaceId'])) $this->setInterfaceId($data['interfaceId']);
		if(isset($data['ipadresse'])) $this->setIpadresse($data['ipadresse']);
		if(isset($data['vlanId'])) $this->setVlanId($data['vlanId']);
	}

	public function toArray()
	{
		$data = array();
		$data['interfaceId'] = $this->getInterfaceId();
		$data['ipadresse'] = $this->getIpadresse();
		$data['vlanId'] = $this->getVlanId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'interfaceId',
  1 => 'ipadresse',
);
	}

}