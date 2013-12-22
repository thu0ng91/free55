--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '章节标题',
  `bookid` int(10) NOT NULL COMMENT '章节所属书籍',
  `chapter` smallint(6) DEFAULT NULL COMMENT '所属章节',
  `imgurl` varchar(255) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `recommendlevel` tinyint(2) DEFAULT '0',
  `hits` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter` (`chapter`),
  KEY `linkurl` (`linkurl`),
  KEY `bookid` (`bookid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '书名',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `cid` int(10) DEFAULT NULL COMMENT '栏目',
  `type` tinyint(1) DEFAULT NULL COMMENT '小说类型：1 连载 2 完本 ',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '封面图',
  `linkurl` varchar(200) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL COMMENT '简介',
  `keywords` varchar(100) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `recommendlevel` tinyint(2) DEFAULT '0' COMMENT '后台推荐等级',
  `hits` int(10) DEFAULT NULL COMMENT '点击数',
  `likenum` int(10) DEFAULT NULL COMMENT '用户推荐数',
  `favoritenum` int(11) DEFAULT NULL COMMENT '收藏数',
  `chaptercount` int(11) DEFAULT '0' COMMENT '章节数',
  `wordcount` int(11) DEFAULT NULL COMMENT '字数',
  `sections` varchar(500) DEFAULT NULL COMMENT '分卷，以换行符分隔',
  `lastchapterid` int(11) DEFAULT NULL COMMENT '最后更新章节编号',
  `lastchaptertitle` varchar(100) DEFAULT NULL COMMENT '最后更新章节名',
  `lastchaptertime` int(11) DEFAULT NULL COMMENT '章节最后更新时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_day`
--

DROP TABLE IF EXISTS `book_view_stats_by_day`;
CREATE TABLE IF NOT EXISTS `book_view_stats_by_day` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `day` date NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_month`
--

DROP TABLE IF EXISTS `book_view_stats_by_month`;
CREATE TABLE IF NOT EXISTS `book_view_stats_by_month` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `month` date NOT NULL COMMENT '日期，年月',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `book_view_stats_by_week`
--

DROP TABLE IF EXISTS `book_view_stats_by_week`;
CREATE TABLE IF NOT EXISTS `book_view_stats_by_week` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '小说标题',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `cid` int(11) DEFAULT NULL COMMENT '小说栏目',
  `hits` int(11) NOT NULL COMMENT '点击数',
  `year` year(4) NOT NULL COMMENT '当年年份',
  `week` tinyint(4) NOT NULL COMMENT '当年第几周',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(10) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` text,
  `createtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '更新时间',
  `isnav` tinyint(1) DEFAULT '0' COMMENT '是否显示在导航上，0 不显示 1 显示',
  `sort` tinyint(2) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `friend_link`
--

DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE IF NOT EXISTS `friend_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '站点名',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '站点LOGO',
  `linkurl` varchar(500) DEFAULT NULL COMMENT '站点地址',
  `sort` tinyint(2) NOT NULL DEFAULT '0' COMMENT '排序号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '新闻标题',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `cid` int(10) DEFAULT NULL COMMENT '栏目',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '封面图',
  `summary` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` text COMMENT '内容',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `hits` int(10) DEFAULT NULL COMMENT '点击数',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `news_category`
--

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(10) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` text,
  `createtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '更新时间',
  `sort` tinyint(2) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `realname` varchar(30) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_book_favorites`
--

DROP TABLE IF EXISTS `user_book_favorites`;
CREATE TABLE IF NOT EXISTS `user_book_favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0： 收藏 1：推荐',
  `title` varchar(100) NOT NULL COMMENT '小说名称',
  `bookid` int(10) NOT NULL COMMENT '小说编号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 表的结构 `ads`
--
DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(500) NOT NULL COMMENT '广告代码',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态： -1 删除 0 待审 1 正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- 表的结构 `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `name` varchar(50) NOT NULL COMMENT '模块名称：与模块目录名一致',
  `author` varchar(10) NOT NULL COMMENT '模块作者',
  `version` varchar(10) NOT NULL COMMENT '模块版本',
  `fwversion` varchar(10) NOT NULL COMMENT '模块所需最低飞舞系统版本',
  `description` varchar(500) NOT NULL COMMENT '模块描述',
  `createtime` int(11) NOT NULL COMMENT '模块引入系统时间',
  `updatetime` int(11) NOT NULL COMMENT '模块调整时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0 未安装 1 已安装 -1 已禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name_uniq` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;