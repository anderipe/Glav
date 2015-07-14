<?php

namespace GlavBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class ServicioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_servicio')    
            //->add('estado')
            //->add('fecha')
            //->add('id_cliente')
            ->add('id_cliente', 'entity', array(
            //'multiple' => true,
            'class'    => 'GlavBundle:Cliente',
            'property' => 'label',
            'label' => 'Cliente',

            'attr' => array('data-rel'=>'chosen'),
            ))
            //->add('id_cliente','choice', array('label' => 'Cliente', 'attr' => array('data-rel'=>'chosen')))
            //->add('id_empleado')
            ->add('id_empleado', 'entity', array(
            //'multiple' => true,
            'class'    => 'GlavBundle:Empleado',
            'property' => 'label',
            'label' => 'Empleado',
            'attr' => array('data-rel'=>'chosen'),
            ))
            //->add('id_automotor')
            ->add('id_automotor', 'entity', array(
            //'multiple' => true,
            'class'    => 'GlavBundle:Automotor',
            'property' => 'label',
            'label' => 'Placa',
            'attr' => array('data-rel'=>'chosen'),
            ))
            ->add('estadoServicio', 'choice', array(
                  'choice_list' => new ChoiceList(array('Iniciado', 'Espera','Finalizado','Anulado'), array('Iniciado',  'Espera','Finalizado','Anulado')),
                        'label' => 'Selecciona estado del servido',
                    	'empty_value' => 'Selecciona estado del servido',
                        'data' => 'Finalizado',

                'attr' => array('data-rel'=>'chosen')))
            //->add('id_rubro')
            ->add('id_rubro', 'entity', array(
            //'multiple' => true,
            'class'    => 'GlavBundle:Rubro',
            'property' => 'label',
            'label' => 'Servicio',
            'attr' => array('data-rel'=>'chosen'),
            ))
            ->add('fecha_entrega')
            ->add('observacion')
            //anderipe se deja la opcion de permitir habilitar el boton de los pago si se necesita
            //->add('pago', 'choice', array('choices' => array('Pendiente' => 'Pendiente', 'Pagado' => 'Pagado')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GlavBundle\Entity\Servicio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'glavbundle_servicio';
    }
}
