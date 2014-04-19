<?php

namespace Ipverwaltung\Model\Ansprechpartner;
use Ipverwaltung\Model\ModelInterface;

class Ansprechpartner implements AnsprechpartnerInterface, ModelInterface
{
	protected $ansprechpartnerId;
	protected $standortId;
	protected $nachname;
	protected $vorname;
	protected $email;
	protected $sprache;
	protected $telefonnummer;

	public function getAnsprechpartnerId()
	{
		return $this->ansprechpartnerId;
	}

	public function setAnsprechpartnerId($ansprechpartnerId)
	{
		$this->ansprechpartnerId = $ansprechpartnerId;
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

	public function getNachname()
	{
		return $this->nachname;
	}

	public function setNachname($nachname)
	{
		$this->nachname = $nachname;
		return $this;
	}

	public function getVorname()
	{
		return $this->vorname;
	}

	public function setVorname($vorname)
	{
		$this->vorname = $vorname;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getSprache()
	{
		return $this->sprache;
	}

	public function setSprache($sprache)
	{
		$this->sprache = $sprache;
		return $this;
	}

	public function getTelefonnummer()
	{
		return $this->telefonnummer;
	}

	public function setTelefonnummer($telefonnummer)
	{
		$this->telefonnummer = $telefonnummer;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['ansprechpartnerId'])) $this->setAnsprechpartnerId($data['ansprechpartnerId']);
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
		if(isset($data['nachname'])) $this->setNachname($data['nachname']);
		if(isset($data['vorname'])) $this->setVorname($data['vorname']);
		if(isset($data['email'])) $this->setEmail($data['email']);
		if(isset($data['sprache'])) $this->setSprache($data['sprache']);
		if(isset($data['telefonnummer'])) $this->setTelefonnummer($data['telefonnummer']);
	}

	public function toArray()
	{
		$data = array();
		$data['ansprechpartnerId'] = $this->getAnsprechpartnerId();
		$data['standortId'] = $this->getStandortId();
		$data['nachname'] = $this->getNachname();
		$data['vorname'] = $this->getVorname();
		$data['email'] = $this->getEmail();
		$data['sprache'] = $this->getSprache();
		$data['telefonnummer'] = $this->getTelefonnummer();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'ansprechpartnerId',
);
	}

}