<?php

namespace App\Twig\Components;

use App\Entity\Voyage;
use App\Form\VoyageType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent]
class VoyageForm extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp]
    public ?Voyage $initialFormData = null;

    protected function instantiateForm(): FormInterface
    {
      $voyage = $this->initialFormData ?? new Voyage();
      return $this->createForm(VoyageType::class, $voyage, [
          'action' => $voyage->getId() ? $this->generateUrl('app_voyage_edit', ['id' => $voyage->getId()]) : $this->generateUrl('app_voyage_new'),
      ]);
    }
}