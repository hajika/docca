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
     * Finds and displays a file entity.
     *
     */
    public function downloadAction(File $fileEntity) {
        
        $filePath = $this->getParameter('path_upload') . $fileEntity->getName();
        
        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($filePath);
        $response->setContentDisposition(\Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_ATTACHMENT);

        return $response;
    }

}
