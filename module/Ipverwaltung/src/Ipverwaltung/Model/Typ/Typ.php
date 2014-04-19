<?php

namespace Ipverwaltung\Model\Typ;
use Ipverwaltung\Model\ModelInterface;

class Typ implements TypInterface, ModelInterface
{
	protected $typId;
	protected $art;
	protected $bezeichnung;

	public function getTypId()
	{
		return $this->typId;
	}

	public function setTypId($typId)
	{
		$this->typId = $typId;
		return $this;
	}

	public function getArt()
	{
		return $this->art;
	}

	public function setArt($art)
	{
		$this->art = $art;
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
		if(isset($data['typId'])) $this->setTypId($data['typId']);
		if(isset($data['art'])) $this->setArt($data['art']);
		if(isset($data['bezeichnung'])) $this->setBezeichnung($data['bezeichnung']);
	}

	public function toArray()
	{
		$data = array();
		$data['typId'] = $this->getTypId();
		$data['art'] = $this->getArt();
		$data['bezeichnung'] = $this->getBezeichnung();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'typId',
);
	}

}