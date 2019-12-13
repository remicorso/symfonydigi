<?php

namespace App\Form\Blog;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AuteurFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'required'=>true,
                'label'=>'author_label.firstname',
                'constraints' => [
                    new Length([
                        'min' => 5,
                        'minMessage' => 'The title should have a minimum of {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'required'=>true,
                'label'=>'author_label.lastname'
            ])
            ->add('valider', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Auteur::class,
            'translation_domain' => 'author'
        ]);
    }

}