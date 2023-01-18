<?php

defined('USER_IS_NOT_ADMIN') or define('USER_IS_NOT_ADMIN', 0);
defined('USER_IS_ADMIN') or define('USER_IS_ADMIN', 1);

defined('POST_PUBLISHED') or define('POST_PUBLISHED', 1);
defined('POST_DRAFT') or define('POST_DRAFT', 2);

defined('COMMENT_PENDING') or define('COMMENT_PENDING', 0);
defined('COMMENT_APPROVED') or define('COMMENT_APPROVED', 1);
defined('COMMENT_DISAPPROVED') or define('COMMENT_DISAPPROVED', 2);

defined('USER_MAX_NUMB_SEED') or define('USER_MAX_NUMB_SEED', 15);
defined('POST_MAX_NUMB_SEED') or define('POST_MAX_NUMB_SEED', 15);
defined('CATEGORY_MAX_NUMB_SEED') or define('CATEGORY_MAX_NUMB_SEED', 4);
defined('TAG_MAX_NUMB_SEED') or define('TAG_MAX_NUMB_SEED', 15);
defined('COMMENT_MAX_NUMB_SEED') or define('COMMENT_MAX_NUMB_SEED', 30);

defined('POST_SAMPLE_IMAGE') or define('POST_SAMPLE_IMAGE', 'post_sample_image.jpg');
