-- 修改字段类型
-- 涉及积分的类型不变，涉及金币的，全部变为支持8位小数

ALTER TABLE `yyx_exchange`  MODIFY COLUMN `money` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '兑换金币';

ALTER TABLE `yyx_goods`  MODIFY COLUMN `money` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '兑换金币 0为免费';
ALTER TABLE `yyx_goods`  MODIFY COLUMN `money_limit` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '用户金币下限 0为不设限';

ALTER TABLE `yyx_guess`  MODIFY COLUMN `play_wealth` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '参与竟猜财富数';
ALTER TABLE `yyx_guess`  MODIFY COLUMN `keep_wealth` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '托管金额';
ALTER TABLE `yyx_guess`  MODIFY COLUMN `win_wealth` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '托管金额';

ALTER TABLE `yyx_invite`  MODIFY COLUMN `recharge_percent` DECIMAL(8,8) NOT NULL DEFAULT '0.0' COMMENT '邀请充值提成比例';

ALTER TABLE `yyx_io`  MODIFY COLUMN `wealth` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '财富数';
ALTER TABLE `yyx_io`  MODIFY COLUMN `from_balance` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '支出人余额';
ALTER TABLE `yyx_io`  MODIFY COLUMN `to_balance` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '收入人余额';
ALTER TABLE `yyx_io`  MODIFY COLUMN `tax` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '税';

ALTER TABLE `yyx_play`  MODIFY COLUMN `win_wealth` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '总赢财富';

ALTER TABLE `yyx_recharge`  MODIFY COLUMN `money` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '充值的金额';

ALTER TABLE `yyx_user`  MODIFY COLUMN `available_money` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '可用金额';
ALTER TABLE `yyx_user`  MODIFY COLUMN `freeze_money` DECIMAL(14,8) NOT NULL DEFAULT '0.0' COMMENT '冻结的金额';