<?php

namespace Ipverwaltung\Model\Ansprechpartner;

interface AnsprechpartnerInterface
{
	public function getAnsprechpartnerId();
	public function setAnsprechpartnerId($ansprechpartnerId);
	public function getStandortId();
	public function setStandortId($standortId);
	public function getNachname();
	public function setNachname($nachname);
	public function getVorname();
	public function setVorname($vorname);
	public function getEmail();
	public function setEmail($email);
	public function getSprache();
	public function setSprache($sprache);
	public function getTelefonnummer();
	public function setTelefonnummer($telefonnummer);
}