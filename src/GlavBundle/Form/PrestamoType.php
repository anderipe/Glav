<?php

namespace GlavBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class PrestamoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('hash')
            ->add('observacion')
            //->add('estado')
            ->add('estado', 'choice', array(
                  'choice_list' => new ChoiceList(array('1', '2'), array('Debe',  'Descontado','Finalizado','Anulado')),
                        'label' => 'Estado del prestamo'
                    	//'empty_value' => 'Selecciona estado del servido'
                ,'attr' => array('data-rel'=>'chosen')))
            //->add('fecha')
            //->add('id_servicio')
            //->add('id_empleado')
            ->add('id_empleado', 'entity', array(
            //'multiple' => true,
            'class'    => 'GlavBundle:Empleado',
            'property' => 'label',
            'label' => 'Empleado',
            'attr' => array('data-rel'=>'chosen'),
            ))
            ->add('valor','integer')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GlavBundle\Entity\Prestamo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'glavbundle_prestamo';
    }
}
