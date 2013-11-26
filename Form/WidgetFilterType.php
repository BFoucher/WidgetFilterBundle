<?php

namespace Victoire\FilterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\CmsBundle\Form\EntityProxyFormType;
use Victoire\CmsBundle\Form\WidgetType;


/**
 * WidgetFilter form type
 */
class WidgetFilterType extends WidgetType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array();
        foreach ($options['filters'] as $filter) {
            $choices[$filter->getName()] = $filter->getName();
        }
        $builder->add('list')
                ->add('ajax')
                ->add('filters', 'choice', array(
                    'multiple' => true,
                    'choices' => $choices
                ));
    }


    /**
     * bind form to WidgetRedactor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\FilterBundle\Entity\WidgetFilter',
            'widget' => 'filter',
            'filters' => array()
        ));
    }

    /**
     * get form name
     */
    public function getName()
    {
        return 'appventus_victoirecmsbundle_widgetfiltertype';
    }
}