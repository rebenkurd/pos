<?php 

class Item extends DbObject {
    protected static $table = 'items';
    protected static $table_fields = array(
        'id',
        'custom_id',
        'name',
        'price',
        'discount',
        'discount_amount',
        'quantity',
        'tax',
        'tax_amount',
        'unit_cost',
        'total_price',
        'code',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $custom_id;
    public $name;
    public $price;
    public $discount;
    public $discount_amount;
    public $quantity;
    public $tax;
    public $tax_amount;
    public $unit_cost;
    public $total_price;
    public $code;
    public $added_by;
    public $updated_by;
    public $created_at;
    public $updated_at;
    
}