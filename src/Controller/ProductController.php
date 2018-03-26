<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\TwigBundle\TwigBundle;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Image;
use App\Entity\Review;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ProductController extends Controller
{

    /**
     * @Route("/product/add/{id}", name="product_add_review", requirements={"id"="\d+"})
     */
    function product_add_reviews(Request $request, $id)
    {
        $rep = $this->getDoctrine()->getRepository(Product::class);
        $p = $rep->find($id);
        
        $review = new Review();
        $review->setComment($request->request->get('comment'));
        $review->setNotation($request->request->get('rating'));
        $review->setEmail($request->request->get('email'));
        $review->setName($request->request->get('name'));
        
        $p->getReviews()[] = $review;
        $review->setProduct($p);
        
        $em = $this->getDoctrine()->getManagerForClass(Product::class);
        $em->persist($p);
        $em->flush();
        
        return $this->redirectToRoute("product", array(
            'id' => $id
        ));
    }

    /**
     * @Route("/product/{id}", name="product", requirements={"id"="\d+"})
     */
    function product(AuthorizationCheckerInterface $authChecker, $id)
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for single product content page */
        /* custom data */
        $prep = $this->getDoctrine()->getRepository(Product::class);
        $product = $prep->loadOne($id);
        var_dump($this->generateUrl("admin_product_load", array(
            "id" => $id
        )));
        /*
         * $param["breadcrumb"] = [
         * "title" => "breadcrumb",
         * "list" => [
         * "lvl0" => [
         * "title" => "Home",
         * "src" => $this->generateUrl("index")
         * ],
         * "lvl1" => [
         * "title" => "Product",
         * "src" => $this->generateUrl("products")
         * ],
         * "lvl2" => [
         * "title" => $product['name'],
         *
         * "src" => "#"
         * ]
         * ]
         * ];
         */
        if ($authChecker->isGranted('ROLE_ADMIN')) {
            $param["breadcrumb"]['list']['lvl3'] = [
                "title" => "Edit",
                "src" => $this->generateUrl("admin_product_load", array(
                    "id" => $id
                ))
            
            ];
            $param["breadcrumb"]['list']['lvl4'] = [
                "title" => $product['id'],
                "src" => "#"
            
            ];
        }
        $param["product"] = $product;
        
        $param["pickedarticles"] = $prep->loadPickedForYou();
        return $this->render("product/product.html.twig", $param);
    }

    /**
     * @Route("admin/product/{id}", name="admin_product_load", requirements={"id"="\d+"})
     */
    function product_load(Request $request, $id)
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
                    "title" => "Product",
                    "src" => $this->generateUrl("product", array(
                        'id' => $id
                    ))
                ],
                "lvl2" => [
                    "title" => "Edit",
                    "src" => "#"
                ]
            ]
        ];
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);
        $product->getImage()->setSrcname($product->getImage()
            ->getSrc());
        // $img = $product->getImage()->getSrc();
        $product->getImage()->setSrc(new File($this->getParameter('images_upload_directory') . DIRECTORY_SEPARATOR . $product->getImage()
            ->getSrc()));
        $param["product"] = $product;
        // $param["image"] = $img;
        
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('admin_product_load', array(
                'id' => $id
            ));
        }
        $param["form"] = $form->createView();
        return $this->render("admin/product/form_product.html.twig", $param);
    }

    /**
     * @Route("admin/product/add", name="admin_product_add")
     */
    function product_add(Request $request)
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
                    "title" => "Product",
                    "src" => $this->generateUrl("products")
                ],
                "lvl2" => [
                    "title" => "Edit",
                    "src" => "#"
                ]
            ]
        ];
        $product = new Product();
        $image = new Image();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $product->getImage()->getSrc();
            $fileName = $uploadedFile->getClientOriginalName();
            $image->setSrc($fileName);
            $product->setImage($image);
            $uploadedFile->move($this->getParameter('images_upload_directory'), $fileName);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('admin_product_load', array(
                'id' => $product->getId()
            ));
        }
        $param["product"] = $product;
        $param["form"] = $form->createView();
        return $this->render("admin/product/form_product.html.twig", $param);
    }

    /**
     * @Route("/product/all", name="products")
     */
    function products_all()
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
                    "title" => "Product",
                    "src" => $this->generateUrl("products")
                ],
                "lvl2" => [
                    "title" => "All",
                    "src" => "#"
                ]
            ]
        ];
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        $param["products"] = $products;
        return $this->render("product/products.html.twig", $param);
    }

    /**
     * @Route("products/category/{cat}", name="load_product_by_category")
     */
    function category(Request $request, $cat)
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
                    "title" => "Product",
                    "src" => $this->generateUrl("products")
                ],
                "lvl2" => [
                    "title" => "All",
                    "src" => "#"
                ]
            ]
        ];
        var_dump($cat);
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->loadProductsByCategory($cat);
        $param["products"] = $products;
        return $this->render("product/products.html.twig", $param);
    }

    /**
     * @Route("products/category/{cat}/{gender}", name="load_product_by_category_gender")
     */
    function category_gender(Request $request, $cat, $gender)
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
                    "title" => "Product",
                    "src" => $this->generateUrl("products")
                ],
                "lvl2" => [
                    "title" => "All",
                    "src" => "#"
                ]
            ]
        ];
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->loadProductsByCategoryAndGender($cat, $gender);
        $param["products"] = $products;
        return $this->render("product/products.html.twig", $param);
    }
}
?>