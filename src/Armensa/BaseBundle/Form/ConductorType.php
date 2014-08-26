<?php

namespace Armensa\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConductorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('identificacion')
            ->add('telefono')
            ->add('direccion')
            ->add('foto')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Armensa\BaseBundle\Entity\Conductor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'armensa_basebundle_conductor';
    }
}
