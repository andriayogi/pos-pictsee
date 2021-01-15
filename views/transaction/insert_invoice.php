<?php

    include "../../config/koneksi.php";

    // DEKLARASI VARIABLE
    $split          = explode("-", $_POST['date']);
    $date           = $split[2]."-".$split[1]."-".$split[0];
    $invoice_number = $_POST['invoice_number'];
    $name_customer  = $_POST['name_customer'];
    $phone          = $_POST['phone'];
    $id_promo       = $_POST['promo'];
    $discount       = $_POST['discount'];
    $information    = $_POST['information'];
    $package        = $_POST['package'];
    $qty_package    = $_POST['qty_package'];
    $additional     = $_POST['additional'];
    $qty_additional = $_POST['qty_additional'];
    $created_by     = $_POST['created_by'];
    $total_package  = 0;
    $total_additional   = 0;

    for($i = 0; $i < count($package); $i++) {
        $split_pack[$i] = explode("-", $package[$i]);
        $sub_package    = intval($split_pack[$i][1]) * $qty_package[$i];
        $total_package  += $sub_package;
    }

    for($j = 0; $j < count($additional); $j++) {
        $split_add[$j]      = explode("-", $additional[$j]);
        $sub_additional     = intval($split_add[$j][1]) * $qty_additional[$j];
        $total_additional   += $sub_additional;
    }

    $sub_total = $total_package + $total_additional;
    $total_price = $sub_total - $discount;

    // COUNTING INVOICE NUMBER
    // $query_count    = "SELECT id_invoice FROM trn_invoice WHERE status = '1' AND date = '$date'";
    // $sql_count      = mysqli_query($koneksi, $query_count);
    // $count_invoice  = $sql_count->num_rows;
    // if($count_invoice == 0) {
    //     $counter = 1;
    // } else {
    //     $counter        = $count_invoice + 1;
    // }
    // $date_invoice   = date('Ymd');
    // $invoice_number = "PCT.$date_invoice.$counter";

    // INSERT INVOICE
    $query_invoice  =  "
    INSERT INTO
        `trn_invoice`(`invoice_number`, `name_customer`, `date`, `phone`, `id_promo`, `sub_total`, `discount`, `total_price`, `information`, `created_by`)
    VALUES
        ('$invoice_number', '$name_customer', '$date', '$phone', '$id_promo', '$sub_total', '$discount', '$total_price', '$information', '$created_by');
    "; 
    $sql_invoice    = mysqli_query($koneksi, $query_invoice) or die (mysqli_error($koneksi));

    if($sql_invoice) {
        $last_id_invoice = mysqli_insert_id($koneksi);
        
        if(count($package) > 0) {
            for($a = 0; $a < count($package); $a++) {
                $split_packs[$a] = explode("-", $package[$a]);
                $value_split_p   = intval($split_packs[$a][0]);
                $qty_p           = intval($qty_package[$a][0]);
                
                $query_package  = "
                INSERT INTO
                    `trn_invoice_detail`(`id_invoice`, `id_package`, `qty`, `created_by`)
                VALUES
                    ('$last_id_invoice', $value_split_p, $qty_p, '$created_by');
                ";

                mysqli_query($koneksi, $query_package);
            }
        }

        if(count($additional) > 0) {
            for($b = 0; $b < count($additional); $b++) {
                $split_adds[$b] = explode("-", $additional[$b]);
                $value_split_a  = intval($split_adds[$b][0]);
                $qty_a          = intval($qty_additional[$b][0]);
                $query_additional = "
                INSERT INTO
                    `trn_invoice_detail`(`id_invoice`, `id_package`, `qty`, `created_by`)
                VALUES
                    ('$last_id_invoice', $value_split_a, $qty_p, '$created_by');
                ";

                mysqli_query($koneksi, $query_additional);
            }
        }

        $data = (object) [
            'date'          => $date,
            'name_customer' => $name_customer,
            'phone'         => $phone,
            'promo'         => $id_promo,
            'discount'      => $discount,
            'information'   => $information,
            'package'       => $package,
            'qty_package'   => $qty_package,
            'additional'    => $additional,
            'qty_additional'=> $qty_additional,
            'invoice_number'=> $invoice_number,
            'count_invoice' => $count_invoice,
            'sub_total'     => $sub_total,
            'total_price'   => $total_price
        ];
        
        echo json_encode($data);

    } else {
        $data = (object) [
            'status'    => 'Error',
            'message'   => 'Mohon maaf. Transaksi gagal disimpan'
        ];

        echo json_encode($data);
    }
?>