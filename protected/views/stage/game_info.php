<style>
    .game-pro{
		height:380px;
	}
	.bread a{
		color:#0e0e0e;
	}
	.bread .hover{
		color:#a9a6a6;
	}
    .s-title .tit{
        width:82px;text-align:center;
    }
    .game-pro .pro-text{
        padding:7px 16px 0 16px;
        text-indent: 0em;
    }
    
    .game-pro .pro-text a{
        color:black;
    }
    .game-pro .pro-text span{
        color:#969595;
    }
	
    .s-title .tit span{
       color:#bbc2c7;
    }
    .s-title .tit2{
        width:83px;
    }
    .s-title .hover{
        background-color: #fff;
        border-top: 3px solid #0085d4;
        line-height:30px;
    }
    .s-title .hover span{
        color:#0085d4;
    }
</style>

<div class="content lay-out">
	<div id="my521" class="game-pro margin-b">
<n:info>
        <div class="clearfix">
			<div class="fl bread">
				<a href="#">5884首页</a> > 
				<a href="#">游戏库</a> > 
				<a href="#">网页游戏</a> > 
				<a class="hover" href="#">烈火战神游戏专区</a>
			</div>
			<div id="played-list" class="played right">
				<span class="left rBox"><s></s>我逛过的江湖吧<b></b></span>
				<ul class="left">暂时没有内容</ul>
			</div>
		</div>
        
		<div class="title rBox">
			<h1 class="left">$name</h1>
			
		</div>
		<div class="box">
			<div class="left show-img">
				<img src="$bigimg" alt="">
			</div>
			<div class="left pro rBox">
				<div class="text" id="js_title">
					<div class="s-title cp">
						<h3 class="tit hover" onmouseover="mytoggles($('#js_title'),0,this)"><span>简介</span></h3>
						<h3 class="tit tit2" onmouseover="mytoggles($('#js_title'),1,this)"><span>测评</span></h3>
						<h3 class="tit" onmouseover="mytoggles($('#js_title'),2,this)"><span>攻略</span></h3>
					</div>
					<div  class="pro-text none">
						$brief
					</div>
				<ul  class="pro-text none">
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
                                               
					</ul>
				<ul  class="pro-text none">
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
						<li>
							<a href="#" class="fl">
								那些年的日子 范特西篮球老玩家       
							</a>
							<span class="fr">10-18</span>
						</li>
                                               
					</ul>
				</div>
				                            
				<div class="arrow"></div>
				<div class="about">
					<p class="commt"><em>热评:</em><a href="#">18</a>条</p>
					<span class="left">|</span>
					<p class="players"><em>玩家:</em><span><a target="_blank" href="#">58737</a></span>人</p>
				</div>
			</div>
		</div>
		<div class="tool">
			<ul class="about-game left">
				<li class="name">游戏名称: <a>$name</a></li>
				<li class="company">开发公司: <a>$develop</a></li>
				<li class="type">游戏类型: <a target="_blank" href="#">$type</a></li>
				<li class="model">游戏状态: <a href="#">$state</a></li>
				<li class="img">游戏画面: <a href="#">$ui</a></li>
				<li class="story">游戏题材: <a href="#">$theme</a></li>
			</ul>
			<a target="_blank" href="$url" class="enter right">
				$enter
			</a>
		</div>
</n:info>
	</div><!-- 专区头部结束 -->

	<div class="operator-list margin-b"><!-- 运营商列表开始 -->
		<div class="titles blue-b">
			<a class="right shamon all" href="#">查看所有</a>
			<h2 class="left">{$g_name}<span>运营商</span></h2>
			<span class="left count">共收录 <strong>{$operatorNum}</strong> 家</span>
		</div>
		<div class="b-border">
			<div class="border-box">
				<ul class="dotted-bg">
					<li id="operator_id_0">
						<a href="{$platform_all}">全部</a>
					</li>
					<n:operator>
						<li id="operator_id_$p_id"><a href="{$createUrl(stage/game_info?id=$url&operator=$p_id)}">$name</a></li>
					</n:operator>
				</ul>
			</div>
		</div>
	</div><!-- 运营商列表结束 -->
		<div class="big-clumn margin-b">
		<div class="open-list left">
			<div class="titles blue-b"><!-- 标题-->
				<h2 title="" class="left">{$g_name}<span>开服表</span></h2>
				<span class="left count">共开服 <strong>{$kaifuNum}</strong> 组</span>
				<a target="_blank" href="#" class="trend"><span class="left">《{$g_name}》开服走势图</span></a>
				<!--<a class="more" target="_blank" href="#">更多&gt;&gt;</a>-->
			</div><!-- 标题结束 -->
			<dl class="table-box full"><!-- 表格主体 -->
				<dt>
					<ul>
						<li class="open first">开服时间</li>
						<li class="service">服务器名</li>
						<li class="company">运营公司</li>
						<li class="gift">礼包</li>
						<li class="players">玩家人数</li>
						<li class="play">进入游戏</li>
						<li class="model">状态</li>
						<li class="convene last">召集令</li>
					</ul>
				</dt>
				<dd>
					<!-- 游戏专区开服表迭代样式 -->
					<n:open>
						<ul>
							<li class="open">$open</li>
							<li class="service"><a target="_blank" title="$service" href="{$createUrl(stage/progress?id=$g_id)}">$service</a></li>
							<li class="company"><a target="_blank" href="{$createUrl(stage/platform_info?id=$p_id)}">$company </a></li>
							<li class="gift"></li>
							<li class="players"><a server_id="354244" server_name="欢乐园 《街机三国》双线172服" target="_blank" href="#">91</a></li>
							<li class="play"><a class="" target="_blank" href="{$createUrl(stage/progress?id=$g_id)}">开始游戏</a></li>
							<li class="model"><span class="opened"><span class="opened">$model</span></span></li>
							<li class="convene"><a href="#" class="ready" onclick="add_zjl(354244)"></a></li>
						</ul>
					</n:open>
					<!-- 游戏专区开服表迭代样式 -->
				</dd>

			</dl><!-- 表格主体结束 -->
			
		</div>
		
		<div class="game-news right"><!--主体右边开始-->
			<div class="player-list-2"><!--  玩家列表开始 -->
				<div class="tit">
					<a class="more" target="_blank" href="#">更多</a>
					<h2>{$g_name}<span>玩家</span></h2>
				</div>
				<div class="box">
					<ul>
																		<li>
							<div class="user-name"><a target="_blank" href="#">xianshannan</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>广东省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">哔哔</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>广东省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">江湖吧活动大使</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>广东省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">天公不做媒</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>江西省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">qq258963</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>广东省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">qq884613494</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>江苏省</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li>
							<div class="user-name"><a target="_blank" href="#">zuoyi321</a></div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>重庆市</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																								<li class="guest">
							<div class="user-name">西藏玩家</div>
							<div class="detail">
								<div class="about">
									<span><i>来自</i><em>西藏</em></span>
								</div>
								<div class="set">
									<a href="#" class="add"></a>
									<a href="#" class="msg"></a>
								</div>
							</div>
						</li>
																	</ul>
				</div>
			</div><!-- 玩家列表结束 -->
			<div class="news"><!-- 游戏新闻开始 -->
				<div class="tit">
					<a href="#" class="more">更多</a>
					<h2>{$g_name}<span>新闻</span></h2>
				</div>
				<div class="box">
					<ul class="news-list">
											<li>
							<span class="date">10-27</span>
							<a target="_blank" title="零游戏《街机三国》攻略巧妙机智运作暴走超能力深解" href="#">零游戏《街机三国》攻略巧妙机智…</a>
						</li>
											<li>
							<span class="date">10-25</span>
							<a target="_blank" title="风云再起 737《街机三国》格斗游戏新纪元" href="#">风云再起 737《街机三国》格…</a>
						</li>
											<li>
							<span class="date">10-24</span>
							<a target="_blank" title="威武坐骑 602《街机三国》趋势抢先报" href="#">威武坐骑 602《街机三国》趋…</a>
						</li>
											<li>
							<span class="date">10-23</span>
							<a target="_blank" title="1073街机三国土豪我们做朋友吧" href="#">1073街机三国土豪我们做朋友…</a>
						</li>
											<li>
							<span class="date">10-23</span>
							<a target="_blank" title="绝境逆转 737《街机三国》武将反击" href="#">绝境逆转 737《街机三国》武…</a>
						</li>
											<li>
							<span class="date">10-22</span>
							<a target="_blank" title="良驹助威 602《街机三国》孟起马场一显身手" href="#">良驹助威 602《街机三国》孟…</a>
						</li>
										</ul>
				</div>
			</div><!-- 游戏新闻结束 -->
		</div>
	</div><!--主体右边结束-->
	<div class="tc " style="width:715px;">
		<n:openPager>
			分页
		</n:openPager>
	</div>
	<div class="game-img margin-b"><!-- 游戏截图开始-->
		<div class="titles blue-b">
			<h2>{$g_name}<span>截图</span></h2>
		</div>
		<div class="box">
			<div class="b-border">
				<div class="border-box">
					<ul class="img-list">
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
												<li><a target="_blank" href="#"><img src="/logo_1365590121.jpg" alt="街机三国"></a></li>
											</ul>
				</div>
			</div>
		</div>
	</div><!-- 游戏截图结束 -->

	<div class="user-bbs">
		<div class="titles black-b">
			<h2 class="left">{$g_name}<span>江湖吧</span></h2>
			<a class="right new-post" href="#">发新帖</a>
            <a class="right bbs-target" href="#">[街机三国江湖吧]</a>
        </div>
		<div class="bbs-table">
			<table>
				<thead>
					<tr>
						<th class="tit" width="570">标题</th>
						<th width="130">作者</th>
						<th width="130">回复/查看</th>
						<th width="140">最后发帖</th>
					</tr>
				</thead>
				<tbody>
					<!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="求教龙骑怎么打得过军师？？" target="_blank" href="#">求教龙骑怎么打得过军师？？</a>
											</td>
	<td class="author">
		<div class="name rBox" style="z-index: 999;">
			<a target="_blank" href="#">广东省玩家</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.1					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>广东省玩家</strong>
							【游客】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add off">加好友</a>
						<a href="#" class="msg off">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>4天前</p>
	</td>
	<td class="re">
		<p>2</p>
		<p>16</p>
	</td>
	<td class="last">
		<p>
							<a target="_blank" href="#">绝世好贱</a>
					</p>
		<p>10-23</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="街机三国宠物升级太浪费金币了！" target="_blank" href="#">街机三国宠物升级太浪费金币了！</a>
											</td>
	<td class="author">
		<div class="name rBox" style="z-index: 998;">
			<a target="_blank" href="#">qq258963</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.2					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>qq258963</strong>
							【浪子】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>11天前</p>
	</td>
	<td class="re">
		<p>1</p>
		<p>32</p>
	</td>
	<td class="last">
		<p>
							<a target="_blank" href="#">请联系我</a>
					</p>
		<p>10-16</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="cz19920408 邀大家一起玩91wan《街机三国》双线1089服 - 08月28日开服 " target="_blank" href="#">[草民]cz19920408 邀大家一起玩91wan《街机三国》双线1089服 - 08月2…</a>
						<s class="start"></s>					</td>
	<td class="author">
		<div class="name rBox" style="z-index: 997;">
			<a target="_blank" href="#">cz19920408</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.1					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>cz19920408</strong>
							【草民】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-28</p>
	</td>
	<td class="re">
		<p>0</p>
		<p>124</p>
	</td>
	<td class="last">
		<p>
							-					</p>
		<p>-</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="yjj86683369 邀大家一起玩6711《街机三国》双线34服 - 08月08日开服 " target="_blank" href="#">[武者]yjj86683369 邀大家一起玩6711《街机三国》双线34服 - 08月08日…</a>
						<s class="start"></s>					</td>
	<td class="author">
		<div class="name rBox" style="z-index: 996;">
			<a target="_blank" href="#">yjj86683369</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.3					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>yjj86683369</strong>
							【武者】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-08</p>
	</td>
	<td class="re">
		<p>7</p>
		<p>196</p>
	</td>
	<td class="last">
		<p>
							<a target="_blank" href="#">tongyaoyouxi</a>
					</p>
		<p>08-28</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="哔哔 邀大家一起玩91wan《街机三国》双线1014服 - 08月09日开服 " target="_blank" href="#">[侠客]哔哔 邀大家一起玩91wan《街机三国》双线1014服 - 08月09日开服 </a>
						<s class="start"></s>					</td>
	<td class="author">
		<div class="name rBox" style="z-index: 995;">
			<a target="_blank" href="#">哔哔</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.4					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>哔哔</strong>
							【侠客】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-09</p>
	</td>
	<td class="re">
		<p>1</p>
		<p>111</p>
	</td>
	<td class="last">
		<p>
							<a target="_blank" href="#">广东省玩家</a>
					</p>
		<p>08-09</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="不能忍了！现在还有谁参加三国争霸活动啊？？？" target="_blank" href="#">不能忍了！现在还有谁参加三国争霸活动啊？？？</a>
											</td>
	<td class="author">
		<div class="name rBox" style="z-index: 994;">
			<a target="_blank" href="#">请联系我</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.4					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>请联系我</strong>
							【侠客】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-02</p>
	</td>
	<td class="re">
		<p>2</p>
		<p>161</p>
	</td>
	<td class="last">
		<p>
							<a target="_blank" href="#">a744376672</a>
					</p>
		<p>08-06</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="q287568620 邀大家一起玩91wan《街机三国》双线990服 - 08月03日开服 " target="_blank" href="#">[侠客]q287568620 邀大家一起玩91wan《街机三国》双线990服 - 08月03…</a>
						<s class="start"></s>					</td>
	<td class="author">
		<div class="name rBox" style="z-index: 993;">
			<a target="_blank" href="#">q287568620</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.4					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>q287568620</strong>
							【侠客】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-03</p>
	</td>
	<td class="re">
		<p>0</p>
		<p>131</p>
	</td>
	<td class="last">
		<p>
							-					</p>
		<p>-</p>
	</td>
</tr><!-- 迭代帖子列表 -->
<tr>
	<td class="tit">
		<a title="mir2003` 邀大家一起玩7K7K《街机三国》双线417区 - 08月01日开服 " target="_blank" href="#">[草民]mir2003` 邀大家一起玩7K7K《街机三国》双线417区 - 08月01日开服…</a>
						<s class="start"></s>					</td>
	<td class="author">
		<div class="name rBox" style="z-index: 992;">
			<a target="_blank" href="#">mir2003`</a>
			<!-- div以ajax加载 -->
			<div class="author-box aBox">
				<div class="the-box aBox">
					<span class="level">
						Lv.1					</span>
					<div class="author-detail">
						<div class="img">
							<img src="/logo_1365590121.jpg" alt="">
						</div>
						<div class="names">
							<strong>mir2003`</strong>
							【草民】
						</div>
					</div>
					<div class="contrl">
												<a href="#" class="add">加好友</a>
						<a href="#" class="msg">站内信</a>
											</div>
				</div>
				<div class="bg-box"></div>
			</div>
			<!-- div以ajax加载 -->
		</div>
		<p>08-01</p>
	</td>
	<td class="re">
		<p>0</p>
		<p>167</p>
	</td>
	<td class="last">
		<p>
							-					</p>
		<p>-</p>
	</td>
</tr>				</tbody>
			</table>
			<p class="bbs-more">
				<a href="#">[点击查看更多{$g_name}热帖]</a>
			</p>
		</div>
		<div class="post-new mt_10">
	<form action="http://www.521g.com/user/thread/2920/" method="post" onsubmit="return add_thread()">
	<div class="box">
		<div class="item">
			<label for="">
				标题
			</label>
			<input name="title" id="add_thread_title" class="text" type="text" style="width:630px">
		</div>
		<div class="item">
			<label for="">
				内容
			</label>
			<div class="text-box"><div class="ke-container ke-container-default" style="width: 680px;"><div style="display:block;" class="ke-toolbar" unselectable="on"><span class="ke-outline" data-name="emoticons" title="插入表情" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-emoticons" unselectable="on"></span></span><span class="ke-outline" data-name="image" title="图片" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-image" unselectable="on"></span></span></div><div style="display: block; height: 100px;" class="ke-edit"><iframe class="ke-edit-iframe" hidefocus="true" frameborder="0" style="width: 100%; height: 100px;"></iframe><textarea class="ke-edit-textarea" hidefocus="true" style="width: 100%; height: 100px; display: none;"></textarea></div><div class="ke-statusbar"><span class="ke-inline-block ke-statusbar-center-icon"></span><span class="ke-inline-block ke-statusbar-right-icon" style="visibility: hidden;"></span></div></div><textarea name="desc" id="add_thread_desc" cols="30" rows="10" style="width: 680px; display: none;"></textarea></div>
		</div>
		
				
		<p>
			<input class="submit" type="submit" value="发表新帖">
		</p>
	</div>
	</form>
</div>
<script>
	/**简介&测评&攻略tab**/
	function mytoggles(selector,num,self){
		obj = $(".pro-text",selector);
		obj.hide();
		$('h3',selector).removeClass('hover');
		$(self).addClass('hover');
		$(obj[num]).show();
	}
	/**运营商显示收起**/
	$(".now-open .shamon").toggle(
		function(){
			$(this).html("收起正在开服的游戏").removeClass("all").parents().siblings(".table-box").slideDown(400);
		},
		function(){
			$(this).html("查看正在开服的游戏").addClass("all").parents().siblings(".table-box").slideUp(400);
		}
	)
	/**运营商初始隐藏操作**/
	var page_detail = {
		tag:".operator-list li",
		num:24,
		targets:".operator-list .shamon",
		class_name:"all"
	}
	var pageList = new setList();
		pageList.reset(page_detail);
	
	/**编辑器--评论模块**/
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="desc"]', {
			uploadJson : 'http://www.521g.com/ajax/uploadimg/?type=bbs',
			newlineTag : 'br',
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['emoticons', 'image']
		});
	});

	function ref_verify_code(){
		var src=$("#verifycode_img").attr("src");
		$("#verifycode_img").attr("src",src+'?'+Math.random())
	}
	
	function add_thread(){
		var title=$("#add_thread_title").val();
		if(getLength(title)>70){
			alert("标题不能超过70个字符");
			return false;
		}
		var desc=editor.text();
		var verify_code=$("#add_verifycode").val();
		$.post(
				'http://www.521g.com/user/thread/2920/',
				{title:title,desc:desc,verify_code:verify_code},
				function(data){
					if(data.status==1){
						location.href=data.data.url;
					}else{
						ref_verify_code();
						alert(data.msg);
					}
				},
				'json'
				);
		return false;
	}
</script>	
</div>

</div>
