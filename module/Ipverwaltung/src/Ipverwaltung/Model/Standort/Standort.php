<?php

namespace Ipverwaltung\Model\Standort;
use Ipverwaltung\Model\ModelInterface;

class Standort implements StandortInterface, ModelInterface
{
	protected $standortId;
	protected $bezeichnung;
	protected $adresse;
	protected $firmaId;
	protected $landId;
	protected $gpscoords;

	public function getStandortId()
	{
		return $this->standortId;
	}

	public function setStandortId($standortId)
	{
		$this->standortId = $standortId;
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

	public function getAdresse()
	{
		return $this->adresse;
	}

	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;
		return $this;
	}

	public function getFirmaId()
	{
		return $this->firmaId;
	}

	public function setFirmaId($firmaId)
	{
		$this->firmaId = $firmaId;
		return $this;
	}

	public function getLandId()
	{
		return $this->landId;
	}

	public function setLandId($landId)
	{
		$this->landId = $landId;
		return $this;
	}

	public function getGpscoords()
	{
		return $this->gpscoords;
	}

	public function setGpscoords($gpscoords)
	{
		$this->gpscoords = $gpscoords;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
		if(isset($data['bezeichnung'])) $this->setBezeichnung($data['bezeichnung']);
		if(isset($data['adresse'])) $this->setAdresse($data['adresse']);
		if(isset($data['firmaId'])) $this->setFirmaId($data['firmaId']);
		if(isset($data['landId'])) $this->setLandId($data['landId']);
		if(isset($data['gpscoords'])) $this->setGpscoords($data['gpscoords']);
	}

	public function toArray()
	{
		$data = array();
		$data['standortId'] = $this->getStandortId();
		$data['bezeichnung'] = $this->getBezeichnung();
		$data['adresse'] = $this->getAdresse();
		$data['firmaId'] = $this->getFirmaId();
		$data['landId'] = $this->getLandId();
		$data['gpscoords'] = $this->getGpscoords();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'standortId',
);
	}

}