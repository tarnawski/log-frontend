<?php

namespace LogFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;

/**
 * Class BaseController
 */
abstract class BaseController extends Controller
{
    protected function getFormErrorsAsArray(Form $form)
    {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            $errors[$key] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $key = $child->getName();
                $errors[$key] = $this->getFormErrorsAsArray($child);
            }
        }

        return $errors;
    }
}
