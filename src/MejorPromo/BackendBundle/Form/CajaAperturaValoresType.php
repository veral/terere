<?php

namespace MejorPromo\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaAperturaValoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('moneda')
            ->add('monto')
            ->add('cotizacion')
            // ->add('fecha')
            // ->add('cajaApertura')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MejorPromo\BackendBundle\Entity\CajaAperturaValores'
        ));
    }

    public function getName()
    {
        return 'formcajaaperturavalores';
    }
}