<?php

namespace Ipverwaltung\Model\Typ;

interface TypInterface
{
	public function getTypId();
	public function setTypId($typId);
	public function getArt();
	public function setArt($art);
	public function getBezeichnung();
	public function setBezeichnung($bezeichnung);
}