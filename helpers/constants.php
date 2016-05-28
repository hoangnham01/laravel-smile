<?php
/**************************** GLOBAL ****************************/
#Pagination
define('NUM_PER_PAGE', 15);

#Type query
define('WHERE_AND', 'AND');
define('WHERE_OR', 'OR');
define('WHERE_IN', 'IN');
define('OR_WHERE_IN', 'OR_WHERE_IN');
define('OR_WHERE_NOT_IN', 'OR_WHERE_NOT_IN');
define('WHERE_NOT_IN', 'NOT IN');
define('WHERE_BETWEEN', 'BETWEEN');
define('WHERE_NOT_BETWEEN', 'NOT WHERE_OR');
define('WHERE_NULL', 'NULL');
define('WHERE_DATE', 'WHERE_DATE');
define('WHERE_DAY', 'WHERE_DAY');
define('WHERE_MONTH', 'WHERE_MONTH');
define('WHERE_YEAR', 'WHERE_YEAR');
define('WHERE_RAW', 'WHERE_RAW');
define('WHERE_RAW_OR', 'WHERE_RAW_OR');
define('ORDER_BY', 'ORDER BY');
define('GROUP_BY', 'GROUP_BY');
define('LIMIT', 'LIMIT');
define('SKIP', 'SKIP');
define('TAKE', 'TAKE');
define('MIN', 'MAX');
define('MAX', 'MAX');
define('INCREMENT', 'INCREMENT');
define('DECREMENT', 'DECREMENT');

#Status
define('STATUS_ACTIVATED', 1);
define('STATUS_DEACTIVATED', 0);
define('STATUS_PENDING', 2);
define('STATUS_DELETE', -1);
define('STATUS_FINISH', 3);

define('AJAX_VALIDATOR_FAILED', 422);
define('AJAX_SUCCESS', 200);
define('AJAX_FAILED', 0);
define('AJAX_INFO', 55);
define('AJAX_WARNING', 50);
define('CREATED_SUCCESS', 200);
define('CREATED_FAILED', 0);
define('UPDATED_SUCCESS', 200);
define('UPDATED_FAILED', 0);
define('DELETED_SUCCESS', 200);
define('DELETED_FAILED', 0);



/**************************** PROJECT ****************************/
define('BACKEND_PREFIX', 'backend');

#User
define('USER_ACTIVATED', 1);
define('USER_DEACTIVATED', 0);
define('USER_ACTIVE_DEFAULT', USER_ACTIVATED);
define('USER_GROUP_DEFAULT', 0);
define('USER_STATUS_DEFAULT', 1);
define('USER_STATUS_BAN', 2);

define('USER_AVATAR_DEFAULT', '/assets/img/anonymous.jpg');

# CONSTANT FOR UPLOAD FILE
define('PATH_UPLOAD_DEFAULT', 'uploads/defaults/');
define('PATH_UPLOAD_AVATAR', 'uploads/avatars/');

define('PATH_UPLOAD_POSTS', 'uploads/posts/');
define('PATH_UPLOAD_MEDIAS', 'uploads/medias/');
define('PATH_UPLOAD_SLIDERS', 'uploads/sliders/');
define('PATH_UPLOAD_IMAGES', 'uploads/images/');
define('PATH_UPLOAD_THUMBNAILS', 'uploads/thumbnails/');


define('GENDER_MALE', 1);
define('GENDER_FEMALE', 2);
define('GENDER_OTHER', 3);

#Cache
define('CORE_CACHE_GROUP', 'CORE_CACHE_GROUP');
define('CORE_CACHE_ROLE', 'CORE_CACHE_ROLE');

#media
define('MEDIA_TYPE_AUDIO', 'audio');
define('MEDIA_TYPE_VIDEO', 'video');