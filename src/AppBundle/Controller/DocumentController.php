<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Document controller.
 *
 */
class DocumentController extends Controller
{
    
    /**
     * Lists all document entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documents = $em->getRepository('AppBundle:Document')->findAll();

        return $this->render('document/index.html.twig', array(
            'documents' => $documents,
        ));
    }

    /**
     * Creates a new document entity.
     *
     */
    public function newAction(Request $request)
    {
        $document = new Document();
        $form = $this->createForm('AppBundle\Form\DocumentType', $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();            
                        
            $document
                    ->setUploadTime(new \DateTime('now'))
                    ->setActive(true);
            
            #dump($form->get('files_new')->getData()); die(); 
            $uploadedFiles = $form->get('files_new')->getData();
            $files = $this->get('app.file_uploader')->init($document, $em)->upload($uploadedFiles);
            $document->addFiles($files);
            
            $em->persist($document);
            $em->flush($document);

            return $this->redirectToRoute('doc_show', array('id' => $document->getId()));
        }

        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a document entity.
     *
     */
    public function showAction(Document $document)
    {
        $deleteForm = $this->createDeleteForm($document);

        return $this->render('document/show.html.twig', array(
            'document' => $document,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing document entity.
     *
     */
    public function editAction(Request $request, Document $document)
    {
        $em = $this->getDoctrine()->getManager();

        // save the original files before edit
        $originalFiles = clone $document->getFiles();
        
        // build form and handle data
        $editForm = $this->createForm('AppBundle\Form\DocumentType', $document);
        $editForm->handleRequest($request);
        
        // delete Document
        if ($editForm->get('delete')->isClicked()) {
            
            $this->deleteDocument($document);
            return $this->redirectToRoute('doc_index');
        }
        
        // process submitted form
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            // remove und upload files
            $document = $this->removeFiles($document, $originalFiles);            
            dump($editForm->get('files_new')->getData()); die();

            $em->persist($document);
            $em->flush();

            return $this->redirectToRoute('doc_show', array('id' => $document->getId()));
        }

        return $this->render('document/edit.html.twig', array(
            'document' => $document,
            'form' => $editForm->createView(),
        ));
    }
    
    /**
     * remove Document relation from File when given in $originalFiles but not in $document
     * 
     * @param Document $document
     * @param ArrayCollection $originalFiles
     * @return Document
     */
    private function removeFiles($document, $originalFiles) {
        
        // dont do anything if all files has been deleted
        # give back an error
        if ($document->getFiles()->isEmpty()) {
            
            return $document;
        }
        
        $em = $this->getDoctrine()->getManager();
        
        foreach ($originalFiles as $file) {

            // file still exists
            if ($document->getFiles()->contains($file)) {
                
                continue;             
            }

            // remove the Document from the File
            $file->setDocument(null);
            $em->persist($file);
            $em->remove($file);
        }

        return $document;
    }
    
    /**
     * move the given file to upload folder and persist it
     * 
     * @param Document $document
     * @param UploadedFile $files
     * @return Document
     */
    private function uploadFiles($document, $files) {
        
        $em = $this->getDoctrine()->getManager();
        
        foreach ($files as $file) {
            
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

        return $document;
    }
    
    private function createPdf(\AppBundle\Entity\File $fileEntity) {
        
        #dump(exec('libreoffice --headless --convert-to pdf ' . $fileEntity->getName())); die();
    }

    /**
     * Deletes a document entity.
     *
     */
    public function deleteAction(Request $request, Document $document) { 
        
        $this->deleteDocument($document);

        return $this->redirectToRoute('doc_index');
    }
    
    //
    private function deleteDocument($document) {
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($document);
        $em->flush($document);
        
        return true;
    }

    /**
     * Creates a form to delete a document entity.
     *
     * @param Document $document The document entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Document $document)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('doc_delete', array('id' => $document->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
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
