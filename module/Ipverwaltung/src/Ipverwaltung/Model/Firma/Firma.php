<?php

namespace Ipverwaltung\Model\Firma;
use Ipverwaltung\Model\ModelInterface;

class Firma implements FirmaInterface, ModelInterface
{
	protected $firmaId;
	protected $name;

	public function getFirmaId()
	{
		return $this->firmaId;
	}

	public function setFirmaId($firmaId)
	{
		$this->firmaId = $firmaId;
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

	public function exchangeArray($data)
	{
		if(isset($data['firmaId'])) $this->setFirmaId($data['firmaId']);
		if(isset($data['name'])) $this->setName($data['name']);
	}

	public function toArray()
	{
		$data = array();
		$data['firmaId'] = $this->getFirmaId();
		$data['name'] = $this->getName();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'firmaId',
);
	}

}