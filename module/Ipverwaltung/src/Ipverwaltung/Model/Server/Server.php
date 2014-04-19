<?php

namespace Ipverwaltung\Model\Server;
use Ipverwaltung\Model\ModelInterface;

class Server implements ServerInterface, ModelInterface
{
	protected $serverId;
	protected $ip;
	protected $name;
	protected $beschreibung;
	protected $vlanId;
	protected $standortId;

	public function getServerId()
	{
		return $this->serverId;
	}

	public function setServerId($serverId)
	{
		$this->serverId = $serverId;
		return $this;
	}

	public function getIp()
	{
		return $this->ip;
	}

	public function setIp($ip)
	{
		$this->ip = $ip;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function getBeschreibung()
	{
		return $this->beschreibung;
	}

	public function setBeschreibung($beschreibung)
	{
		$this->beschreibung = $beschreibung;
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

	public function getStandortId()
	{
		return $this->standortId;
	}

	public function setStandortId($standortId)
	{
		$this->standortId = $standortId;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['serverId'])) $this->setServerId($data['serverId']);
		if(isset($data['ip'])) $this->setIp($data['ip']);
		if(isset($data['name'])) $this->setName($data['name']);
		if(isset($data['beschreibung'])) $this->setBeschreibung($data['beschreibung']);
		if(isset($data['vlanId'])) $this->setVlanId($data['vlanId']);
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
	}

	public function toArray()
	{
		$data = array();
		$data['serverId'] = $this->getServerId();
		$data['ip'] = $this->getIp();
		$data['name'] = $this->getName();
		$data['beschreibung'] = $this->getBeschreibung();
		$data['vlanId'] = $this->getVlanId();
		$data['standortId'] = $this->getStandortId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'serverId',
);
	}

}