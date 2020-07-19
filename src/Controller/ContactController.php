<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact", name="contact_")
 */
class ContactController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $entities = $manager->getRepository(Contact::class)->findAll();

        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact,
            [
                'action' => $this->generateUrl('contact_create')
            ]
        );

        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() && $formContact->isValid()) {

            $manager->persist($contact);
            $manager->flush();
        }

        return $this->render('base.html.twig', [
            'entities' => $entities,
            'form' => $formContact->createView(),
            'controller_name' => 'ContactController',
        ]);
    }

    /*
     * @Route("/create", name="create", methods={"GET","HEAD"})
     */
    /**
     * @Route("/create", name="create", methods={"POST", "PUT"})
     */
    public function create(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact,
            [
                'action' => $this->generateUrl('contact_create')
            ]
        );

        $contacts = $manager->getRepository(Contact::class)->findAll();

        return new Response('OK', 200, []);
    }


    /**
     * @Route("/edit", name="edit", methods={"GET","HEAD"})
     */
    public function edit()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }


    /**
     * @Route("/edit", name="update", methods={"POST","PUT"})
     */
    public function update()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }


    /**
     * @Route("/delete", name="delete", methods={"POST","DELETE"})
     */
    public function delete()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

}
