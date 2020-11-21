<?php

namespace Yunpian\Sdk\Constant;

interface YunpianConstant
{

    /**
     * ************************** http ************************************
     */
    public const HTTP_CONN_TIMEOUT = 'http.conn.timeout';
    public const HTTP_SO_TIMEOUT = 'http.so.timeout';
    public const HTTP_CHARSET = 'http.charset';
    public const HTTP_CONN_MAXPREROUTE = 'http.conn.maxpreroute';
    public const HTTP_CONN_MAXTOTAL = 'http.conn.maxtotal';
    public const HTTP_SSL_KEYSTORE = 'http.ssl.keystore';
    public const HTTP_SSL_PASSWD = 'http.ssl.passwd';

    public const HTTP_CHARSET_DEFAULT = 'utf-8';

    /**
     * ************************** yunapian.properties ************************************
     */
    public const YP_FILE = 'yp.file';
    public const YP_APIKEY = 'yp.apikey';
    public const YP_VERSION = 'yp.version';
    public const YP_USER_HOST = 'yp.user.host';
    public const YP_SIGN_HOST = 'yp.sign.host';
    public const YP_TPL_HOST = 'yp.tpl.host';
    public const YP_SMS_HOST = 'yp.sms.host';
    public const YP_VOICE_HOST = 'yp.voice.host';
    public const YP_FLOW_HOST = 'yp.flow.host';
    public const YP_CALL_HOST = 'yp.call.host';
    public const YP_VSMS_HOST = 'yp.vsms.host';

    /**
     * ************************** api ************************************
     */
    public const VERSION_V1 = 'v1';
    public const VERSION_V2 = 'v2';

    public const APIKEY = 'apikey';

    // 返回值字段
    public const CODE = 'code';
    public const MSG = 'msg';
    public const DETAIL = 'detail';
    public const DATA = 'data';

    // user
    public const USER = 'user';
    public const BALANCE = 'balance';
    /**
     * 紧急联系人电话
     */
    public const EMERGENCY_MOBILE = 'emergency_mobile';
    public const EMERGENCY_CONTACT = 'emergency_contact';

    /**
     * 余额告警阈值
     */
    public const ALARM_BALANCE = 'alarm_balance';
    public const IP_WHITELIST = 'ip_whitelist';
    public const EMAIL = 'email';
    public const MOBILE = 'mobile';
    public const GMT_CREATED = 'gmt_created';
    public const API_VERSION = 'api_version';

    // sign
    public const SIGN = 'sign';
    public const NOTIFY = 'notify';
    public const APPLYVIP = 'apply_vip';
    public const ISONLYGLOBAL = 'is_only_global';
    public const INDUSTRYTYPE = 'industry_type';
    public const OLD_SIGN = 'old_sign';

    // tpl
    /**
     * 模板id
     */
    public const TPL_ID = 'tpl_id';
    /**
     * 模板值
     */
    public const TPL_VALUE = 'tpl_value';
    /**
     * 模板内容
     */
    public const TPL_CONTENT = 'tpl_content';
    public const CHECK_STATUS = 'check_status';
    public const REASON = 'reason';
    public const TEMPLATE = 'template';
    public const LAYOUT = 'layout';
    public const MATERIAL = 'material';
    /**
     * 模板语言
     */
    public const LANG = 'lang';
    public const COUNTRY_CODE = 'country_code';
    public const NOTIFY_TYPE = 'notify_type';

    // call
    public const FROM = 'from';
    public const TO = 'to';
    public const DURATION = 'duration';
    public const AREA_CODE = 'area_code';
    public const MESSAGE_ID = 'message_id';
    public const ANONYMOUS_NUMBER = 'anonymous_number';
    public const PAGE_SIZE = 'page_size';

    // flow
    public const CARRIER = 'carrier';
    public const FLOW_PACKAGE = 'flow_package';
    public const _SIGN = '_sign';
    public const CALLBACK_URL = 'callback_url';
    public const RESULT = 'result';
    public const FLOW_STATUS = 'flow_status';

    // voice
    public const DISPLAY_NUM = 'display_num';
    public const VOICE_STATUS = 'voice_status';

    // sms
    public const EXTEND = 'extend';
    public const SMS_STATUS = 'sms_status';
    public const SMS_REPLY = 'sms_reply';
    public const SMS = 'sms';
    public const TOTAL = 'total';

    public const NICK = 'nick';
    public const UID = 'uid';

    public const TEXT = 'text';
    public const START_TIME = 'start_time';
    public const END_TIME = 'end_time';
    public const PAGE_NUM = 'page_num';

    /**
     * 流量充值参数
     */
    public const SN = 'sn';

    public const COUNT = 'count';
    public const FEE = 'fee';
    public const UNIT = 'unit';

    public const SID = 'sid';

    /**
     * batch_send 接口 增添的返回值名
     */
    public const TOTAL_COUNT = 'total_count';
    public const TOTAL_FEE = 'total_fee';

    public const SEPERATOR_COMMA = ',';

    public const RECORD_ID = 'record_id';
}
