<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:29
 */


return array(
    'orm' => array(
        'table' => 'yyx_user_deposit',
        'pk' => 'id',
        'map' => array(
            'id' => 'id',
            'userId' => 'user_id',
            'walletAddress' => 'wallet_address',
            'confirmations' => 'confirmations',
            'amount'=> 'amount',
            'wealthType' => 'wealth_type',
            'txid' => 'txid',
            'txIsOk' => 'tx_is_ok',
            'addTime' => 'add_time',
            'adminUserId' => 'admin_user_id',
            'adminInfo' => 'admin_info',
            'adminIpv4' => 'admin_ipv4'
        )
    ),
    'rule' => array()
);

?>