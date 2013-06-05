<?php

namespace Videl\DetailsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position')
            ->add('link', 'entity', array(
                'class' => 'VidelDetailsBundle:Page',
                'multiple' => false,
                'expanded' => true,
                'property' => 'title')
            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Videl\DetailsBundle\Entity\Menu'
        ));
    }

    public function getName()
    {
        return 'videl_detailsbundle_menutype';
    }
}
