<?php

namespace PPE\CommerceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
            'label' => 'Nom'))
        ->add('ref', TextType::class, array(
            'label' => 'Ref'))
        ->add('prix', IntegerType::class, array(
            'label' => 'Prix'))
        ->add('description', TextType::class, array(
            'label' => 'Description'))
        ->add('image', TextType::class, array(
            'label' => 'LienImage'))
        ->add('category', EntityType::class, array(
                'class'        => 'PPECommerceBundle:Category',
                'choice_label' => 'name',
                'multiple'     => false,
                'expanded'     => false,
            ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPE\CommerceBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ppe_commercebundle_product';
    }
}