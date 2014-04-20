<?php

namespace Ipverwaltung\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class DataController extends AbstractActionController
{
    public function editAction()
    {

    }


    public function addAction()
    {
        $type = $this->params()->fromRoute('type','Standort');


        $datatable = $this->getServiceLocator()->get('Ipverwaltung\\Model\\'.$type.'\\'.$type.'Table');
        $formclass = 'Ipverwaltung\\Model\\'.$type.'\\'.$type.'Form';
        $form = new $formclass();
    }
}
