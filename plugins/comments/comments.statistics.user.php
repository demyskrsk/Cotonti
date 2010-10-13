<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=statistics.user
Tags=statistics.tpl:{STATISTICS_USER_COMMENTS}
[END_COT_EXT]
==================== */

/**
 * Comments system for Cotonti
 *
 * @package comments
 * @version 0.7.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2010
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

cot_require('comments', true);

$sql = $cot_db->query("SELECT COUNT(*) FROM $db_com WHERE com_authorid='".$usr['id']."'");
$user_comments = $sql->fetchColumn();
$t->assign(array(
	'STATISTICS_USER_COMMENTS' => $user_comments
));

?>