<?php

namespace AppBundle\Form;

use AppBundle\Entity\Videos;
use AppBundle\Repository\VideosRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoSeriesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('duration')
            ->add('en_sub')
            ->add('ru_sub')
            ->add('it_sub')
            ->add('de_sub')
            ->add('jp_sub')
            ->add('fr_sub')
            ->add('zh_sub')
            ->add('cs_sub')
            ->add('lt_sub')
            ->add('pl_sub')
            ->add('isPublished', ChoiceType::class, [
                'choices' => [
                    'Yes' => 0,
                    'No'  => 1,
                ]
            ])
            ->add('video', EntityType::class, [
                'class' => Videos::class,
                'placeholder' => 'Choose the main Video',
                'query_builder' => function(VideosRepository $video) {
                    return $video->findAllOrderedByVideoNameForSeries();
                }
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\VideoSeries'
        ]);
    }

    public function getName()
    {
        return 'app_bundle_videoseries_form_type';
    }
}
