<?php

$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
DROP TABLE IF EXISTS `asiapay_ref`;
CREATE TABLE `asiapay_ref` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `Ref` varchar(32) DEFAULT NULL,
  `Ord` varchar(255) DEFAULT NULL,
  `PayRef` varchar(32) DEFAULT NULL,
  `successcode` tinyint(2) DEFAULT NULL,
  `Amt` decimal(8,2) DEFAULT NULL,
  `Cur` varchar(3) DEFAULT NULL,
  `Holder` varchar(255) DEFAULT NULL,
  `AuthId` varchar(32) DEFAULT NULL,
  `AlertCode` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `eci` varchar(3) DEFAULT NULL,
  `payerAuth` varchar(2) DEFAULT NULL,
  `sourceIp` varchar(64) DEFAULT NULL,
  `ipCountry` varchar(3) DEFAULT NULL,
  `payMethod` varchar(16) DEFAULT NULL,
  `panFirst4` varchar(4) DEFAULT NULL,
  `panLast4` varchar(4) DEFAULT NULL,
  `cardIssuingCountry` varchar(3) DEFAULT NULL,
  `channelType` varchar(3) DEFAULT NULL,
  `prc` tinyint(2) DEFAULT NULL,
  `src` tinyint(2) DEFAULT NULL,
  `TxTime` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Ref` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='asiapay datafeed';
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 