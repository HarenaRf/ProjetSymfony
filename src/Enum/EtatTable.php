<?php
namespace App\Enum;

enum EtatTable: string
{
    case LIBRE = 'libre';
    case OCCUPEE = 'occupée';
    case RESERVE = 'réservée';
}
