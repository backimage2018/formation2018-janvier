<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpKernel\Log\Logger;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Controller dedicated to authentication domain
 *
 * @author cooren
 *        
 */
class AuthentificationController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    function login(Request $request, AuthenticationUtils $utils, TranslatorInterface $translator)
    {
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for login page content */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => $translator->trans("Login"),
                    "src" => "#"
                ]
            ]
        ];
        
        $param["last_username"] = $utils->getLastUsername();
        $param["error"] = $utils->getLastAuthenticationError();
        // var_dump($request);
        
        return $this->render("authentication/login.html.twig", $param);
    }

    /**
     * @Route("/signin", name="signin")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $user->setRoles(array(
            "ROLE_USER"
        ));
        $form = $this->createForm(UserType::class, $user);
        
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            
            return $this->redirectToRoute('index');
        }
        
        $param = [];
        /* data for header */
        $param = Data::loadHeader($param);
        /* data for footer */
        $param = Data::loadFooter($param);
        /* data for signin page content */
        $param["breadcrumb"] = [
            "title" => "breadcrumb",
            "list" => [
                "lvl0" => [
                    "title" => "Home",
                    "src" => $this->generateUrl("index")
                ],
                "lvl1" => [
                    "title" => "Sign in",
                    "src" => "#"
                ]
            ]
        ];
        $param["form"] = $form->createView();
        return $this->render('authentication/register.html.twig', $param);
    }
}

?>