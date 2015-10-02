<?php

namespace Acme\InfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Form;
use Acme\InfoBundle\Form\Type\InfoType;
use Acme\InfoBundle\Entity\Info;
use Acme\InfoBundle\Entity\Contactus;
use Acme\InfoBundle\Entity\Front;
use Acme\InfoBundle\Entity\Testimonials;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $info = $this->get('doctrine')->getRepository('AcmeInfoBundle:Info')->findAll();
        return $this->render('AcmeInfoBundle:Default:index.html.twig',array('info'=>$info));
    }
    public function addAction(Request $request)
    {
        $info = new \Acme\InfoBundle\Entity\Info();
        $info->setTitle('');
        $info->setDescription('');
        $form = $this->createFormBuilder($info)
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->getForm();
        $form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($info);
        if (count($errors) > 0) {
                return $this->render('AcmeInfoBundle:Default:add.html.twig', array('form' => $form->createView()));
        }else{
            if($request->isMethod('post')=='add')
            {
                $em = $this->getDoctrine()->getManager();
                $a = $request->request->get('form');
                $info = new \Acme\InfoBundle\Entity\Info();
                $info->setTitle($a['title']);
                $info->setDescription($a['description']);
                $em->persist($info);
                $em->flush();
                return $this->redirect($this->generateUrl('acme_info'));
            }
        }
        return $this->render('AcmeInfoBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $inform = $em->getRepository('AcmeInfoBundle:Info')->find($id);
        $info = new \Acme\InfoBundle\Entity\Info();
        $info->setTitle($inform->getTitle());
        $info->setDescription($inform->getDescription());
        $form = $this->createFormBuilder($info)
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->getForm();
        $form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($info);
        if (count($errors) > 0) {
            //echo "invalid";
        }else{
            if($request->isMethod('post')=='edit')
            {
                $a = $request->request->get('form');
                $info = $em->getRepository('AcmeInfoBundle:Info')->find($id);
                $info->setTitle($a['title']);
                $info->setDescription($a['description']);
                $em->persist($info);
                $em->flush();
                return $this->redirect($this->generateUrl('acme_info'));
            }
        }
        return $this->render('AcmeInfoBundle:Default:edit.html.twig', array('form' => $form->createView(),'id'=>$id));
    }
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
	$em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('AcmeInfoBundle:Info')->find($id);
        $em->remove($info);
        $em->flush();
        return $this->redirect($this->generateUrl('acme_info'));
    }
    public function welcomeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $all = $this->get('doctrine')->getRepository('AcmeInfoBundle:Front')->findAll();
        $front = $em->getRepository('AcmeInfoBundle:Front')->find($all[0]->getId());
	if($request->isMethod('POST') == 'save')
	{
		$id = $request->get('id');
		$front = $em->getRepository('AcmeInfoBundle:Front')->find($id);
                $front->setDescription($request->get('description'));
                $em->persist($front);
                $em->flush();
		return $this->render('AcmeInfoBundle:Default:welcome.html.twig', array('front' => $front));
	}
	return $this->render('AcmeInfoBundle:Default:welcome.html.twig', array('front' => $front));
    }

    public function contactusAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
	$contactus = $em->getRepository('AcmeInfoBundle:Contactus')->find('1');
	if($request->isMethod('POST') == 'save')
	{
		$id = $request->get('id');
		$contactus = $em->getRepository('AcmeInfoBundle:Contactus')->find($id);
                $contactus->setDescription($request->get('description'));
                $em->persist($contactus);
                $em->flush();
		return $this->render('AcmeInfoBundle:Default:contactus.html.twig', array('contactus' => $contactus));
	}
	return $this->render('AcmeInfoBundle:Default:contactus.html.twig', array('contactus' => $contactus));
    }
	
    public function testimonialsAction(Request $request)
    {
	$order_by = '';	
	$em = $this->get('doctrine.orm.entity_manager');
	$repository = $em->getRepository('Acme\InfoBundle\Entity\Testimonials');
	$languagesCount = $repository->getIdCount();
	$paginator = new Testimonials($languagesCount);
	$strPaginator = $paginator->RenderPaginator();
        $testimonials = $this->get('doctrine')->getRepository('AcmeInfoBundle:Testimonials')->findAll();
	return $this->render('AcmeInfoBundle:Default:testimonials.html.twig',array('testimonials'=>$testimonials,'paginator'=>$strPaginator));
    }

    public function testiaddAction(Request $request)
    {
        $testi = new \Acme\InfoBundle\Entity\Testimonials;
        $testi->setName('');
        $testi->setPost('');
	$testi->setDescription('');

        $form = $this->createFormBuilder($testi,array('action'=>'/app_dev.php/info/testimonials'))
            ->add('name', 'text')
            ->add('post', 'text')
	    ->add('description', 'textarea')	
	    ->add('save', 'submit', array('label' => 'Save'))	
            ->getForm();
	$form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($testi);
	if (count($errors) > 0) {
                return $this->render('AcmeInfoBundle:Default:testiadd.html.twig', array('form' => $form->createView()));
        }else{
            if($request->isMethod('post') == 'save')
            {	
		$em = $this->getDoctrine()->getManager();
		$a = $request->request->get('form');
                $testimonial = new \Acme\InfoBundle\Entity\Testimonials();
                $testimonial->setName($a['name']);
		$testimonial->setPost($a['post']);
		$testimonial->setDescription($a['description']);
                $em->persist($testimonial);
                $em->flush();
                return $this->redirect($this->generateUrl('acme_info_testimonials'));
	    }
	}
	return $this->render('AcmeInfoBundle:Default:testiadd.html.twig',array('form' => $form->createView()));
    }

    public function testidelAction(Request $request)
    {
	$id = $request->get('id');
	$em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('AcmeInfoBundle:Testimonials')->find($id);
        $em->remove($info);
        $em->flush();
        return $this->redirect($this->generateUrl('acme_info_testimonials'));	
    }

    public function testieditAction(Request $request)
    {
	$id = $request->get('id');
	$em = $this->getDoctrine()->getManager();
        $testimonials = $em->getRepository('AcmeInfoBundle:Testimonials')->find($id);
        $testimonial = new \Acme\InfoBundle\Entity\Testimonials();
        $testimonial->setName($testimonials->getName());
        $testimonial->setPost($testimonials->getPost());
	$testimonial->setDescription($testimonials->getDescription());
        $form = $this->createFormBuilder($testimonials)
            ->add('name', 'text')
	    ->add('post', 'text')
            ->add('description', 'textarea')
            ->getForm();
        $form->handleRequest($request);
        $validator = $this->get('validator');
        $errors = $validator->validate($form);
         if (count($errors) > 0) {
            //echo "invalid";
        }else{
            if($request->isMethod('post')=='edit')
            {
                $a = $request->request->get('form');
                $info = $em->getRepository('AcmeInfoBundle:Testimonials')->find($id);
                $info->setName($a['name']);
                $info->setPost($a['post']);
                $info->setDescription($a['description']);
                $em->persist($info);
                $em->flush();
                return $this->redirect($this->generateUrl('acme_info_testimonials'));
            }
        }    
        return $this->render('AcmeInfoBundle:Default:testiedit.html.twig', array('form' => $form->createView(),'id'=>$id));
    }
}
