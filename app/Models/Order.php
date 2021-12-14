<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'id_product',
        'id_office',
        'id_user',
        'quantity',
        'is_delivered',
        'date_delivered',
        'prepayment'
    ];

    public function client(){
        return $this->belongsTo(Client::Class, "id_client");
    }

    public function product(){
        return $this->belongsTo(Product::Class, "id_product");
    }

    public function office(){
        return $this->belongsTo(Office::Class, "id_office");
    }

    public function user(){
        return $this->belongsTo(User::Class, "id_user");
    }

    public function scopeQ($query){
        return DB::select('SELECT  id_user, MAX(Quantity) AS MaxVal
        FROM
        (
        SELECT id_user, SUM(total) AS Quantity
        FROM sales
        GROUP BY id_user
        ) T
        GROUP BY id_user
        LIMIT 1');
    }

    public function scopeR($query){
        return DB::select('SELECT sum(total) as suma FROM sales WHERE date_sale=CURDATE()');
    }

    public function scopeP($query){
        return DB::select('SELECT SUM(quantity) AS cantidad FROM orders WHERE  date_delivered=CURDATE()');
    }

    public function scopeX($query){
        return DB::select('SELECT SUM(quantity) AS cantidad FROM orders WHERE  date_delivered=CURDATE()');
    }

    public function scopeY($query){
        return DB::select("SELECT SUM(total) AS total FROM sales WHERE  DATE_FORMAT(date_sale, '%M')=DATE_FORMAT(CURDATE(), '%M') ");
    }

    public function scopeZ($query){
        return DB::select("SELECT sum(quantity) as cantidad from orders where is_delivered='1' and DATE_FORMAT(date_delivered, '%M')=DATE_FORMAT(CURDATE(), '%M') ");
    }

    public function scopeA($query){
        return DB::select("SELECT SUM(quantity) AS cantidad FROM orders WHERE is_delivered='0' AND DATE_FORMAT(date_delivered, '%M')=DATE_FORMAT(CURDATE(), '%M')");
    }

    public function scopeB($query){
        return DB::select("SELECT SUM(quantity) AS cantidad FROM orders WHERE is_delivered='2' AND DATE_FORMAT(date_delivered, '%M')=DATE_FORMAT(CURDATE(), '%M')");
    }

    public function scopeReportedevolucionespre($query){
        return DB::select("SELECT c.id,c.date_devolution,c.cuenta,d.id,d.date_delivered,d.cuenta2,(c.cuenta/d.cuenta2)*100 AS ND FROM
(SELECT  COUNT(date_devolution) AS cuenta,orders.* FROM orders WHERE is_delivered = '2' GROUP BY date_devolution) c LEFT JOIN
(SELECT COUNT(is_delivered) AS cuenta2,orders.* FROM orders GROUP BY date_delivered) d
ON c.date_devolution=d.date_delivered");
    }
    public function scopeReportedevolucionespos($query){
        return DB::select("SELECT c.id,c.date_devolution,c.cuenta,d.id,d.date_delivered,d.cuenta2,(c.cuenta/d.cuenta2)*100 AS ND FROM
(SELECT  COUNT(date_devolution) AS cuenta,orders.* FROM orders WHERE is_delivered = '2' GROUP BY date_devolution) c LEFT JOIN
(SELECT COUNT(is_delivered) AS cuenta2,orders.* FROM orders GROUP BY date_delivered) d
ON c.date_devolution=d.date_delivered");
    }

    public function scopeReporteentregaspre($query){
        return DB::select("SELECT c.id,c.date_delivered AS fecha1,c.cuenta,d.id,d.date_delivered AS fecha2,d.cuenta2,(c.cuenta/d.cuenta2)*100 AS ND FROM
(SELECT  id,date_delivered, COUNT(date_delivered) AS cuenta FROM orders WHERE is_delivered = '1' GROUP BY date_delivered) c LEFT JOIN
(SELECT id,date_delivered, COUNT(is_delivered) AS cuenta2 FROM orders GROUP BY date_delivered) d
ON c.date_delivered=d.date_delivered");
    }
    public function scopeReporteentregaspos($query){
        return DB::select("SELECT c.id,c.date_delivered AS fecha1,c.cuenta,d.id,d.date_delivered AS fecha2,d.cuenta2,(c.cuenta/d.cuenta2)*100 AS ND FROM
(SELECT  id,date_delivered, COUNT(date_delivered) AS cuenta FROM orders WHERE is_delivered = '1' GROUP BY date_delivered) c LEFT JOIN
(SELECT id,date_delivered, COUNT(is_delivered) AS cuenta2 FROM orders GROUP BY date_delivered) d
ON c.date_delivered=d.date_delivered");
    }

    public function scopeReporteentregastotales($query){
        return DB::select("SELECT c.id,c.date_delivered AS fecha1,c.cuenta,d.id,d.date_delivered AS fecha2,d.cuenta2,(d.cuenta2/c.cuenta)*100 AS ND FROM
(SELECT  id,date_delivered, COUNT(date_delivered) AS cuenta FROM orders WHERE is_delivered = '1' GROUP BY DATE_FORMAT(CURDATE(), '%M')) c LEFT JOIN
(SELECT id,date_delivered, COUNT(is_delivered) AS cuenta2 FROM orders GROUP BY date_delivered) d
ON c.date_delivered=d.date_delivered");
    }

    public function scopeReportedevolucionestotales($query){
        return DB::select("SELECT c.id,c.date_delivered AS fecha1,c.cuenta,d.id,d.date_delivered AS fecha2,d.cuenta2,(d.cuenta2/c.cuenta)*100 AS ND FROM
(SELECT  id,date_delivered, COUNT(date_delivered) AS cuenta FROM orders WHERE is_delivered = '2' GROUP BY DATE_FORMAT(CURDATE(), '%M')) c LEFT JOIN
(SELECT id,date_delivered, COUNT(is_delivered) AS cuenta2 FROM orders GROUP BY date_delivered) d
ON c.date_delivered=d.date_delivered");
    }

}
