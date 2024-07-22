<?php

namespace App\Type;

enum WorkPopulationType: string
{
    case Employable = 'Трудоспособное';
    case OlderNonEmployable = 'Моложе трудоспособного';
    case YoungerNonEmployable = 'Старше трудоспособного';
}
