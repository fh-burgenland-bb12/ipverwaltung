<?php

namespace Ipverwaltung\Model;
interface ModelInterface
{

    public function exchangeArray($data);
    public function toArray();
    public function getPrimaryFields();
}
