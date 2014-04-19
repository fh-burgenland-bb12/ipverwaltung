<?php

namespace Ipverwaltung\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ListController extends AbstractActionController
{
    public function viewAction()
    {
        $type = $this->params()->fromRoute('type','Standort');

        $datatable = $this->getServiceLocator()->get('Ipverwaltung\\Model\\'.$type.'\\'.$type.'Table');

        $return = array();
        $return['listname'] = $type;
        $return['table'] = $datatable->fetchAll();
    }
}
