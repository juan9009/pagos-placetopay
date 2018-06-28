<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = 'transaction';

    public $timestamps = false;

    public $fillable = [
        'transactionID',
        'responseCode',
        'responseReasonText',
    ];
}
