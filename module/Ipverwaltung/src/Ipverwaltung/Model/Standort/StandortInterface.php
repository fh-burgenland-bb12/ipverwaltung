<?php

namespace Ipverwaltung\Model\Standort;

interface StandortInterface
{
	public function getStandortId();
	public function setStandortId($standortId);
	public function getBezeichnung();
	public function setBezeichnung($bezeichnung);
	public function getAdresse();
	public function setAdresse($adresse);
	public function getFirmaId();
	public function setFirmaId($firmaId);
	public function getLandId();
	public function setLandId($landId);
	public function getGpscoords();
	public function setGpscoords($gpscoords);
}