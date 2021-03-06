<?php

namespace Pepe\SistemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TurnoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('hora')
            ->add('adelanto')
            ->add('monto')
            ->add('usuario')
            ->add('servicio')
            ->add('cliente')
            ->add('empleados')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pepe\SistemBundle\Entity\Turno'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pepe_sistembundle_turno';
    }
}
