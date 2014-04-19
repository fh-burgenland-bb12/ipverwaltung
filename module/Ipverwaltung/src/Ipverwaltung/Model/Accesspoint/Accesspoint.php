<?php

namespace Ipverwaltung\Model\Accesspoint;
use Ipverwaltung\Model\ModelInterface;

class Accesspoint implements AccesspointInterface, ModelInterface
{
	protected $accesspointId;
	protected $name;
	protected $seriennummer;
	protected $bemerkung;
	protected $typId;
	protected $standortId;

	public function getAccesspointId()
	{
		return $this->accesspointId;
	}

	public function setAccesspointId($accesspointId)
	{
		$this->accesspointId = $accesspointId;
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

	public function getSeriennummer()
	{
		return $this->seriennummer;
	}

	public function setSeriennummer($seriennummer)
	{
		$this->seriennummer = $seriennummer;
		return $this;
	}

	public function getBemerkung()
	{
		return $this->bemerkung;
	}

	public function setBemerkung($bemerkung)
	{
		$this->bemerkung = $bemerkung;
		return $this;
	}

	public function getTypId()
	{
		return $this->typId;
	}

	public function setTypId($typId)
	{
		$this->typId = $typId;
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
		if(isset($data['accesspointId'])) $this->setAccesspointId($data['accesspointId']);
		if(isset($data['name'])) $this->setName($data['name']);
		if(isset($data['seriennummer'])) $this->setSeriennummer($data['seriennummer']);
		if(isset($data['bemerkung'])) $this->setBemerkung($data['bemerkung']);
		if(isset($data['typId'])) $this->setTypId($data['typId']);
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
	}

	public function toArray()
	{
		$data = array();
		$data['accesspointId'] = $this->getAccesspointId();
		$data['name'] = $this->getName();
		$data['seriennummer'] = $this->getSeriennummer();
		$data['bemerkung'] = $this->getBemerkung();
		$data['typId'] = $this->getTypId();
		$data['standortId'] = $this->getStandortId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'accesspointId',
);
	}

}