<?php
/**
 * 删除竞猜
 * @author blueyb.java@gmail.com
 */
class DeleteAction extends UserCenterAction{
	
	public function index(HttpRequest $request){
        show_message('竞猜不允许删除!');
		//获取竞猜
		$id = $request->getParameter('id');
		if(empty($id)){
			show_message('请选择要删除竞猜!');
		}
		$guessService = GuessServiceFactory::getGuessService();
		$guess = $guessService->get($id, true);

		if(!$guess){
			show_message('竞猜不存在，请确认!');
		}
		if($guess->getPlayCount()){
			show_message('竞猜已有人参与，不能删除!');
		}
        if($guess->getStatus() != Guess::STATUS_WAITING_CKECK){
            show_message('已审核通过的竞猜，不能删除!');
        }
		$success = $guessService->delete($guess);
		if($success){
			//操作成功
			show_message('删除竞猜成功!');
		}else{
			//操作失败
			show_message('删除竞猜失败!');
		}
	}
}