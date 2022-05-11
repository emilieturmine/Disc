<?php

namespace App\Form;

use App\Entity\Disc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DiscType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title' , TextType::class, [
                'label' => 'Titre', 'attr' => [  
                'placeholder' => 'Vous devez rentrer le titre ici',]])
            ->add('year'  ,IntegerType::class, [
                'label' => 'Annee de sortie','attr' => [  
                'placeholder' => 'Vous devez rentrer l annee de sortie  ici',]])
            ->add('picture',UrlType::class, [
                'label' => 'Image','attr' => [  
                'placeholder' => 'Vous devez rentrer image ici',]])
            ->add('Label',TextType::class, [
                'label' => 'Label','attr' => [  
                'placeholder' => 'Vous devez rentrer le label ici',]])
            ->add('artist',ChoiceType::class, [
                'label' => 'Artiste','attr' => [  
                'placeholder' => 'Vous devez choisir le nom de l artiste ici',]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disc::class,
        ]);
    }
}
