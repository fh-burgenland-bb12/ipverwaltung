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
        $type = $this->params()->fromRoute('type', 'Standort');
        $return = array();
        $return['type'] = $type;
        $datatable = $this->getServiceLocator()->get('Ipverwaltung\\Model\\' . $type . '\\' . $type . 'Table');
        $formclass = 'Ipverwaltung\\Model\\' . $type . '\\' . $type . 'Form';
        $ifclass = 'Ipverwaltung\\Model\\' . $type . '\\' . $type . 'InputFilter';
        $serviceclass = 'Ipverwaltung\\Model\\' . $type . '\\' . $type . 'Service';
        $service = new $serviceclass();
        $form = new $formclass();
        $form->setInputFilter(new $ifclass());
        $form->bind($service);

        if ($this->getRequest()->isPost())
        {
            $form->setData($this->getRequest()->getPost());
            if($form->isValid())
            {
                $service->save();
                echo "passst"; exit();
            }
        }

        $return['form'] = $form;

        return $return;
    }
}
