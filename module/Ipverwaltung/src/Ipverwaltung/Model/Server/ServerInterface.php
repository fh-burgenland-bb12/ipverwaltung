<?php

namespace Ipverwaltung\Model\Server;

interface ServerInterface
{
	public function getServerId();
	public function setServerId($serverId);
	public function getIp();
	public function setIp($ip);
	public function getName();
	public function setName($name);
	public function getBeschreibung();
	public function setBeschreibung($beschreibung);
	public function getVlanId();
	public function setVlanId($vlanId);
	public function getStandortId();
	public function setStandortId($standortId);
}