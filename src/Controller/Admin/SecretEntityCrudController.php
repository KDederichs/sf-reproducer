<?php

namespace App\Controller\Admin;

use App\Entity\SecretEntity;
use App\SecretService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SecretEntityCrudController extends AbstractCrudController
{

    public function __construct(
        private readonly SecretService $secretService,
    )
    {

    }

    public static function getEntityFqcn(): string
    {
        return SecretEntity::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $this->secretService->printMySecret();
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }

}
