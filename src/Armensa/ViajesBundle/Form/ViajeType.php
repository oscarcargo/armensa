<?php

namespace Armensa\ViajesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ViajeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',null,array("widget"=>"single_text","attr"=>array(
                "class"=>"datePicker"
            )))
            //->add('fechaCreacion')
            ->add('origen')
            ->add('destino')
            ->add('valorCompra')
            ->add('valorVenta')
            ->add('peso')
            ->add('cantidad')
            ->add('observciones')
            //->add('usuario')
            ->add('conductor')
            ->add('vehiculo')
            ->add('cliente')
            ->add('tipoProceso')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Armensa\ViajesBundle\Entity\Viaje'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'armensa_viajesbundle_viaje';
    }
}
