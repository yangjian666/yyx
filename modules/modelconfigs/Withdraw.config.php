<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午4:37
 */

return array(
    'orm' => array(
        'table' => 'yyx_withdraw',
        'pk' => 'id',
        'map' => array(
            'id' => 'id',
            'sn' => 'sn',
            'userId' => 'user_id',
            'money' => 'money',
            'wealthType'=> 'wealth_type',
            'payType' => 'pay_type',
            'status' => 'status',
            'createTime' => 'create_time'
        )
    ),
    'rule' => array()
);

?>