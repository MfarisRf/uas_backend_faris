<?php

namespace App\Models;

use App\Models\Data63;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agama63 extends Model
{
    use HasFactory;

    public $table = 'agama63';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_agama'
    ];

    public function detail()
    {
        return $this->hasMany(Data63::class, 'id_agama', 'id');
    }
}
