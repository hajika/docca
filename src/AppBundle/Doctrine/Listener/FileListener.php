<?php

namespace AppBundle\Doctrine\Listener;

use \AppBundle\Entity\File;

class FileListener {
    
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
     * @param File $file
     */
    private function removeFiles(File $file) {
        
        // remove original file
        is_file($file->getPath()) ? unlink($file->getPath()) : '';   
        
        
        // remove thumbs
        foreach ($file->getThumbPaths() as $path) {
            
            is_file($path) ? unlink($path) : '';
        }      
        
        // remove previews
        foreach ($file->getPreviewPaths() as $path) {
            
            is_file($path) ? unlink($path) : '';
        }
    }
}