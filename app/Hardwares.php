<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardwares extends Model
{
    //protected $connection = "";
    protected $primaryKey = "ID";
    protected $table = "hardware";
    
    public function storages()
    {
        return $this->hasMany(Storages::class, 'HARDWARE_ID', 'ID')->where('TYPE', 'like', '%disk%');
    }

    public function drives()
    {
        return $this->hasMany(Drives::class, 'HARDWARE_ID', 'ID')->where('TYPE', 'like', '%Hard Drive%');
    }
    
    public function monitors()
    {
        return $this->hasMany(Monitors::class, 'HARDWARE_ID', 'ID');
    }
    
    public function accountinfo()
    {
       return $this->hasOne(Accountinfo::class, 'HARDWARE_ID', 'ID'); 
    }
    
    public function printers()
    {
       return $this->hasMany(Printers::class, 'HARDWARE_ID', 'ID'); 
    }
    
    public function temp_files()
    {
       return $this->hasMany(Temp_files::class, 'ID_DDE', 'ID'); 
    }
   
    public function bios()
    {
       return $this->hasOne(Bios::class, 'HARDWARE_ID', 'ID'); 
    }

    public function softwares()
    {
       return $this->hasMany(Softwares::class, 'HARDWARE_ID', 'ID'); 
    }
    
    public function getProcessorsAttribute($value){
        return round($value/1000,1);
    }
    
    public function getMemoryAttribute($value){
        return round($value/1000,3, PHP_ROUND_HALF_EVEN);
    }
    
}
