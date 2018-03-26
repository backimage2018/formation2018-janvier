<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\ItemCaddy;
use App\Service\DumpService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ItemCaddyController extends Controller
{

    /**
     * @Route("/ajax/addtocart", name="ajax_addtocart")
     */
    function ajax_addtocart(Request $request)
    {
        $quantity = $request->request->get('qty');
        return new JsonResponse($quantity);
    }
}
?>