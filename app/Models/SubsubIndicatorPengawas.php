<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SubsubIndicatorPengawas extends Model
{
    use HasFactory;
    protected $table = 'subsub_indicator_pengawas';

    protected $fillable = [
      'name',
      'indicator_pengawas_id'
      'sub_indicator_pengawas_id'
      
    ];

   /*  public function score()
    {
        return $this->hasMany(Score::class, 'sub_indicator_id');
    } */

  /*   public function singleScore()
    {
        return $this->hasOne(Score::class, 'sub_indicator_id');
    } */

   /*  public function scoreHistory()
    {
        return $this->hasMany(ScoreHistory::class, 'sub_indicator_id');
    } */

	/* public function subsubIndicatorSmkk()
    {
        return $this->hasMany(SubsubIndicatorSmkk::class, 'sub_indicator_smkk_id');
    }  */
	
    public function indicatorPengawas(){
        return $this->belongsTo(IndicatorPengawas::class, 'indicator_pengawas_id');
    }
	
	public function subIndicatorPengawas(){
        return $this->belongsTo(SubIndicatorPengawas::class, 'sub_indicator_pengawas_id');
    }
	
/*     public function cumulativeScore()
    {
        return $this->hasMany(Score::class, 'sub_indicator_id');
    } */
}
