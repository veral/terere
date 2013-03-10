<?php

namespace MejorPromo\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajasAperturasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('fecha')
            ->add('caja')
            ->add('cajero')
            ->add('entrego')
            ->add('recibio')
            ->add('abierta','choice',array(
                            'label' => 'Situación Caja',
                            'choices' => array('1' => 'Abierta', '0' => 'Cerrada'),
                            'empty_value' => '-- Estado de Caja --'))
            ->add('cajaAperturaValores','collection', array( 
                                              'type' =>  new CajaAperturaValoresType(),
                                              'allow_add' => true,
                                              'allow_delete' => true,
                                              'prototype' => true,
                                              'by_reference' => false,
            ));
            
            // ->add('horaCierre')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MejorPromo\BackendBundle\Entity\CajasAperturas'
        ));
    }

    public function getName()
    {
        return 'mejorpromo_backendbundle_cajasaperturastype';
    }
}
