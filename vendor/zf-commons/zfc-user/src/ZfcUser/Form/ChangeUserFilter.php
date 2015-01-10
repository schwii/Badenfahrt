<?php

namespace ZfcUser\Form;

use Zend\InputFilter\InputFilter;
use ZfcUser\Options\AuthenticationOptionsInterface;

class ChangeUserFilter extends InputFilter
{
    protected $emailValidator;

    public function __construct(AuthenticationOptionsInterface $options, $userValidator)
    {
        $this->userValidator = $userValidator;

        $identityParams = array(
            'name'       => 'identity',
            'required'   => true,
            'validators' => array()
        );

        $identityFields = $options->getAuthIdentityFields();
        if ($identityFields == array('email')) {
            $validators = array('name' => 'EmailAddress');
            array_push($identityParams['validators'], $validators);
        }

        $this->add($identityParams);

        $this->add(array(
            'name'       => 'newIdentity',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
                $this->userValidator
            ),
        ));

        $this->add(array(
            'name'       => 'newIdentityVerify',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'identical',
                    'options' => array(
                        'token' => 'newIdentity'
                    )
                ),
            ),
        ));
    }

    public function getUserValidator()
    {
        return $this->userValidator;
    }

    public function setUserValidator($userValidator)
    {
        $this->userValidator = $userValidator;
        return $this;
    }
}
