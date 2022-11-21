<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Formation;
use App\Entity\Playlist;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('publishedAt', null ,[
             'widget' => 'single_text',
             'label' => 'Date'
         ])
                ->add('title', TextType::class, [
                    'label' => 'Titre'
                ])
                ->add('description', TextType::class, [
                    'label' => 'Description',
                    'required' => false
                ])
                ->add('videoId', TextType::class, [
                    'label' => 'Id de la vidéo'
                ])
                ->add('playlist', EntityType::class, [
                    'class' => Playlist::class,
                    'choice_label' => 'name',
                ])
                ->add('categories', EntityType::class, [
                    'class' => Categorie::class,
                    'choice_label' => 'name',
                    'multiple' => true
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Enregistrer'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
