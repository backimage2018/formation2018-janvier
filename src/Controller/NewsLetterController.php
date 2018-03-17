<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App;
use Symfony\Bundle\TwigBundle\TwigBundle;
use App\Entity\Product;
use App\Entity\Newsletter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class NewsLetterController extends Controller
{

    /**
     * @Route("/newsletter", name="newsletter")
     */
    function newsletter(Request $request)
    {
        $email = $request->request->get('email');
        $newsletter = new Newsletter();
        $newsletter->setEmail($email);
        $em = $this->getDoctrine()->getManagerForClass(Newsletter::class);
        $em->persist($newsletter);
        $em->flush();
        $this->addFlash('success', 'Thank you, e-mail registered !');
        return $this->json($newsletter->getEmail());
    }

    /**
     * @Route("admin/newsletter/delete/{id}", name="admin_newsletter_delete")
     */
    function admin_newsletter_delete(Request $request, $id)
    {
        $newsletter = $this->getDoctrine()
            ->getRepository(Newsletter::class)
            ->find($id);
        
        $em = $this->getDoctrine()->getManagerForClass(Newsletter::class);
        $em->remove($newsletter);
        $em->flush();
        return new Response("Done");
    }
}
?>