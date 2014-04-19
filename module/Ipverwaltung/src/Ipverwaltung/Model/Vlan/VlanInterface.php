<?php

namespace Ipverwaltung\Model\Vlan;

interface VlanInterface
{
	public function getVlanId();
	public function setVlanId($vlanId);
	public function getBezeichnung();
	public function setBezeichnung($bezeichnung);
}