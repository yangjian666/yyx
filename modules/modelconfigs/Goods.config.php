<?php

/**
 * 商品配置
 * @author blueyb.java@gmail.com
 */

return array(
	'orm' => array(
		'table' => 'yyx_goods',
		'pk' => 'id',
		'map' => array(
			'id' => 'id',
			'title' => 'title',
			'image' => 'image',
			'detail' => 'detail',
			'status' => 'status',
			'canLottery' => 'can_lottery',
			'lotteryCount' => 'lottery_count',
            'lotteryCredit' => 'lottery_credit',
			'probability' => 'probability',
			'canExchange' => 'can_exchange',
			'money' => 'money',
            'wealthType' => 'wealth_type',
			'moneyLimit' => 'money_limit',
            'count' => 'count',
            'exchanges' => 'exchanges',
			'sortNum' => 'sort_num',
			'summary' => 'summary',
			'createTime' => 'create_time'
		)
	),
	'rule' => array(
		'title' => array(
			array(
				'type' => 'required',
				'message' => '商品标题不能为空'
			)
		),
		'image' => array(
			array(
				'type' => 'required',
				'message' => '商品图片不能为空'
			)
		)
	)
);