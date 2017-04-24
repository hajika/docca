<?php

namespace AppBundle\Services;

use AppBundle\Config;
use AppBundle\Entity\Document;
use AppBundle\Entity\File;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class FileUploader {

    private $document;
    private $em;
    
    public function __construct() 
    {
    }
    
    //
    public function init(Document $document, EntityManager $em) {
        
        $this->document = $document;
        $this->em = $em;
        
        return $this;
    }
    
    /**
     * move the given file to upload folder and persist it
     * 
     * @param Document2 $document
     * @param UploadedFile $files
     * @return Document2
     */
    public function upload(Array $files) {
        
        $files = new ArrayCollection($files);
        
        $entityFiles = [];
        foreach ($files as $file) {
        
            $entityFiles[] = $this->uploadFile($file);
        }
        
        $entityFiles = new ArrayCollection($entityFiles);

        return $entityFiles;
    }
    
    //
    private function uploadFile(UploadedFile $uploadedFile) {
        
        // generate unique name (only for filesystem)
        $fileName = $uploadedFile->getClientOriginalName() . '_' . uniqid() . '.' . $uploadedFile->guessExtension();

        // save file
        $uploadedFile->move(Config::FILE_UPLOAD_PATH, $fileName); # todo: den ordner sichern!

        // set new entity
        $entityFile = new File();
        $entityFile
                ->setName($fileName)
                ->setLabel($uploadedFile->getClientOriginalName())
                ->setSize($uploadedFile->getClientSize())
                ->setDocument($this->document);
        $this->em->persist($entityFile); 

        // create Assets
        $entityFile = $this->createPdf($entityFile);
        $entityFile = $this->createThumb($entityFile);
        $entityFile = $this->createPreview($entityFile);
        
        return $entityFile;
    }
    
    private function createPdf(File $entityFile) {
        
        #dump(exec('libreoffice --headless --convert-to pdf ' . $fileEntity->getName())); die();
        
        return $entityFile;
    }
    
    private function createThumb(File $entityFile) {
        
        $img = new \Imagick(Config::FILE_UPLOAD_PATH . $entityFile->getName());
        
        for ($i = 0; $i < $img->getNumberImages(); $i++) {
            
            $img->setiteratorindex($i);
        
            // format and save image
            $img->scaleImage(Config::FILE_THUMB_SCALE_COLS, Config::FILE_THUMB_SCALE_ROWS);
            $img->cropImage(Config::FILE_THUMB_CROP_WIDTH, Config::FILE_THUMB_CROP_HEIGHT, Config::FILE_THUMB_CROP_X, Config::FILE_THUMB_CROP_Y);            
            $img->writeimage(Config::FILE_THUMB_PATH . $entityFile->getName() . '_' . $i . '.png');
        }
        
        $entityFile->setNumberPages($img->getNumberImages());
        
        return $entityFile;
    }
    
    private function createPreview(File $entityFile) {
        
        $img = new \Imagick(Config::FILE_UPLOAD_PATH . $entityFile->getName());
        
        for($i = 0;$i < $img->getNumberImages(); $i++) {
            
            $img->setiteratorindex($i);
        
            // format and save image
            $img->scaleImage(Config::FILE_PREVIEW_SCALE_COLS, Config::FILE_PREVIEW_SCALE_ROWS);            
            $img->writeimage(Config::FILE_PREVIEW_PATH . $entityFile->getName() . '_' . $i . '.png');
        }
        
        return $entityFile;
    }
    
    
}
