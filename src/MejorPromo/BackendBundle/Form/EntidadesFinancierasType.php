<?php

namespace MejorPromo\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntidadesFinancierasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entidad')
            ->add('estado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MejorPromo\BackendBundle\Entity\EntidadesFinancieras'
        ));
    }

    public function getName()
    {
        return 'mejorpromo_backendbundle_entidadesfinancierastype';
    }
}
