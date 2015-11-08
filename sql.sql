if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[tb_user_withdraw]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[tb_user_withdraw]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[tb_user_deposit]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[tb_user_deposit]
GO

if exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[tb_address_multiaddrs]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
drop table [dbo].[tb_address_multiaddrs]
GO
-- 提款
CREATE TABLE IF NOT EXISTS `yyx_user_withdraw` (
	id int IDENTITY (1, 1) NOT NULL ,
	user_id int NOT NULL ,
	add_time datetime NOT NULL ,
	amount numeric(19, 8) NOT NULL ,
	wallet_address nvarchar (50) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	tx_address nvarchar (50) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	txid nvarchar (200) COLLATE Chinese_PRC_CI_AS NULL ,
	tx_confirmations int NOT NULL ,
	info nvarchar (100) COLLATE Chinese_PRC_CI_AS NULL ,
	withdraw_state int NOT NULL ,
	fee numeric(19, 8) NOT NULL ,
	fee_pay numeric(19, 8) NOT NULL ,
	admin_user_id int NOT NULL ,
	admin_info nvarchar (200) COLLATE Chinese_PRC_CI_AS NULL ,
	admin_ipv4 nvarchar (20) COLLATE Chinese_PRC_CI_AS NULL
	//增加货币类型
) ON PRIMARY
GO

--存款
CREATE TABLE dbo.tb_user_deposit (
	deposit_id int IDENTITY (1, 1) NOT NULL ,
	user_id int NOT NULL ,
	wallet_address nvarchar (50) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	confirmations int NOT NULL ,
	amount numeric(19, 8) NOT NULL ,
	txid nvarchar (200) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	tx_is_ok bit NOT NULL ,
	add_time datetime NOT NULL ,
	admin_user_id int NOT NULL ,
	admin_info nvarchar (200) COLLATE Chinese_PRC_CI_AS NULL ,
	admin_ipv4 nvarchar (20) COLLATE Chinese_PRC_CI_AS NULL
	//增加货币类型
) ON PRIMARY

GO

CREATE TABLE dbo.tb_address_multiaddrs (
	m_id int IDENTITY (1, 1) NOT NULL ,
	category nvarchar (10) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	account nvarchar (50) COLLATE Chinese_PRC_CI_AS NULL ,
	fee numeric(19, 8) NULL ,
	blockhash nvarchar (200) COLLATE Chinese_PRC_CI_AS NULL ,
	blockindex int NULL ,
	m_time bigint NULL ,
	txid nvarchar (200) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	blocktime bigint NULL ,
	amount numeric(19, 8) NOT NULL ,
	confirmations int NOT NULL ,
	timereceived bigint NULL ,
	address nvarchar (150) COLLATE Chinese_PRC_CI_AS NOT NULL ,
	is_load bit NOT NULL ,
	is_exist bit NOT NULL ,
	info nvarchar (100) COLLATE Chinese_PRC_CI_AS NULL
	//增加货币类型
) ON PRIMARY
GO

ALTER TABLE [dbo.[tb_user_withdraw] WITH NOCHECK ADD
	CONSTRAINT [PK_tb_user_withdraw] PRIMARY KEY  CLUSTERED 
	(
		[withdraw_id]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[tb_user_deposit] WITH NOCHECK ADD 
	CONSTRAINT [PK_tb_user_deposit] PRIMARY KEY  CLUSTERED 
	(
		[deposit_id]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[tb_address_multiaddrs] WITH NOCHECK ADD 
	CONSTRAINT [PK_tb_address_multiaddrs_item] PRIMARY KEY  CLUSTERED 
	(
		[m_id]
	)  ON [PRIMARY] 
GO

ALTER TABLE [dbo].[tb_user_withdraw] ADD 
	CONSTRAINT [DF_tb_user_withdraw_withdraw_add_time] DEFAULT (getdate()) FOR [add_time],
	CONSTRAINT [DF_tb_user_withdraw_withdraw_totle] DEFAULT (0.00000000) FOR [amount],
	CONSTRAINT [DF_tb_user_withdraw_tx_confirmations] DEFAULT (0) FOR [tx_confirmations],
	CONSTRAINT [DF_tb_user_withdraw_withdraw_state] DEFAULT (0) FOR [withdraw_state],
	CONSTRAINT [DF_tb_user_withdraw_withdraw_fee] DEFAULT (0.00000000) FOR [fee],
	CONSTRAINT [DF_tb_user_withdraw_fee1] DEFAULT (0.00000000) FOR [fee_pay],
	CONSTRAINT [DF_tb_user_withdraw_admin_user_id] DEFAULT (0) FOR [admin_user_id]
GO

 CREATE  INDEX [IX_tb_user_withdraw] ON [dbo].[tb_user_withdraw]([user_id]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[tb_user_deposit] ADD 
	CONSTRAINT [DF_tb_user_deposit_confirmations] DEFAULT (0) FOR [confirmations],
	CONSTRAINT [DF_tb_user_deposit_amount11] DEFAULT (0.00000000) FOR [amount],
	CONSTRAINT [DF_tb_user_deposit_deposit_totle] DEFAULT (0) FOR [tx_is_ok],
	CONSTRAINT [DF_tb_user_deposit_deposit_add_time] DEFAULT (getdate()) FOR [add_time],
	CONSTRAINT [DF_tb_user_deposit_admin_user_id] DEFAULT (0) FOR [admin_user_id]
GO

 CREATE  INDEX [IX_tb_user_deposit] ON [dbo].[tb_user_deposit]([user_id]) ON [PRIMARY]
GO

 CREATE  UNIQUE  INDEX [IX_tb_user_deposit_wallet_address] ON [dbo].[tb_user_deposit]([wallet_address], [txid]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[tb_address_multiaddrs] ADD 
	CONSTRAINT [DF_tb_address_multiaddrs_item_mi_value] DEFAULT (0.00000000) FOR [category],
	CONSTRAINT [DF_tb_address_multiaddrs_item_fee] DEFAULT (0.00000000) FOR [fee],
	CONSTRAINT [DF_tb_address_multiaddrs_item_m_is_use] DEFAULT (0.00000000) FOR [amount],
	CONSTRAINT [DF_tb_address_multiaddrs_item_confirmations] DEFAULT (0) FOR [confirmations],
	CONSTRAINT [DF_tb_address_multiaddrs_is_load] DEFAULT (0) FOR [is_load],
	CONSTRAINT [DF_tb_address_multiaddrs_is_exist] DEFAULT (0) FOR [is_exist]
GO

 CREATE  UNIQUE  INDEX [IX_tb_address_multiaddrs_item] ON [dbo].[tb_address_multiaddrs]([txid], [address]) ON [PRIMARY]
GO

ALTER TABLE [dbo].[tb_user_withdraw] ADD 
	CONSTRAINT [FK_tb_user_withdraw_tb_user] FOREIGN KEY 
	(
		[user_id]
	) REFERENCES [dbo].[tb_user] (
		[user_id]
	)
GO

ALTER TABLE [dbo].[tb_user_deposit] ADD 
	CONSTRAINT [FK_tb_user_deposit_tb_user] FOREIGN KEY 
	(
		[user_id]
	) REFERENCES [dbo].[tb_user] (
		[user_id]
	),
	CONSTRAINT [FK_tb_user_deposit_tb_user1] FOREIGN KEY 
	(
		[wallet_address]
	) REFERENCES [dbo].[tb_user] (
		[wallet_address]
	)
GO

