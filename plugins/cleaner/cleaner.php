<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin.home
[END_COT_EXT]
==================== */

/**
 * Will clean various things
 *
 * @package cleaner
 * @version 0.7.0
 * @author Neocrome, Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2010
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

if ($cfg['plugin']['cleaner']['userprune'] > 0)
{
	$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['userprune'] * 86400);
	$sqltmp1 = $db->query("SELECT user_id FROM $db_users WHERE user_maingrp='2' AND user_lastlog='0' AND user_regdate<$timeago");
	$sqltmp2 = $db->query("DELETE FROM $db_users WHERE user_maingrp='2' AND user_lastlog='0' AND user_regdate<$timeago");
	$deleted = $db->affectedRows;

	while ($row = $sqltmp1->fetch())
	{
		$sqltmp2 = $db->query("DELETE FROM $db_users WHERE user_id='".$row['user_id']."'");
		$sqltmp2 = $db->query("DELETE FROM $db_groups_users WHERE gru_userid='".$row['user_id']."'");
	}

	if ($deleted > 0)
	{
		cot_log("Cleaner plugin deleted ".$deleted." inactivated user account(s)", 'adm');
	}
}

if ($cfg['plugin']['cleaner']['logprune'] > 0)
{
	$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['logprune'] * 86400);
	$sqltmp = $db->query("DELETE FROM $db_logger WHERE log_date<$timeago");
	$deleted = $db->affectedRows;
	if ($deleted > 0)
	{
		cot_log('Cleaner plugin deleted '.$deleted.' log entries older than '.$cfg['plugin']['cleaner']['logprune'].' days', 'adm');
	}
}

if ($cfg['plugin']['cleaner']['refprune'] > 0 && $cot_plugins['tools']['referers'])
{
	$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['refprune'] * 86400);
	$sqltmp = $db->query("DELETE FROM $db_referers WHERE ref_date<$timeago");

	$deleted = $db->affectedRows;
	if ($deleted > 0)
	{
		cot_log('Cleaner plugin deleted '.$deleted.' referers entries older than '.$cfg['plugin']['cleaner']['refprune'].' days', 'adm');
	}
}

if ($cfg['pm'])
{
	require_once cot_incfile('pm', 'module');
	if ($cfg['plugin']['cleaner']['pmnotread'] > 0)
	{
		$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['pmnotread'] * 86400);
		$sqltmp = $db->query("DELETE FROM $db_pm WHERE pm_date<$timeago AND pm_tostate=0");

		$deleted = $db->affectedRows;
		if ($deleted > 0)
		{
			cot_log("Cleaner plugin deleted ".$deleted." PM not read since ".$cfg['plugin']['cleaner']['pmnotread']." days", 'adm');
		}
	}

	if ($cfg['plugin']['cleaner']['pmnotarchived'] > 0)
	{
		$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['pmnotarchived'] * 86400);
		$sqltmp = $db->query("DELETE FROM $db_pm WHERE pm_date<$timeago AND pm_tostate=1");

		$deleted = $db->affectedRows;
		if ($deleted > 0)
		{
			cot_log("Cleaner plugin deleted ".$deleted." PM not archived since ".$cfg['plugin']['cleaner']['pmnotarchived']." days", 'adm');
		}
	}

	if ($cfg['plugin']['cleaner']['pmold'] > 0)
	{
		$timeago = $sys['now_offset'] - ($cfg['plugin']['cleaner']['pmold'] * 86400);
		$sqltmp = $db->query("DELETE FROM $db_pm WHERE pm_date<$timeago");

		$deleted = $db->affectedRows;
		if ($deleted > 0)
		{
			cot_log("Cleaner plugin deleted ".$deleted." PM older than ".$cfg['plugin']['cleaner']['pmold']." days", 'adm');
		}
	}
}

?>