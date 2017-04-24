<?php

namespace AppBundle\Controller;

use AppBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * File controller.
 *
 */
class FileController extends Controller
{
    /**
     * Returns the file Content as download
     *
     */
    public function downloadAction(File $fileEntity) {
        
        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($fileEntity->getPath());
        $response->setContentDisposition(\Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_ATTACHMENT);

        return $response;
    }

}
