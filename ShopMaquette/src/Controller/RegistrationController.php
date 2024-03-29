<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\ClientRepository;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(Request $request, 
                                UserPasswordHasherInterface $userPasswordHasher,
                                ClientRepository $clientRepository,
                                ContactRepository $contactRepository,
                                UserRepository $userRepository): Response
    {
        //Entity utiliser
        $user = new User();
        $client = new Client();
        $contact = new Contact();

        //associe client et user ensemble a la creation
        $user->setClient($client);
        $client->addContact($contact);

        //Creation du formulaire
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        //si valid et envoyer alors suite code...
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérez les données du formulaire
            $userData = $form->getData();
            
            // Encode le password et attribue les données pour l'entier user
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
                );
                $user->setEmail($userData['email']);

            //enregistre les entités dans la base de donnée
            $userRepository->save($user, false);
            $clientRepository->save($client, true);
            $contactRepository->save($contact, true);

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('ShopMaquette@gmail.com', 'Gispsy'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
}
