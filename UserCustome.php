<?php

namespace Rofil\Admin\UserBundle;

/**
* 
*/
class UserCustome
{
	
	function __construct($userRepository, $formFactory, $userType, $router)
	{
		$this->userRepository = $userRepository;
		$this->formFactory = $formFactory;
		$this->userType = $userType;
		$this->router = $router;
	}

	public function create($entity, array $options = array())
	{
		return $this->formFactory->create($this->userType, $entity, array(
            'action' => $this->router->generate('manage_user_create'),
            'method' => 'POST',
        ))
		->add('submit', 'submit', array('label' => 'Simpan', 'attr' => array( 'class' => 'btn btn-primary' )))
		;
	}

	public function edit($entity, array $options = array())
	{
		return $this->formFactory->create($this->userType, $entity, array(
            'action' => $this->router->generate('manage_user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ))
		->add('submit', 'submit', array('label' => 'Update', 'attr' => array( 'class' => 'btn btn-primary' )))
		;
	}

	public function delete($id)
	{
		return $this->formFactory->createBuilder()
		    ->setAction($this->router->generate('manage_user_delete', array('id' => $id)))
		    ->setMethod('DELETE')
		    ->add('submit', 'submit', array('label' => 'Hapus', 'attr' => [ 'class' => 'btn btn-danger']))
		    ->getForm()
		;
	}
}