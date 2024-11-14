<?php

namespace WTroiano\TrafficSupplier\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Skillcraft\CentralCommand\Forms\FieldOptions\NumberFieldOption;
use WTroiano\TrafficSupplier\Http\Requests\TrafficSupplierRequest;
use WTroiano\TrafficSupplier\Models\TrafficSupplier;

class TrafficSupplierForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(TrafficSupplier::class)
            ->setValidatorClass(TrafficSupplierRequest::class)
            ->columns(12)
            ->add('name', TextField::class, NameFieldOption::make()->colspan(6)->required()->maxLength(255))
            ->add('url', TextField::class, TextFieldOption::make()->colspan(6)->maxLength(255))
            ->add('login', TextField::class, TextFieldOption::make()->colspan(6)->maxLength(255))
            ->add('password', TextField::class, TextFieldOption::make()->colspan(6)->maxLength(255))
            ->add('credits', NumberField::class, NumberFieldOption::make()->min(0))
            ->add('is_active', OnOffField::class, OnOffFieldOption::make())
            ->setBreakFieldPoint('credits');
    }
}
