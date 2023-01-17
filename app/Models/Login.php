<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login
{
    private static $nama = [
        [
            "nama" => "roy"
        ],
        [
            "nama" => "aldo"
        ]
    ];

    public static function all()
    {
        // membuat array menjadi collection
        return collect(self::$nama);
    }

    public static function find()
    {
        $nama = static::all();

        // mencari sesuatu
        return $nama->firstwhere('nama', $nama);
    }
}
