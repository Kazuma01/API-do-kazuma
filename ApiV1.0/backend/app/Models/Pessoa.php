<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
}
public function up(): void{
    Schema::create('pessoas', function (Blueprint $table) {
        $table->id();
        $table->string("name");
        $table->integer("idade");
        $table->timestamps();
    });
}
