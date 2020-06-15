<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Ingredient;
use Doctrine\ORM\EntityRepository;


class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',NULL,['label' => 'Titre'] )
            ->add('subtitle',NULL,['label' => 'Sous-titre'])
            ->add('ingredients', EntityType::class,
            ['class' => Ingredient::class,
           
            'choice_label' => 'name',
            'multiple' => true,
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
