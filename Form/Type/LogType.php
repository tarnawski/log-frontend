<?php

namespace LogFrontendBundle\Form\Type;

use LogFrontendBundle\Model\Log;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('level', ChoiceType::class, [
            'choices'  => ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'INFO', 'NOTICE', 'DEBUG']
        ]);
        $builder->add('message', TextType::class);
        $builder->add('context', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Log::class
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
