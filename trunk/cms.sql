-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 25 日 17:30
-- 服务器版本: 5.5.24
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `archive`
--

CREATE TABLE IF NOT EXISTS `archive` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `catalog_id` int(10) NOT NULL COMMENT '所属栏目',
  `title` char(100) NOT NULL COMMENT '标题',
  `author` int(10) NOT NULL COMMENT '发布者',
  `pubtime` int(10) NOT NULL COMMENT '发布时间',
  `image` char(100) NOT NULL COMMENT '图片',
  `memo` longtext NOT NULL COMMENT '正文',
  `status` enum('notaudit','normal','deleted') NOT NULL DEFAULT 'notaudit' COMMENT '文章状态',
  `url` char(250) NOT NULL DEFAULT '' COMMENT '跳转链接',
  `recommend` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否为推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `archive`
--

INSERT INTO `archive` (`id`, `catalog_id`, `title`, `author`, `pubtime`, `image`, `memo`, `status`, `url`, `recommend`) VALUES
(1, 1, 'STS 8105A 混合信号测试系统', 1, 1338904246, '/upload/image/20120613/20120613224522_93421.jpg', '<p>\r\n	<span style=\\"white-space:nowrap;\\">&nbsp;哪些人需要摄入营养补剂？</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 营养补剂的推出，只是作为日常饮食的一种补充，而不能完全代替营养丰富的天然食品。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp;&nbsp;</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “营养补剂能够强化食品中所缺乏的营养成分，但是，它们并不能代替健康的天然食品。”美国营养协会的发言人戴维·格罗特说。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 不过，有一些人还是需要摄入营养补剂，因为他们所需要的维生素以及微量元素，仅靠天然食品，很难保证充足的供应量。这些人群包括：</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; ●怀孕的妇女。 ●哺乳期的妇女。 ●长期吃素的人。 ●有食物变态反应或者无法吃天然食品的人。 ●老年人。 ●运动员。 ●患有癌症、肾脏疾病、心血管疾病或者骨骼疾病的人。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 不论人们是否需要营养补剂，统计数字显示，很多人都在购买营养补剂。以下就是《营养补剂商业》杂志调查发现的十种最流行营养补剂，以及营养专家的解读。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 1 复合维生素</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 复合维生素补剂的销售额领跑所有营养补剂，而且理由很充分。长期以来，人们一直认为，摄入复合维生素与微量元素补剂，是保证满足日常营养元素需要的“保险措施”。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “只要你选择的是适合自己年龄和性别的复合维生素补剂，每天摄入一次，是不会带来什么副作用的，”格罗特说，“你可以每天摄入一次复合维生素补剂，也可以只在饮食供应不充分的日子里摄入。不过，与摄入复合维生素补剂相比，确保维生素充足供应的最佳办法，还是通过天然食品。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 2 正餐替代补剂</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 很多人并不把正餐替代补剂当成是营养补剂。但由于它只是正常饮食的一种补充，所以，还是入选了本文。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 对于那些由于疾病等原因，无法进食天然食品的人来说，正餐替代补剂的确是很好的替代选择。但是，格罗特指出，只要有可能，还是应该尽量选择营养丰富的纯天然食品。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 至于正餐替代补剂对控制体重的作用，专家们认为，使用正餐替代补剂的确有助于控制热量的摄入，不过，只有和锻炼以及良好的饮食计划和健康的生活方式结合起来，它们才能真正地发挥作用。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 3 运动营养补剂</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 运动营养补剂所包含的品种非常多，包括运动能力增强补剂，以及减体重补剂等。其存在形式也非常多样化，有粉末状的，有药片形的，也有胶囊和饮料形式的。其中，最受欢迎的是肌酸、氨基酸、蛋白粉和减脂剂。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “这类补剂产生效果的速度比较缓慢，你不可能在使用一周之后，肌肉就增加好几磅。但是，研究表明，如果恰当使用，它们能带给你一定的优势，但绝不是压倒性的优势。”营养学博士安德鲁·修阿说。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 佩恩大学运动营养学主任克莉斯·克拉克博士说，她为大学生选择运动营养补剂的时候，是非常慎重的。“我们主要还是通过选择天然食品，合理安排进餐和补充液体的时间，来增强运动员的运动能力。除了在训练和比赛之后使用一些营养补剂来促进肌肉恢复之外，一般情况下，我会劝阻运动员使用运动营养补剂。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 她更喜欢让运动员喝巧克力牛奶，她认为，这种包含了蛋白质、碳水化合物和水分的饮料，是非常好的促进身体恢复的饮料。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “肌酸是目前最流行的运动营养补剂之一。大量的研究表明：肌酸能促进短跑、举重等从事短时间、高强度运动项目的运动员的肌肉恢复，”克拉克说，“但是，肌酸对耐力性运动项目的运动员以及业余水平的运动员，并没有十分明显的效果。”此外，克拉克还建议任何使用肌酸的人，都要多喝水，以避免身体脱水。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “在一些运动营养补剂中，还含有兴奋性成分，”克拉克说，“比如，一些运动营养补剂，为了增强运动员的运动能力，会添加咖啡因。即便如此，运动营养补剂也不是灵丹妙药，而只能是作为健康饮食和科学训练的一种补充。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 与摄入运动营养补剂相比，克拉克更愿意直接选择含有咖啡因的饮料。“你完全可以通过喝咖啡达到同样的运动能力，而且，这样做也更安全。而运动营养补剂中，常会含有一些秘密的成分，可能会对身体具有潜在的危险性。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 4 钙</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 在国人的饮食中，普遍缺乏钙元素。但是，专家指出，只要有可能，你都应该通过选择钙含量丰富的食品，比如奶制品、营养强化食品、绿色蔬菜、大豆、鱼和葡萄干等来补钙。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 据《2005年美国膳食指导方针》推荐，每天摄入三份低脂肪，或者脱脂的奶制品，就能满足一天的钙需求量。虽然奶制品是最佳的钙元素来源，但是，有很多人都不能摄入奶制品。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “很多人误解了乳糖敏感和乳糖不耐受，以为自己属于乳糖不耐受人群，”格罗特说，“如果你并没有被专家诊断为乳糖不耐受，请再给奶制品一次机会。刚开始的摄入量不要太大，你可以在进餐的时候摄入少量的奶制品，或者尝试一些乳糖含量较低的奶制品，比如陈年奶酪，或者酸奶。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “如果你一定要选择含钙的营养补剂，最好是选择柠檬酸钙，或者是乳酸钙。因为这两种形式的钙盐，最容易被身体吸收。”格罗特说。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 5 B族维生素</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; B族维生素包括硫胺（维生素B1）、烟酸、核黄素、维生素B3、维生素B6和维生素B12。专家们指出，很多人其实并不需要摄入这类补剂。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “有些人之所以喜欢摄入B族维生素补剂，是因为他们认为，B族维生素能帮助他们减轻压力，提高生活质量。”格罗特说，“但是，并没有太多的科研成果证实这样的说法。此外，在我们的日常饮食中，本身就含有丰富的B族维生素。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 只有一种情况例外，那就是老年人可能需要额外补充维生素B12，因为，当年纪变大之后，从食物中吸收的维生素B12会减少。所以，大多数人都应该放弃摄入B族维生素补剂，只要多摄入一些谷物类食品、绿色蔬菜、橙汁和营养强化食品，就能获得充足的B族维生素。不过，患有某些疾病，或者摄入一些能影响维生素吸收的药物的人，可能会需要摄入B族维生素补剂。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 6 维生素C</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 很多人经常摄入维生素C的原因，是为了预防感冒。虽然，摄入维生素Ｃ也许能减轻感冒的严重程度或者是持续时间，同时也不会造成什么伤害，但由于维生素Ｃ是一种水溶性的维生素，不可能在体内储存，多余的部分会很快被身体排泄到体外。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 如果你正处于受伤后的恢复阶段，摄入维生素Ｃ也许会有所帮助。不过，对一般人来说，只需要摄入富含维生素Ｃ的天然食品就可以了。富含维生素Ｃ的天然食品包括橙子、辣椒、柚子、桃子、木瓜、菠萝、西兰花、草莓、西红柿和甜瓜。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 7 氨基葡萄糖和软骨素</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 那些关节疼痛的人，经常会摄入这两种营养补剂。不过单独使用其中的一种并不能明显缓解关节炎患者的疼痛，只有二者联合应用，才能对缓解关节疼痛有一定效果。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “大约40%的骨关节炎患者，在连续4〜8周、每天联合摄入1500毫克氨基葡萄糖以及1200毫克软骨素硫酸盐之后，都看到了不错的疗效。”风湿病学家爱德华·巴尔特说，“不过，大多数患者在摄入氨基葡萄糖和软骨素的同时，还摄入了镇痛剂，比如羟苯基乙酰胺。”　　</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 8 顺势疗法药物</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 从严格意义上来说，顺势疗法药物并不属于膳食营养补剂，尽管如此，它们仍然是一个受欢迎的营养补剂类别。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 顺势疗法是一种可以追溯到18世纪晚期的医学哲学。其原理是基于我们的身体具有自我康复的本能。所以，如果某些物质会导致健康的身体产生一些疾病症状，那么，让生病的人摄入非常微量的导致疾病症状的物质，反而可能会使疾病治愈。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “一般来说，顺势疗法是有益的，因为药物的使用量是非常微量的，并不会导致有害的后果，”格罗特说，“ 但是，目前市面上出现了一些打着顺势疗法药物的幌子，大行其道的营养补剂，并声称能清洁肾脏、肝脏以及其他人体组织。其实，它们并不是严格意义上的顺势疗法药物。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 格罗特建议大家在使用打着顺势疗法药物旗号的营养补剂之前，先咨询有关专家，不要自己盲目尝试。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 9 维生素D</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 很多人的维生素D摄入量都是不充足的。“目前官方推荐的维生素D摄入量，并不足以帮助我们预防慢性疾病和骨质疏松症，”维生素D研究专家迈克尔·霍利克说，“所有的证据都表明，从婴儿到成年人，都可以每天摄入高达1000国际单位的维生素D，而不会有中毒的危险。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 霍利克建议大家每天都摄入维生素D补剂，或者确保充足的日照量，以便确保血液中的维生素D保持在恰当的水平。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 此外，还应该摄入多样化的，富含维生素D的食品，比如营养强化牛奶、麦片粥、鲑鱼和金枪鱼。想通过日晒增加体内维生素D含量的人，最好是事先咨询一下皮肤科医生。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 10 鱼油/动物油补剂</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “市面上出售的这类营养补剂，95%都是来自于鱼类，而不是动物油，”瑞恩说，“除非医生建议你使用鱼油补剂来对付心脏病或者高甘油三酯，否则，你就不应该摄入鱼油补剂。”塔夫茨大学的研究员，美国心脏协会（AHA）营养委员会的主席——爱丽丝·利希滕斯坦说。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; “研究表明，欧米茄－3脂肪酸的确具有保护心脏的作用，所以，美国心脏协会建议人们每周摄入脂肪含量比较高的鱼类两次。”利希滕斯坦说，“不过，研究并没有表明，补充鱼油补剂，对健康人也有同样的益处。”利希滕斯坦补充道：“很多人误认为鱼油可以降低胆固醇水平，而实际情况却并非如此。”</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 如果你不喜欢吃那些脂肪含量较高的鱼，比如鲑鱼，利希滕斯坦建议你吃其他类型的鱼，比如，罐装的金枪鱼（但应该避开那些裹上面包糠之后烹制的鱼类，尤其是油炸的鱼类）。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 专家们指出，虽然很多食品，比如蓖麻油、大豆、亚麻籽和核桃，都富含欧米茄－3脂肪酸，但是，它们都不能完全取代脂肪含量比较高的鱼类。</span><br />\r\n<span style=\\"white-space:nowrap;\\">&nbsp; &nbsp; 尽管如此，专家仍建议大家摄入欧米茄－3脂肪酸补剂，因为，大多数人都没能做到美国心脏协会推荐的每周吃两次富含脂肪的鱼类。此外，由于害怕水产品中的水银残留对健康造成危害，要想全靠食物确保充足的欧米茄－3脂肪酸供应，难度还是蛮大的。</span> \r\n</p>', 'normal', '', 0),
(2, 8, '单位简介', 1, 1339222000, '/upload/image/20120613/20120613224554_67293.jpg', '单位简介', 'normal', '', 1),
(3, 4, '逢领土争端就提“中美对立”非强硬，而是不明智', 1, 1339222025, '/upload/image/20120611/20120611164112_79150.jpg', '<span style=\\"white-space:nowrap;\\"> \r\n<p class=\\"\\\\&quot;tit_td\\\\&quot;\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:simsun;word-break:break-all;font-size:14px;font-weight:bold;line-height:26px;color:#81511C;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	逢领土争端就提“中美对立”非强硬，而是不明智\r\n</p>\r\n<p class=\\"\\\\&quot;txt_td\\\\&quot;\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	以黄岩岛为例，稍作分析，就发现用这种思维来解决领土争端、外交纠纷非常僵硬。\r\n</p>\r\n<p class=\\"\\\\&quot;txt_td\\\\&quot;\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	所谓博弈，就是牵涉多方的利益和冲突，中美固然有利益冲突，但同样有巨大的共同利益，譬如黄岩岛对峙期间，中美经济对话正在举行；而美菲虽然是同盟，但菲律宾民众对美国却存在一定的不满情绪，2011年希拉里访菲期间，就曾遭到了菲律宾民众的抗议，不仅在菲律宾，在越南、日本这些国家，美国领导人的访问大抵也会有这个下场。比较奇怪的是，作为一有领土争端、外交纠纷时，作为中国“敌人”形象出现的美国，其领导在中国却从未遭遇这样的待遇。<a href=\\"\\\\&quot;http://view.news.qq.com/a/20120624/000003.htm\\\\&quot;\\" target=\\"\\\\&quot;_blank\\\\&quot;\\" style=\\"text-decoration:none;color:#81511C;\\">…[详细]</a> \r\n</p>\r\n<p class=\\"\\\\&quot;txt_td\\\\&quot;\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	逢领土争端、外交纠纷就提“中美对立”，把美国、菲律宾塑造为共同敌人，这绝非强硬，这种把自己沦为孤家寡人的思维实在太不明智。\r\n</p>\r\n</span>', 'normal', '/survey', 1),
(4, 3, '领土纠纷，美国常捣鬼，中国不能畏惧豪强，“中国该硬起来”？', 1, 1339222050, '/upload/image/20120613/20120613224627_28528.png', '<p class=\\"tit_td\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:simsun;word-break:break-all;font-size:14px;font-weight:bold;line-height:26px;color:#81511C;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	领土纠纷，美国常捣鬼，中国不能畏惧豪强，“中国该硬起来”？\r\n</p>\r\n<p class=\\"txt_td\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	另一种普遍的说法是，黄岩岛问题上，美国是菲律宾强硬后盾：菲美《共同防御条约》，是越来越紧密的军事安全同盟，奥巴马政府宣布“重返亚太”的战略。衰落的美国，无力独立在亚洲对抗迅速崛起的中国。更愿意用挑拨的手段，扶持菲律宾这样和中国有海权之争的国家，作为自己的“人肉盾牌”和牵制中国的代理人。\r\n</p>\r\n<p class=\\"txt_td\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	可以看到，在中越南海、中日钓鱼岛问题上，说法基本类似。近年来中国多数领土纠纷，“美国人捣鬼”、 “中美对立”必然首先提及。于是又有了下面这些“硬起来”的说法：\r\n</p>\r\n<p class=\\"txt_td\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	南海危机说句实话，就是美国人背后捣鬼，想把中国拖进战争泥潭的阴谋；中国的国力和军力如此强大，周边国家包括越南，已经相当害怕了，应该杀鸡给猴看，警告警告美国；我们不需要谁来撑腰，中国人是绝对不允许任何人来强占强割我们的领土。豺狼了来我们有的是能力对付！\r\n</p>\r\n<p class=\\"txt_td\\" style=\\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:10px;font-family:simsun;word-break:break-all;font-size:14px;line-height:26px;text-indent:2em;color:#2B2B2B;text-align:left;white-space:normal;background-color:#F9F9F9;\\">\r\n	总而言之，即便他们有美国人撑腰，中国也不能畏惧豪强，该硬起来\r\n</p>\r\n<br />', 'normal', '', 1),
(5, 3, '总体评价结果总体评价结果总体评价结果总体评价结果总体评价结果总体评价结果总体评价结果', 1, 1339222066, '', '', 'normal', '', 0),
(6, 8, '单位简介', 1, 1339252797, '', '单位简介', 'normal', '', 0),
(7, 4, 'STS 2101B 数字集成电路测试系统', 1, 1339254475, '', '', 'normal', '', 0),
(8, 8, '饮食文化建设情况', 1, 1339254486, '', '', 'normal', '', 0),
(9, 1, 'ADC测试技术论文获“第二届元器件可靠性交流会”论文一等奖', 1, 1339254498, '', 'dddd', 'normal', '', 0),
(10, 8, '单位简介', 1, 1339254525, '', '', 'normal', '', 0),
(11, 1, '应用开发工程师', 1, 1339254537, '', '', 'normal', '', 0),
(12, 1, 'ADC测试技术论文获“第二届元器件可靠性交流会”论文一等奖', 1, 1339255161, '', '', 'normal', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级栏目',
  `name` char(100) NOT NULL COMMENT '栏目名称',
  `type` enum('page','link','list','channel') NOT NULL COMMENT '栏目类型',
  `url` char(200) NOT NULL COMMENT '跳转位置',
  `memo` longtext NOT NULL COMMENT '栏目描述',
  `isnavi` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否作为导航',
  `priority` int(10) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='栏目信息表' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `catalog`
--

INSERT INTO `catalog` (`id`, `pid`, `name`, `type`, `url`, `memo`, `isnavi`, `priority`) VALUES
(1, 0, '基本内涵', 'list', '', 'dd', 1, 100),
(2, 0, '制度成果', 'list', '', '', 1, 100),
(3, 0, '典型经验', 'list', '', '', 1, 100),
(4, 0, '建设风采', 'list', '', '', 1, 100),
(5, 0, '先进标兵', 'list', '', '', 1, 100),
(6, 0, '总体评价', 'link', '/survey', '', 1, 100),
(7, 0, '部门主页', 'channel', '', '', 0, 100),
(8, 7, '总装备部后勤部食堂', 'list', '', '<br />', 0, 100),
(9, 8, '食堂简介', 'page', '', '食堂简介', 0, 100),
(10, 7, '解放军306医院食堂', 'channel', '', '', 0, 100),
(11, 7, '国防科技大学食堂', 'list', '', '', 0, 100),
(12, 7, '人民武装部食堂', 'list', '', '', 0, 100),
(13, 7, '二炮食堂', 'list', '', '', 0, 100),
(14, 7, '总参谋部食堂', 'list', '', '', 0, 100),
(15, 10, '单位简介', 'list', '', '', 0, 100),
(16, 0, '资质荣誉', 'list', '', 'dd', 1, 100),
(17, 0, '修改菜单', 'list', '', '', 1, 100);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `department_id` int(10) NOT NULL COMMENT '部门',
  `author` char(40) NOT NULL COMMENT '创建者',
  `content` char(255) NOT NULL COMMENT '内容',
  `pubtime` int(10) NOT NULL COMMENT '发布时间',
  `reply` char(255) NOT NULL DEFAULT '' COMMENT '回复',
  `replytime` int(10) NOT NULL DEFAULT '0' COMMENT '回复时间',
  `status` enum('notaudit','normal','replied') NOT NULL DEFAULT 'notaudit' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `department_id`, `author`, `content`, `pubtime`, `reply`, `replytime`, `status`) VALUES
(1, 2, '姜纯洋', '留言', 1338976770, '回复', 1338999436, 'replied'),
(2, 2, '姜纯洋', '留言2', 1338976811, '回复', 1338999392, 'replied'),
(3, 1, '管理员', '测试', 1339064002, '', 0, 'notaudit'),
(4, 2, '校园', 'dfasdfasdfads', 1339263594, '', 0, 'notaudit');

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '单位编号',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级单位',
  `name` char(100) NOT NULL COMMENT '单位名称',
  `url` char(250) NOT NULL COMMENT '单位主页',
  `memo` longtext NOT NULL COMMENT '部门简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`id`, `pid`, `name`, `url`, `memo`) VALUES
(1, 0, '产品事业部', '/admin/menu/edit', ''),
(2, 1, '及时通讯', '', ''),
(3, 1, '产品设计中心', '', ''),
(4, 3, '设计组', '', ''),
(5, 3, '前端组', '', ''),
(6, 3, '页面构建组', '', ''),
(7, 0, '游戏事业部', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `department_id` int(10) NOT NULL COMMENT '部门ID',
  `s_01` int(10) NOT NULL DEFAULT '0' COMMENT '起始IP段1',
  `s_02` int(10) NOT NULL DEFAULT '0' COMMENT '起始IP段2',
  `s_03` int(10) NOT NULL DEFAULT '0' COMMENT '起始IP段3',
  `s_04` int(10) NOT NULL DEFAULT '0' COMMENT '起始IP段4',
  `e_01` int(10) NOT NULL DEFAULT '0' COMMENT '终止IP段1',
  `e_02` int(10) NOT NULL DEFAULT '0' COMMENT '终止IP段2',
  `e_03` int(10) NOT NULL DEFAULT '0' COMMENT '终止IP段3',
  `e_04` int(10) NOT NULL DEFAULT '0' COMMENT '终止IP段4',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='部门IP段表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ip`
--

INSERT INTO `ip` (`id`, `department_id`, `s_01`, `s_02`, `s_03`, `s_04`, `e_01`, `e_02`, `e_03`, `e_04`) VALUES
(1, 1, 210, 45, 128, 7, 210, 45, 128, 15),
(3, 1, 210, 45, 128, 7, 210, 45, 128, 255),
(6, 1, 210, 45, 128, 7, 210, 45, 128, 255),
(7, 2, 126, 0, 0, 1, 127, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `name` char(100) NOT NULL COMMENT '名称',
  `url` char(100) NOT NULL COMMENT '链接',
  `hidden` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单表' AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `pid`, `name`, `url`, `hidden`) VALUES
(1, 0, '菜单管理', '/admin/menu', 0),
(2, 1, '添加菜单', '/admin/menu/add', 0),
(3, 1, '修改菜单', '/admin/menu/edit', 1),
(4, 0, '会员管理', '/admin/user', 0),
(5, 4, '添加会员', '/admin/user/add', 0),
(6, 4, '修改会员', '/admin/user/edit', 1),
(7, 4, '删除会员', '/admin/user/delete', 1),
(8, 1, '删除菜单', '/admin/menu/delete', 1),
(9, 4, '会员分组', '/admin/usergroup', 0),
(10, 4, '修改会员分组', '/admin/usergroup/edit', 1),
(11, 4, '添加会员分组', '/admin/usergroup/add', 0),
(12, 4, '删除会员分组', '/admin/usergroup/delete', 1),
(13, 4, '部门管理', '/admin/department', 0),
(14, 4, '添加部门', '/admin/department/add', 0),
(15, 4, '更新部门', '/admin/department/edit', 1),
(16, 4, '删除部门', '/admin/department/delete', 1),
(18, 0, '文章管理', '/admin/archive', 0),
(19, 18, '栏目管理', '/admin/catalog', 0),
(20, 18, '添加栏目', '/admin/catalog/add', 0),
(21, 18, '添加文章', '/admin/archive/add', 0),
(22, 0, '问卷管理', '/admin/surveylog', 0),
(23, 22, '问卷记录', '/admin/surveylog', 0),
(24, 22, '导出数据', '/admin/surveylog/export', 0),
(25, 0, '留言管理', '/admin/comment', 0),
(26, 25, '留言列表', '/admin/comment', 0),
(27, 25, '回复留言', '/admin/comment/edit', 1),
(28, 0, '退出登陆', '/admin/index/logout', 0),
(29, 0, '基础权限', '/admin/index', 1),
(30, 18, '修改文章', '/admin/archive/edit', 1),
(31, 18, '修改栏目', '/admin/catalog/edit', 1),
(32, 4, '个人信息', '/admin/user/my', 0),
(36, 22, '修改问卷记录', '/admin/surveylog/edit', 1),
(34, 22, '查看统计报表', '/admin/surveystat/edit', 1),
(35, 22, '生成报表', '/admin/surveystat/stat', 1),
(37, 22, '删除问卷记录', '/admin/surveylog/delete', 1);

-- --------------------------------------------------------

--
-- 表的结构 `survey_log`
--

CREATE TABLE IF NOT EXISTS `survey_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `department_id` int(10) NOT NULL COMMENT '部门编号',
  `r_01` int(10) NOT NULL COMMENT '第一题评份',
  `r_02` int(10) NOT NULL COMMENT '第二题评分',
  `r_03` int(10) NOT NULL COMMENT '第三题评分',
  `r_04` int(10) NOT NULL COMMENT '第四题评分',
  `r_05` int(10) NOT NULL COMMENT '第五题评分',
  `r_06` int(10) NOT NULL COMMENT '第六题评分',
  `r_07` int(10) NOT NULL COMMENT '第七题评分',
  `r_08` int(10) NOT NULL COMMENT '第八题评分',
  `pubtime` int(10) NOT NULL COMMENT '发布时间',
  `ip` char(20) NOT NULL COMMENT 'IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='问卷结果' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `survey_log`
--

INSERT INTO `survey_log` (`id`, `department_id`, `r_01`, `r_02`, `r_03`, `r_04`, `r_05`, `r_06`, `r_07`, `r_08`, `pubtime`, `ip`) VALUES
(2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 1338976586, '127.0.0.1'),
(3, 2, 10, 10, 10, 10, 10, 10, 10, 10, 1338976799, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `survey_stat`
--

CREATE TABLE IF NOT EXISTS `survey_stat` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `department_id` int(10) NOT NULL COMMENT '部门ID',
  `data` text NOT NULL COMMENT '统计结果',
  `stattime` int(10) NOT NULL COMMENT '统计时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='报表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `survey_stat`
--

INSERT INTO `survey_stat` (`id`, `department_id`, `data`, `stattime`) VALUES
(1, 2, '{"count":1,"detail":{"r_01":{"10":1},"r_02":{"10":1},"r_03":{"10":1},"r_04":{"10":1},"r_05":{"10":1},"r_06":{"10":1},"r_07":{"10":1},"r_08":{"10":1}}}', 1339149796),
(2, 2, '{"count":1,"detail":{"r_01":{"10":1},"r_02":{"10":1},"r_03":{"10":1},"r_04":{"10":1},"r_05":{"10":1},"r_06":{"10":1},"r_07":{"10":1},"r_08":{"10":1}}}', 1339149798),
(3, 2, '{"count":1,"detail":{"r_01":{"10":1},"r_02":{"10":1},"r_03":{"10":1},"r_04":{"10":1},"r_05":{"10":1},"r_06":{"10":1},"r_07":{"10":1},"r_08":{"10":1}}}', 1339149799),
(4, 1, '{"count":1,"detail":{"r_01":{"2":1},"r_02":{"2":1},"r_03":{"2":1},"r_04":{"2":1},"r_05":{"2":1},"r_06":{"2":1},"r_07":{"2":1},"r_08":{"2":1}}}', 1339149823),
(5, 1, '"{\\"department_id\\":\\"1\\",\\"data\\":{\\"detail\\":{\\"r_01\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_02\\":{\\"1\\":\\"0\\",\\"2\\":\\"0\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"10\\"},\\"r_03\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_04\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_05\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_06\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_07\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"},\\"r_08\\":{\\"1\\":\\"0\\",\\"2\\":\\"1\\",\\"3\\":\\"0\\",\\"4\\":\\"0\\",\\"5\\":\\"0\\",\\"6\\":\\"0\\",\\"7\\":\\"0\\",\\"8\\":\\"0\\",\\"9\\":\\"0\\",\\"10\\":\\"0\\"}}},\\"stattime\\":1339150365}"', 1339150365),
(6, 1, '{"count":1,"detail":{"r_01":{"2":1},"r_02":{"2":1},"r_03":{"2":1},"r_04":{"2":1},"r_05":{"2":1},"r_06":{"2":1},"r_07":{"2":1},"r_08":{"2":1}}}', 1339150611),
(7, 1, '{"detail":{"r_01":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_02":{"1":"0","2":"0","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"1"},"r_03":{"1":"0","2":"0","3":"1","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_04":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_05":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_06":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_07":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_08":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"}}}', 1339150631),
(8, 1, '{"count":1,"detail":{"r_01":{"2":1},"r_02":{"2":1},"r_03":{"2":1},"r_04":{"2":1},"r_05":{"2":1},"r_06":{"2":1},"r_07":{"2":1},"r_08":{"2":1}}}', 1339151000),
(9, 1, '{"detail":{"r_01":{"1":"0","2":"0","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"1"},"r_02":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_03":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_04":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_05":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_06":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_07":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_08":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"}},"count":"1"}', 1339151012),
(10, 1, '{"detail":{"r_01":{"1":"0","2":"0","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"1"},"r_02":{"1":"0","2":"0","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"1"},"r_03":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_04":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_05":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_06":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_07":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"},"r_08":{"1":"0","2":"1","3":"0","4":"0","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"}},"count":"1"}', 1339151024),
(11, 2, '{"count":1,"detail":{"r_01":{"10":1},"r_02":{"10":1},"r_03":{"10":1},"r_04":{"10":1},"r_05":{"10":1},"r_06":{"10":1},"r_07":{"10":1},"r_08":{"10":1}}}', 1339151181),
(12, 2, '{"count":1,"detail":{"r_01":{"10":1},"r_02":{"10":1},"r_03":{"10":1},"r_04":{"10":1},"r_05":{"10":1},"r_06":{"10":1},"r_07":{"10":1},"r_08":{"10":1}}}', 1339151441);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `group_id` int(10) NOT NULL COMMENT '所属分组',
  `department_id` int(10) NOT NULL COMMENT '所属部门',
  `uname` char(100) NOT NULL COMMENT '用户名',
  `passwd` char(100) NOT NULL COMMENT '密码',
  `alias` char(100) NOT NULL COMMENT '姓名',
  `phone` char(100) NOT NULL COMMENT '电话',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员列表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `group_id`, `department_id`, `uname`, `passwd`, `alias`, `phone`) VALUES
(1, 1, 2, 'admin', 'da4409e3bfeabe8132a8e85a2fbbb31b', '管理员', '18611004662'),
(2, 3, 2, 'test', '30e397c4416b53b262f353a7a0102c39', '测试会员', '010-58982360');

-- --------------------------------------------------------

--
-- 表的结构 `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '组编号',
  `name` char(100) NOT NULL COMMENT '组名称',
  `permission` text NOT NULL COMMENT '权限列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员组' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `permission`) VALUES
(1, '超级管理员', '{"type":"super","list":["\\/admin\\/menu","\\/admin\\/menu\\/add","\\/admin\\/menu\\/edit","\\/admin\\/menu\\/delete","\\/admin\\/user","\\/admin\\/user\\/add","\\/admin\\/user\\/edit","\\/admin\\/user\\/delete","\\/admin\\/usergroup","\\/admin\\/usergroup\\/edit","\\/admin\\/usergroup\\/add","\\/admin\\/usergroup\\/delete","\\/admin\\/department","\\/admin\\/department\\/add","\\/admin\\/department\\/edit","\\/admin\\/department\\/delete","\\/admin\\/archive","\\/admin\\/catalog","\\/admin\\/catalog\\/add","\\/admin\\/archive\\/add","\\/admin\\/surveylog","\\/admin\\/surveylog","\\/admin\\/surveylog\\/export","\\/admin\\/comment","\\/admin\\/comment","\\/admin\\/comment\\/reply","\\/admin\\/index\\/logout"]}'),
(3, '管理员', '{"type":"normal","list":["\\/admin\\/user","\\/admin\\/department","\\/admin\\/department\\/add","\\/admin\\/department\\/edit","\\/admin\\/department\\/delete","\\/admin\\/user\\/my","\\/admin\\/archive","\\/admin\\/catalog","\\/admin\\/catalog\\/add","\\/admin\\/archive\\/add","\\/admin\\/archive\\/edit","\\/admin\\/catalog\\/edit","\\/admin\\/surveylog","\\/admin\\/surveylog","\\/admin\\/surveylog\\/export","\\/admin\\/surveylog\\/edit","\\/admin\\/surveystat\\/edit","\\/admin\\/surveylog\\/delete","\\/admin\\/comment","\\/admin\\/comment","\\/admin\\/comment\\/edit","\\/admin\\/index\\/logout","\\/admin\\/index"]}');
