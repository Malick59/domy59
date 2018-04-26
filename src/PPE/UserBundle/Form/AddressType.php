<?php

namespace PPE\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
        'label' => 'Prénom'))
            ->add('lastName', TextType::class, array(
        'label' => 'Nom'))
            ->add('streetNumber', TextType::class, array(
        'label' => 'Numéro de voie'))
            ->add('streetName',   TextType::class, array(
        'label' => 'Nom de rue'))
            ->add('city',         TextType::class, array(
        'label' => 'Commune'))
            ->add('postalCode',   TextType::class, array(
                'label' => 'Code Postal'))
            ->add('country', TextType::class, array(
        'label' => 'Pays'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PPE\UserBundle\Entity\Address'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ppe_userbundle_address';
    }


}
