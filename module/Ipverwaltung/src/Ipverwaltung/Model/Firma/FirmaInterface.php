<?php

namespace Ipverwaltung\Model\Firma;

interface FirmaInterface
{
	public function getFirmaId();
	public function setFirmaId($firmaId);
	public function getName();
	public function setName($name);
}