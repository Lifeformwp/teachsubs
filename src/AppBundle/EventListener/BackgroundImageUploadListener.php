<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Videos;
use AppBundle\Entity\Category;
use AppBundle\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

class BackgroundImageUploadListener
{
    private $uploader;
    private $em;

    public function __construct(FileUploader $uploader, EntityManager $em)
    {
        $this->uploader = $uploader;
        $this->em = $em;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($args->hasChangedField('background') && $entity->getBackground() === NULL) {
            $entity->setBackground($args->getOldValue('background'));
        }

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {

        if (!$entity instanceof Videos && !$entity instanceof Category) {
            return;
        }

        $file = $entity->getBackground();

        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setBackground($fileName);
    }
}