<?php

namespace Ipverwaltung\Model\Accesspoint;

interface AccesspointInterface
{
	public function getAccesspointId();
	public function setAccesspointId($accesspointId);
	public function getName();
	public function setName($name);
	public function getSeriennummer();
	public function setSeriennummer($seriennummer);
	public function getBemerkung();
	public function setBemerkung($bemerkung);
	public function getTypId();
	public function setTypId($typId);
	public function getStandortId();
	public function setStandortId($standortId);
}