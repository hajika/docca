<?php

namespace AppBundle\Services;

class FileUploader {

    public function __construct($path_upload, $path_thumb, $path_preview) {
        
        $this->path_upload = $path_upload;
        $this->path_thumb = $path_thumb;
        $this->path_preview = $path_preview;
    }
    
    /**
     * move the given file to upload folder and persist it
     * 
     * @param Document $document
     * @param UploadedFile $files
     * @return Document
     */
    public function upload(\Doctrine\Common\Collections\ArrayCollection $files) {
        
        foreach ($files as $file) {
        
            
            $this->uploadFile($file);
        }
        
        foreach ($files as $file) {
            
            
        }

        return $document;
    }
    
    //
    private function uploadFile(\AppBundle\Entity\File $file) {
        
        // generate unique name (only for persistence)
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        // save file
        $file->move($this->getParameter('path_upload'), $fileName); # todo: den ordner sichern!

        // set new entity
        $fileEntity = new \AppBundle\Entity\File();
        $fileEntity
                ->setName($fileName)
                ->setLabel($file->getClientOriginalName())
                ->setDocument($document);
        $em->persist($fileEntity); 

        $this->createPdf($fileEntity);
        $this->createThumb($fileEntity);
        $this->createPreview($fileEntity);
    }
    
    private function createPdf(\AppBundle\Entity\File $fileEntity) {
        
        #dump(exec('libreoffice --headless --convert-to pdf ' . $fileEntity->getName())); die();
    }
    
    
    
    //
    private function createThumb(\AppBundle\Entity\File $file) {
        
        $img = new \Imagick($this->getParameter('path_upload') . $file->getName());
        
        for ($i = 0; $i < $img->getNumberImages(); $i++) {
            
            $img->setiteratorindex($i);
        
            # todo als parameter
            $img->scaleImage(70,0);
            $img->cropImage(70,95,0,0);
            
            $img->writeimage($this->getParameter('path_thumb') . $file->getName() . '_' . $i . '.jpg');
        }
        
        $file->setNumberPages($img->getNumberImages());
        
        return $file;
    }
    
    //
    private function createPreview(\AppBundle\Entity\File $file) {
        
        $img = new \Imagick($this->getParameter('path_upload') . $file->getName());
        
        for($i = 0;$i < $img->getNumberImages(); $i++) {
            
            $img->setiteratorindex($i);
        
            #todo als parameter
            $img->scaleImage(600,0);
            
            $img->writeimage($this->getParameter('path_preview') . $file->getName() . '_' . $i . '.jpg');
        }
        
        return $file;
    }
    
    
}
