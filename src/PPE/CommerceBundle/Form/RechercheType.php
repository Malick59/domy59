<?php

namespace PPE\CommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recherche', TextType::class, array('label'=> false, 'attr' => array('class' =>'input-medium search-query')));

    }

    public function getBlockPrefix()
    {
        return 'ppe_commerce_search';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}