<?php

namespace GlavBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class FacturaDetalleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('hash')
            //->add('cantidad')
            ->add('id_servicio','entity' ,array(
                'class' => 'GlavBundle:Servicio',
                "label" => 'Servicio',
                //'property' => 'idAutomo',
                 //'empty_value' => 'Seleccione el programa',
                 //'mapped' =>    false,
                 //'property_path' => null,
                 'attr' => array('data-rel'=>'chosen'),
                 'query_builder' => function(EntityRepository $er){return $er->createQueryBuilder('u')->where('u.estadoServicio LIKE :q and u.estado=1')->setParameters(array('q' => '%'.'Finalizado'.'%')); },))
            //->add('valor')
            //->add('iva')
            //->add('total')
            //->add('estado')
            ->add('estado', 'choice', array('choices' => array('2' => 'Pagado', '3' => 'Gratis')))
            //->add('fecha')
            //->add('id_factura')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GlavBundle\Entity\FacturaDetalle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'glavbundle_facturadetalle';
    }
}
