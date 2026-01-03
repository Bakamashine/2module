<?php

namespace App;

enum StatusPayment: string
{
    case WaitingPayment = "Ожидает оплаты";
    case Bought = "Оплачено";
    case Error = "Ошибка оплаты";
}
