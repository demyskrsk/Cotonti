<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */

/**
 * Administration panel - Manager of comments
 *
 * @package comments
 * @version 0.7.0
 * @author Neocrome, Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2010
 * @license BSD
 */

(defined('SED_CODE') && defined('SED_ADMIN')) or die('Wrong URL.');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = sed_auth('plug', 'comments');
sed_block($usr['isadmin']);

sed_require('comments', true);

$t = new XTemplate(sed_skinfile('comments.tools', true));

$adminhelp = $L['plu_help_comments'];

$d = sed_import('d', 'G', 'INT');
$d = empty($d) ? 0 : (int) $d;

/* === Hook  === */
foreach (sed_getextplugins('admin.comments.first') as $pl)
{
	include $pl;
}
/* ===== */

if ($a == 'delete')
{
	sed_check_xg();
	sed_sql_delete($db_com, "com_id='$id'");

	$adminwarnings = ($sql) ? $L['adm_comm_already_del'] : $L['Error'];
}

$is_adminwarnings = isset($adminwarnings);

$totalitems = sed_sql_rowcount($db_com);

$pagenav = sed_pagenav('admin', 'm=tools&p=comments', $d, $totalitems, $cfg['maxrowsperpage'], 'd', '', $cfg['jquery'] && $cfg['turnajax']);

$sql = sed_sql_query("SELECT * FROM $db_com WHERE 1 ORDER BY com_id DESC LIMIT $d, ".$cfg['maxrowsperpage']);

$ii = 0;
/* === Hook - Part1 : Set === */
$extp = sed_getextplugins('admin.comments.loop');
/* ===== */
while ($row = sed_sql_fetcharray($sql))
{
	$row['com_text'] = htmlspecialchars(sed_cutstring($row['com_text'], 40));
	$row['com_type'] = mb_substr($row['com_code'], 0, 1);
	$row['com_value'] = $row['com_code'];

	switch ($row['com_area'])
	{
		case 'page':
			$row['com_url'] = sed_url('page', "id=".$row['com_value']."&comments=1", "#c".$row['com_id']);
		break;

		case 'weblogs':
			$row['com_url'] = sed_url('plug', 'e=weblogs&m=page&id='.$row['com_value'], '#c'.$row['com_id']);
		break;

		case 'gal':
			$row['com_url'] = sed_url('plug', 'e=gal&pic='.$row['com_value'], '#c'.$row['com_id']);
		break;

		case 'users':
			$row['com_url'] = sed_url('users', 'm=details&id='.$row['com_value'], '#c'.$row['com_id']);
		break;

		case 'polls':
			$row['com_url'] = sed_url('polls', 'id='.$row['com_value']."&comments=1", '#c'.$row['com_id']);
		break;

		case 'e_shop':
			$row['com_url'] = sed_url('plug', 'e=e_shop&sh=product&productID='.$row['com_value'], '#c'.$row['com_id']);
		break;

		default:
			$row['com_url'] = '';
		break;
	}

	$t->assign(array(
		'ADMIN_COMMENTS_ITEM_DEL_URL' => sed_url('admin', 'm=tools&p=comments&a=delete&id='.$row['com_id'].'&'.sed_xg()),
		'ADMIN_COMMENTS_ITEM_ID' => $row['com_id'],
		'ADMIN_COMMENTS_CODE' => $row['com_code'],
		'ADMIN_COMMENTS_AUTHOR' => $row['com_author'],
		'ADMIN_COMMENTS_DATE' => date($cfg['dateformat'], $row['com_date']),
		'ADMIN_COMMENTS_TEXT' => $row['com_text'],
		'ADMIN_COMMENTS_URL' => $row['com_url'],
		'ADMIN_COMMENTS_ODDEVEN' => sed_build_oddeven($ii)
	));
	/* === Hook - Part2 : Include === */
	foreach ($extp as $pl)
	{
		include $pl;
	}
	/* ===== */
	$t->parse('COMMENTS.ADMIN_COMMENTS_ROW');
	$ii++;
}

$t->assign(array(
	'ADMIN_COMMENTS_CONFIG_URL' => sed_url('admin', 'm=config&n=edit&o=plug&p=comments'),
	'ADMIN_COMMENTS_ADMINWARNINGS' => $adminwarnings,
	'ADMIN_COMMENTS_PAGINATION_PREV' => $pagenav['prev'],
	'ADMIN_COMMENTS_PAGNAV' => $pagenav['main'],
	'ADMIN_COMMENTS_PAGINATION_NEXT' => $pagenav['next'],
	'ADMIN_COMMENTS_TOTALITEMS' => $totalitems,
	'ADMIN_COMMENTS_COUNTER_ROW' => $ii
));

/* === Hook  === */
foreach (sed_getextplugins('admin.comments.tags') as $pl)
{
	include $pl;
}
/* ===== */

$t->parse('COMMENTS');
if (SED_AJAX)
{
	$t->out('COMMENTS');
}
else
{
	$adminmain = $t->text('COMMENTS');
}

?>