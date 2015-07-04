<?php

namespace GlavBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpleadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identificacion')
            ->add('nombre')
            ->add('apellido')
            ->add('genero', 'choice', array('choices' => array('masculino' => 'Masculino', 'femenino' => 'Femenino')))
            ->add('fNacimiento','date', array('years' => range(date('Y') -90, date('Y')),))
            ->add('direccion')
            ->add('telefono')
            ->add('celular')
            ->add('email')
            //->add('estado')
            //->add('fecha')
            ->add('id_cargo', 'entity', 
                  array('label' => 'Cargo',
                        'class'    => 'GlavBundle:Cargo'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GlavBundle\Entity\Empleado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'glavbundle_empleado';
    }
}
