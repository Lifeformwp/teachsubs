<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('annotation')
            ->add('isPublished', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No'  => false,
                ]
            ])
            ->add('background', FileType::class, [
                'label' => 'Background jpeg',
                'data_class' => null
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'placeholder' => 'Choose a proper Category',
                'query_builder' => function(CategoryRepository $category) {
                    return $category->findAllOrderedByCategoryNameForVideos();
                }
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Videos'
        ]);
    }

    public function getName()
    {
        return 'app_bundle_video_form_type';
    }
}
