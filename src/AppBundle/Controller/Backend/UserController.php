<?php
namespace AppBundle\Controller\Backend;

use AppBundle\Form\LexikFilter\UsuariosFilterType;

use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction(Request $request)
    {
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AwUserBundle:User')
            ->createQueryBuilder('u')
        ;
        $form = $this->get('form.factory')->create(new UsuariosFilterType($this->getDoctrine()->getEntityManager()));

        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            if ($form->get('filtrar')->isClicked()) {
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
            }
            if ($form->get('limpiar')->isClicked()) {
                return $this->redirectToRoute('usuario_control');
            }
        }
        $query = $filterBuilder->getQuery();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1)/*page number*/,
            10
        );
        if(!$pagination->getTotalItemCount()) {
            $this->addFlash('error', 'No encontramos ninguna coincidencia');
        }

        return $this->render('AwBackendTemplateBundle:User:index.html.twig', array(
            'filterForm' => $form->createView(),
            'pagination' => $pagination,
            'formuser' => $form,
        ));
    }

    public function editAction($id)
    {
        $usuario = $this->getDoctrine()->getRepository('AwUserBundle:User')->findOneBy(array('id' => $id));

        if (!$usuario) {
            throw new \Exception('El usuario no existe');
        }

        $form = $this->createForm(new UserType($this->getDoctrine()->getEntityManager(), $usuario), $usuario);
        $form
            ->add('save', 'submit', array('label' => 'Actualizar Usuario', 'attr' => array('class' => 'btn btn-success pull-right')))
        ;
        return $this->render('AwBackendTemplateBundle:User:edit.html.twig',
            array(
                'form' => $form->createView(),
                'usuario' => $usuario,
                'formuser' => $form,
            ));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        /*
         * @var  \AppBundle\User
         */
        $usuario = $em->getRepository('AwUserBundle:User')->find($id);

        if (!$usuario) {
            throw $this->createNotFoundException('El usuario no existe');
        }

        $form = $this->createForm(new UserType($em, $usuario), $usuario);

        $form
            ->add('save', 'submit', array('label' => 'Actualizar Usuario', 'attr' => array('class' => 'btn btn-success pull-right')))
        ;

        $form->handleRequest($request);
        if ($form->isValid()) {
            try {
                $this->get('fos_user.user_manager')->updateUser($usuario, true);
            } catch (\Exception $e) {
                if (stripos($e->getMessage(), 'duplicate')) {
                    $this->addFlash('error', 'el usuario ya existe, cambie el nombre del usuario e intentelo nuevamente');
                } else {
                    $this->addFlash('error', 'no se pudo actualizar el usuario ');
                }
            }
            if (!isset($e)) {
                $this->addFlash('success', 'El usuario '.$usuario->getUsername().' fue actualizado con exito');
            }

            return $this->redirectToRoute('backend_user_index');
        }

        return $this->render('AwBackendTemplateBundle:User:edit.html.twig',
            array(
                'form' => $form->createView(),
                'usuario' => $usuario,
                'formuser' => $form,
            )
        );
    }

    public function newAction()
    {
        $usuario = $this->get('fos_user.user_manager')->createUser();
        $form = $this->createForm(new UserType($this->getDoctrine()->getEntityManager(), $usuario), $usuario);
        $form
            ->add('save', 'submit', array('label' => 'Crear usuario', 'attr' => array('class' => 'btn btn-info pull-right')))
        ;
        return $this->render('AwBackendTemplateBundle:User:new.html.twig',
            array(
                'form' => $form->createView(),
                'usuario' => $usuario,
                'formuser' => $form,
            )
        );
    }

    public function createAction(Request $request)
    {
        $usuario = $this->get('fos_user.user_manager')->createUser();
        $form = $this->createForm(new UserType($this->getDoctrine()->getEntityManager(), $usuario), $usuario);
        $form
            ->add('save', 'submit', array('label' => 'Crear usuario', 'attr' => array('class' => 'btn btn-info pull-right')))
        ;
        $form->handleRequest($request);
        if ($form->isValid()) {
            try {
                $this->get('fos_user.user_manager')->updateUser($usuario, true);
            } catch (\Exception $e) {
                $message = stripos($e->getMessage(), 'Duplicate entry') ? 'el usuario o el correo ya existen' : '';
                $message = $message.(stripos($e->getMessage(), ' Column \'password\'') ? ' debe colocar una contraseña' : '');
                if ($message == '') {
                    $this->addFlash('error', 'no se pudo crear el usuario: ');
                } else {
                    $this->addFlash('error', 'no se pudo crear el usuario: '.$message);
                }

                return $this->render('AwBackendTemplateBundle:User:new.html.twig',
                    array(
                        'form' => $form->createView(),
                        'usuario' => $usuario,
                        'formuser' => $form,
                    )
                );
            }
            if (!isset($e)) {
                $this->addFlash('success', 'El usuario fue creado con exito, si desea puede crear otro usuario');
                $usuario = $this->get('fos_user.user_manager')->createUser();
                $form = $this->createForm(new UserType($this->getDoctrine()->getEntityManager(), $usuario), $usuario);
            }
            return $this->redirectToRoute('backend_user_index');
        }
        return $this->render('AwBackendTemplateBundle:User:new.html.twig',
            array(
                'form' => $form->createView(),
                'usuario' => $usuario,
                'formuser' => $form,
            )
        );
    }

    public function showAction($id)
    {
        return $this->render(
            'AwBackendTemplateBundle:User:show.html.twig',
            [
                'usuario' => ($usuario = $this->getDoctrine()->getRepository('AwUserBundle:User')->find($id)),
                'corders' => $this->getDoctrine()->getRepository('AppBundle:Corder')->findBy(['user' => $usuario],['id' => 'DESC']),
            ]
        );
    }
}
