<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("order", "payref", array("type"=>"varchar"));
$installer->endSetup();
	 