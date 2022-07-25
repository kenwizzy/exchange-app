<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\HasWallets;
use Bavix\Wallet\Interfaces\Wallet;


class System extends Model
{
    use HasWallet, HasWallets;
    //
}
