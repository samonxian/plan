
<style>
	.rocket-btn{height:100px;}
	
	.tyles{margin:0 0 0 -30px;}
	.tyles a{margin:0 5px;color:#000;}
	.tyles .on{color:#fe7b2b;}
</style>
<div class="content lay-out rBox" style="z-index:10">	
	
	<!-- 火箭-->
	<!--
	<div class="rocket aBox" style="">
		<div class="rocket-head">
			<a class="back" href="javascript:void(g521.scroll_to_id('.top-box'))"></a>
		</div>
		<div class="rocket-btn">
			<a class="news" href="javascript:void(g521.scroll_to_id('.new-pro'))">开服</a>
			<a class="news" href="javascript:void(g521.scroll_to_id('.new-pro'))">历史</a>
			<a class="rank" onclick="" href="javascript:void(g521.scroll_to_id('.ranking'))">排行</a>
		</div>
		<div class="rocket-foot"></div>
	</div>
	-->
	<!-- 火箭结束 -->
	<div class="table ranking"><!-- 排行榜 表格开始 -->
		<div class="title rBox"><!-- 标题 -->
			<h2 title="网页游戏排行榜" class="left">排行榜</h2>
			<div class="tyles left j_tyles">
				[n:url]
					<a href="$all" class="">全部游戏</a>|
					<a href="$phone">手机游戏</a>|
					<a href="$web">网页游戏</a>|
					<a href="$pc">客户端游戏</a>
				[/n:url]
			</div>
			<a class="more" href="http://www.521g.com/top/">更多&gt;&gt;</a>
		</div><!-- 标题结束 -->
		<dl class="table-box full"><!-- 表格主体 -->
			<dt>
				<ul>
					<li class="rank first">排名</li>
					<li class="name">游戏名称</li>
					<li class="players">玩家人数</li>
					<li class="type">游戏类型</li>
					<li class="open-msg">最新开服信息</li>
					<li class="play">进入游戏</li>
					<li class="model last">状态</li>
				</ul>
			</dt>
			<dd>
				<n:kaifu>
				<!-- 排行榜迭代样式 -->
				<ul>
					<li class="rank"><span class="top num">$rank</span></li>
					<li class="name"><a target="_blank" href="{$createUrl(stage/progress?id=$g_id)}">$name</a></li>
					<li class="players"><a game_id="2803" server_name="$serviceName" target="_blank" href="{$createUrl(stage/progress?id=$g_id)}">$players</a></li>
					<li class="type">$type</li>
					<li class="open-msg"><a target="_blank" href="{$createUrl(stage/progress?id=$g_id)}">[$platform] $open $service</a></li>
					<li class="play"><a class="" target="_blank" href="{$createUrl(stage/progress?id=$g_id)}">开始游戏</a></li>
					<li class="model"><span class="will">$model</span></li>
				</ul>
				<!-- 排行榜迭代样式 -->
				</n:kaifu>
			</dd>
		</dl><!-- 表格主体结束 -->
	</div><!-- 表格结束 -->
</div>