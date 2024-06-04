<?php

namespace App\Enums;

enum Notification: string
{
    case Success = 'success';
    case Warning = 'warning';
    case Danger = 'danger';
    case Unmarked = '';
}
