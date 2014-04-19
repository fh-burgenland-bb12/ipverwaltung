<?php

namespace Ipverwaltung\Model\Land;
use Ipverwaltung\Model\ModelInterface;

class Land implements LandInterface, ModelInterface
{
	protected $landId;
	protected $iso;
	protected $bezeichnung;

	public function getLandId()
	{
		return $this->landId;
	}

	public function setLandId($landId)
	{
		$this->landId = $landId;
		return $this;
	}

	public function getIso()
	{
		return $this->iso;
	}

	public function setIso($iso)
	{
		$this->iso = $iso;
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
		if(isset($data['landId'])) $this->setLandId($data['landId']);
		if(isset($data['iso'])) $this->setIso($data['iso']);
		if(isset($data['bezeichnung'])) $this->setBezeichnung($data['bezeichnung']);
	}

	public function toArray()
	{
		$data = array();
		$data['landId'] = $this->getLandId();
		$data['iso'] = $this->getIso();
		$data['bezeichnung'] = $this->getBezeichnung();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'landId',
);
	}

}