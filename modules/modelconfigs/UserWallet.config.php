<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:30
 */

return array(
    'orm' => array(
        'table' => 'yyx_address_multiaddrs',
        'pk' => 'id',
        'map' => array(
            'id' => 'id',
            'category' => 'category',
            'account' => 'account',
            'wealthType' => 'wealth_type',
            'fee'=> 'fee',
            'blockhash' => 'blockhash',
            'blockindex' => 'blockindex',
            'm_time' => 'm_time',
            'txid' => 'txid',
            'blocktime' => 'blocktime',
            'amount' => 'amount',
            'confirmations' => 'confirmations',
            'timereceived' => 'timereceived',
            'address' => 'address',
            'isLoad' => 'is_load',
            'isExist' => 'is_exist',
            'info' => 'info'
        )
    ),
    'rule' => array()
);

?>