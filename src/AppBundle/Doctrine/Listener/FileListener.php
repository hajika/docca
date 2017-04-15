<?php

namespace AppBundle\Doctrine\Listener;

use \AppBundle\Entity\File;

class FileListener {
    
    public function __construct($path_upload, $path_thumb, $path_preview) {
        
        $this->path_upload = $path_upload;
        $this->path_thumb = $path_thumb;
        $this->path_preview = $path_preview;
    }
    
    /**
     * Start actions after the removal of a File Entity
     * 
     * @param File $file
     */
    public function postRemove(File $file) {
        
        $this->removeFiles($file);
    }
    
    /**
     * Remove files from the filesystem
     * 
     * @param type $file
     */
    private function removeFiles($file) {
        
        // remove uploaded original
        unlink($this->path_upload . $file->getName());

        // remove thumbs and previews
        for ($pageNumber=0; $pageNumber<$file->getNumberPages(); $pageNumber++) {

            unlink($this->path_thumb . $file->getName() . '_' . $pageNumber . '.jpg');
            unlink($this->path_preview . $file->getName() . '_' . $pageNumber . '.jpg');
        }
    }
}