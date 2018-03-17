<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Product;
use App\Service\DumpService;

class DefaultController extends Controller
{

    /**
     * @Route("/blank", name="blank")
     */
    function blank()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for blank content page */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Blank",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("blank.html.twig", $param);
    }

    /**
     * @Route("/checkout", name="checkout")
     */
    function checkout()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Checkout",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("checkout.html.twig", $param);
    }

    /**
     * @Route("/", name="index")
     */
    function index()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for body content page */
        $rep = $this->getDoctrine()->getRepository(Product::class);
        $deals = $rep->loadDealsOfTheDay();
        $param["dealsoftheday"] = $rep->loadDealsOfTheDay();
        $param["latestproducts"] = $rep->loadLatestProducts();
        
        $param["pickedarticles"] = $rep->loadPickedForYou();
        $param["smallbanners"] = Data::smallbanners;
        return $this->render("index.html.twig", $param);
    }

    /**
     * @Route("/faq", name="faq")
     */
    function faq()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for faq content page */
        $param["faqs"] = Data::faqs;
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "FAQ",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("faq.html.twig", $param);
    }

    /**
     * @Route("/about", name="about")
     */
    function about()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for faq content page */
        $param["about"] = Data::about;
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "About us",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("about.html.twig", $param);
    }

    /**
     * @Route("/profile", name="profile")
     */
    function profile()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for profile content page */
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Profile",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("profile.html.twig", $param);
    }

    /**
     * @Route("/shiping_guide", name="shiping_guide")
     */
    function shipingguide()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Shiping guide",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("shiping_guide.html.twig", $param);
    }

    /**
     * @Route("/compare", name="compare")
     */
    function compare()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Compare",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("compare.html.twig", $param);
    }

    /**
     * @Route("/whishlist", name="whishlist")
     */
    function whishlist()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Whishlist",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("whishlist.html.twig", $param);
    }

    /**
     * @Route("/shiping_and_return", name="shiping_and_return")
     */
    function shipingandreturn()
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* custom data */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Shiping and return",
                    "src" => "#"
                ]
            ]
        ];
        return $this->render("shiping_guide.html.twig", $param);
    }
}
?>