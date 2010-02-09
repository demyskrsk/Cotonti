<?php
/**
 * User registration
 */

$L['aut_contactadmin'] = 'В случае необходимости свяжитесь с администратором';
$L['aut_emailalreadyindb'] = 'Такой e-mail уже существует в базе данных';
$L['aut_emailbanned'] = 'Данный e-mail (или хост) заблокирован. Причина: ';
$L['aut_emailtooshort'] = 'Ошибочный e-mail';
$L['aut_invalidloginchars'] = 'Логин содержит недопустимые символы'; // 0.6.6
$L['aut_logintitle'] = 'Авторизация';
$L['aut_mailnoticetitle'] = 'Смена e-mail'; // New in N-0.1.0
$L['aut_passwordmismatch'] = 'Введенные пароли не совпадают';
$L['aut_passwordtooshort'] = 'Пароль должен состоять из 4 или более символов: букв, цифр и символа подчеркивания';
$L['aut_registersubtitle'] = 'Заполните регистрационную форму в соответствии с указанными требованиями';
$L['aut_registertitle'] = 'Регистрация нового пользователя';
$L['aut_regreqnoticetitle'] = 'Запрос на регистрацию новой учетной записи';
$L['aut_regrequesttitle'] = 'Регистрация нового пользователя';
$L['aut_usernamealreadyindb'] = 'Пользователь с таким именем уже зарегистрирован в базе данных';
$L['aut_usernametooshort']= 'Имя пользователя должно состоять из 2 или более символов';

/**
 * User registration: messages
 */

$L['aut_regrequest'] = 'Здравствуйте, %1$s,
Ваша учетная запись в настоящий момент еще не активирована. Прежде чем вы сможете авторизоваться, администратор сайта должен активировать вашу учетную запись, после чего вам будет направлено еще одно подтверждение. После этого вы сможете авторизоваться, используя следующие реквизиты:
Имя пользователя = %1$s
Пароль = %2$s';

$L['aut_regreqnotice'] = 'Данное письмо направлено вам после запроса регистрации учетной записи пользователя %1$s.
Пользователь %1\$s не сможет авторизоваться до тех пор, пока его учетная запись не будет активирована по следующей ссылке:
%2\$s';

$L['aut_emailreg'] = 'Здравствуйте, %1$s,
Вам необходимо активировать учетную запись, используя следующую ссылку:
%3$s
После активации учетной записи вы сможете авторизоваться на сайте, используя следующие реквизиты:
Имя = %1$s
Пароль = %2$s
Чтобы отменить активацию учетной записи воспользуйтесь следующей ссылкой:
%4$s';

$L['aut_emailchange'] = 'Здравствуйте, %1$s,
Чтобы изменить ваш e-mail адрес, воспользуйтесь следующей ссылкой:
%2$s';	// New in N-0.1.0

/**
 * Users
 */

$L['pro_avatarnotvalid'] = 'Этот аватар не является %1$s-файлом.';	// New in N-0.0.2
$L['pro_avatarschoose'] = 'В качестве своего аватара выберите следующие изображения';
$L['pro_avatarspreset'] = '...или выбрать аватар из списка доступных';
$L['pro_avatarsupload'] = 'Загрузить аватар';
$L['pro_avataruploadfailed'] = 'Ошибка загрузки: удалите старый аватар!';
$L['pro_emailandpass'] = 'Вы не можете изменить и e-mail и пароль одновременно'; // New in N-0.0.5
$L['pro_passdiffer'] = 'Введенные пароли не совпадают';
$L['pro_passtoshort'] = 'Пароль должен состоять из 4 или более символов: букв, цифр и символа подчеркивания';
$L['pro_photonotvalid'] = 'Это фото не является %1$s-файлом.';	// New in N-0.0.2
$L['pro_photoupload'] = 'Загрузить фото';
$L['pro_sigotvalid'] = 'Эта подпись не является %1$s-файлом.';	// New in N-0.0.2
$L['pro_sigupload'] = 'Загрузить подпись';
$L['pro_subtitle'] = 'Настройки ваших личных данных';
$L['pro_title'] = 'Ваша учетная запись';
$L['pro_wrongpass'] = 'Вы не ввели текущий пароль либо он неверен';

$L['useed_accountactivated'] = 'Учетная запись активирована';
$L['useed_email'] = 'Данное письмо направлено вам после активации вашей учетной записи. Теперь вы можете авторизоваться на сайте, используя имя пользователя и пароль, полученные в предыдущем письме.';
$L['useed_subtitle'] = '&nbsp;';
$L['useed_title'] = 'Правка';

$L['use_allbannedusers'] = 'Заблокированные учетные записи';
$L['use_allinactiveusers'] = 'Неактивированные учетные записи';
$L['use_allusers'] = 'Все пользователи';
$L['use_byfirstletter'] = 'Имена пользователей на';
$L['use_subtitle'] = 'Зарегистрированные пользователи';
$L['use_title'] = 'Пользователи';

$L['pasrec_title'] = 'Восстановление пароля';
$L['pasrec_email1'] = 'Используйте указанную ниже ссылку для смены пароля:';	// New in N-0.0.2
$L['pasrec_email1b'] = 'Внимание: если вы не обращались за сменой пароля, сообщаем вам, что запрос был сделан %2$s с IP-адреса %1$s.';	// New in N-0.1.0
$L['pasrec_email2'] = 'По вашему запросу создан новый пароль. Измените его при первой возможности и удалите данное письмо. Ваш новый пароль:'; // New in N-0.0.2
$L['pasrec_explain1'] = '1. Введите ваш email.';
$L['pasrec_explain2'] = '2. Получив письмо, воспользуйтесь ссылкой для смены пароля.';
$L['pasrec_explain3'] = '3. Дважды подтвердив смену пароля, вы получите email с паролем, сгенерированным случайным образом.';
$L['pasrec_explain4'] = 'Если вы очистили поле для email\'а в своем профиле, восстановить пароль самостоятельно вы не сможете.<br />В этом случае вам необходимо отправить Email администратору сайта.';
$L['pasrec_mailsent'] = 'Письмо отправлено. Проверьте свой почтовый ящик и воспользуйтесь отправленной вам ссылкой.<br />Затем следуйте инструкциям по установке нового пароля.';
$L['pasrec_mailsent2'] = 'Пароль изменен. Пожалуйста, проверьте ваш почтовый ящик через несколько минут, чтобы получить новый пароль.'; // New in N-0.0.2
$L['pasrec_request'] = 'Запрос';
$L['pasrec_youremail'] = 'Ваш email: ';

?>
