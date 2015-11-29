<?php
/**
 * 用户列表
 * @author blueyb.java@gmail.com
 */
class ListAction extends UserCenterAction{
	
	public function index(HttpRequest $request){
		$keyword = $request->getParameter('keyword');
		$sex = $request->getParameter('sex');
		$province = $request->getParameter('province');
		$city = $request->getParameter('city');		
		$t = $request->getParameter('t');
		
		$conditions = " 1 ";
		if($keyword){
			$conditions .= " and (name like '%{$keyword}%' or sign like '%{$keyword}%')";
		}
		if($sex == '1' || $sex == '2')
		{
			$conditions .= " AND (sex='$sex')";
		}
		if(!empty($province) && $province != 'all')
		{
			$conditions .= " AND (province='$province')";
			if(!empty($city) && $city != 'all')
			{
				$conditions .= " AND (city='$city')";
			}
		}	
		$viewType = array(
            'type'=>'available_money',
            'name'=>'金币');
		if($t == 1) {
            $orders = array('accuracy' => 'desc'); //胜率排行
        }
		elseif($t == 2){
			$orders = array('available_integral'=>'desc'); //积分排行
        }
		elseif($t == 3){
            $orders = array('available_money'=>'desc'); //jintian 排行
        }
        elseif($t == 4){
			$orders = array('available_ltc'=>'desc'); //Ltc排行
            $viewType['type'] = 'available_ltc';
            $viewType['name'] = 'LTC';
        }
        elseif($t == 5){
            $orders = array('available_btc'=>'desc'); //Btc排行
            $viewType['type'] = 'available_btc';
            $viewType['name'] = 'BTC';
        }
        elseif($t == 6){
            $orders = array('available_doge'=>'desc'); //dode排行
            $viewType['type'] = 'available_doge';
            $viewType['name'] = 'DOGE';
        }
		else{
			$orders = array('id'=>'desc');
        }
		
		if($t>=1 && $t<=6) {
            $astr[$t] = 'class="active"';
        }else {
            $astr[0] = 'class="active"';
        }
		
		$page = getPage();
		$perpage = 5;
		$userService = MemberServiceFactory::getUserService();
        $gets = $this->getSelctFields();
		$items = $userService->gets($conditions, $gets, $orders, $page, $perpage);
        //print_r($items);exit;
		$total = $userService->count($conditions);
		$pages = multi_page($total, $perpage, $page);
		
		/*
		if($items){
			//获取当前用户与搜索用户之间的好友关系
			$userIds = ArrayUtil::colKeySet($items, 'id', true);
			$followConditions = " from_uid = '{$this->user->getId()}' and to_uid in ({$userIds})";
			$followDao = MD('Follow');
			$follows = $followDao->gets($followConditions);
			$follows = ArrayUtil::changeKey($follows, 'to_uid');
			$request->setAttribute('follows', $follows);
		}
		*/

		//省
		$db = R::getDB();
		$province_arr = $db->getRows("SELECT * FROM yyx_province WHERE 1 ORDER BY id ASC");
		
		$request->setAttribute('items', $items);
		$request->setAttribute('total', $total);
		$request->setAttribute('pages', $pages);
		$request->setAttribute('page', $page);
		$request->setAttribute('perpage', $perpage);
		$request->setAttribute('astr', $astr);
		$request->setAttribute('province_arr', $province_arr);
		$request->setAttribute('view_type', $viewType);

		$seo = array(
				'title' => '用户列表',
				'description' => '',
				'keywords' => ''
		);
		$request->assign('seo', $seo);
		$this->setView('list');
	}

    private function getSelctFields(){
        return 'id,name,nickname,sex,province,city,available_money,available_btc,available_ltc,available_doge,available_integral,guess_count,accuracy,friend';
    }
}