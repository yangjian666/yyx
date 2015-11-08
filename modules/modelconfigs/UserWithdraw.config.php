<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:30
 */

return array(
    'orm' => array(
        'table' => 'yyx_user_withdraw',
        'pk' => 'id',
        'map' => array(
            'id' => 'id',
            'userId' => 'user_id',
            'addTime' => 'add_time',
            'amount' => 'amount',
            'wealthType'=> 'wealth_type',
            'walletAddress' => 'wallet_address',
            'txAddress' => 'tx_address',
            'txid' => 'txid',
            'txConfirmations' => 'tx_confirmations',
            'info' => 'info',
            'withdrawState' => 'withdraw_state',
            'fee' => 'fee',
            'feePay' => 'fee_pay',
            'adminUserId' => 'admin_user_id',
            'adminInfo' => 'admin_info',
            'adminIpv4' => 'admin_ipv4'
        )
    ),
    'rule' => array()
);

?>