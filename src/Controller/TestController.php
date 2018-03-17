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
use App\Service\DumpService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\Common\Collections\Collection;

class TestController extends Controller
{

    /**
     * @Route("/test", name="test")
     */
    function test(SerializerInterface $serializer, Request $request)
    {
        $rep = $this->getDoctrine()->getRepository(Product::class);
        $deals = $rep->loadOne(1);
        // var_dump(json_encode($deals));
        if ($deals != null)
            return new JsonResponse($deals);
        return new Response('No result found');
    }

    /**
     * @Route("/test/dump", name="test_dump")
     */
    function test_dump(Request $request)
    {
        return new Response($this->get(DumpService::class)->dump($request->request));
    }

    /**
     * @Route("/test/lazy", name="test_lazy")
     */
    function test_lazy(Request $request)
    {
        $rep = $this->getDoctrine()->getRepository(Product::class);
        // SQL request on product table
        $deal = $rep->loadOne(1);
        // $deal->getImage()->getSrc();
        return new Response('done');
    }
}
?>