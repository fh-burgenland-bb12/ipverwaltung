<?php

namespace Ipverwaltung\Model\Land;

interface LandInterface
{
	public function getLandId();
	public function setLandId($landId);
	public function getIso();
	public function setIso($iso);
	public function getBezeichnung();
	public function setBezeichnung($bezeichnung);
}