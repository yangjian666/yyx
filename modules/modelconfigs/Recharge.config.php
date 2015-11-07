<?php

/**
 * 充值配置
 * @author blueyb.java@gmail.com
 */

return array(
	'orm' => array(
		'table' => 'yyx_recharge',
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