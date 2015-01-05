<link href="<?php echo Yii::app()->baseUrl.'/css/get.css';?>" media="all" type="text/css" rel="stylesheet">

<div class="content lay-out">
	<div class="about-em"><!--关于运营商-->
		<div class="this-box">
<n:info>
			<div class="titles blue-b"><!-- 标题-->
				
				<h2 class="left" title="49you"><i>$p_short</i><span> 游戏运营平台</span></h2>
				
			</div>
			<div class="box">
				
				<div class="left-pro">
					<div class="sort-pro">
						<dl>
							<dt>
								<img src="$p_logo_thumb" alt="49you">
							</dt>
							<dd>
								<p>运营游戏 <b>$count</b> 款</p>
								<p>总开服量 <b>5428</b> 组</p>
							</dd>
						</dl>	
					</div>
					<div class="service">
						<a class="right" target="_blank" href="$p_address">【进入官网】</a>
						<p class="ser">客服中心：<strong>$tel</strong></p>
					</div>
				</div>
				<div class="middle-box">
					<div class="left-bg"></div>
					<div class="pro-word">
						$brief  
					</div>
				</div>
</n:info>
				<div class="right-box rBox">
					<div class="arrow aBox"></div>
					<div class="aBox tips">
						商务合作
					</div>
					<div class="conact" style="padding:10px 0px 10px 50px;">
<n:contact>
						<p>
							<span class="label">联系人:</span>
							<span class="text point">$name</span>
						</p>
						<p>
							<span class="label">职　位:</span>
							<span class="text point">$post</span>
						</p>
						<p>
							<span class="label">QQ:</span>
							<span class="text">$qq</span>
						</p>
						<p>
							<span class="label">电　话:</span>
							<span class="text">$tel</span>
						</p>
						<p title="$city">
							<span class="label">地　址:</span>
							<span class="text">$city</span>
						</p>
</n:contact>
					</div>
				</div>
			</div>
		</div>
		<div class="b-border"></div>
	</div><!-- 关于运营商结束 -->
	<div class="em-open mt_15">
		<div class="titles">
			<h2>
				{$p_name}<span> 今日开服</span>
			</h2>
		</div>
		<div class="this-box">
			
			<dl class="table-box full margin-b"><!-- 表格主体 -->
				<dt>
					<ul>
						<li class="name first">游戏名称</li>
						<li class="open">开服时间</li>
						<li class="service">服务器名</li>
						<li class="type">游戏类型</li>
						<li class="company">运营公司</li>
						<li class="gift">礼包</li>
						<li class="activity">活动</li>
						<li class="players">玩家人数</li>
						<li class="play">进入游戏</li>
						<li class="model">状态</li>
						<li class="convene last">召集令</li>
					</ul>
				</dt>
				<dd>
					<ul time="9" class="">
						<li class="name"><a target="_blank" href="#">烈火战神</a></li>
						<li class="open">
							<dl>
								<dt style="display: block;">今天 09:00</dt>
								<dd style="display: none;">
									<a href="#" target="_blank"></a>
								</dd>
							</dl>
						</li>
						<li class="service"><a target="_blank" href="#">双线956服</a></li>
						<li class="type">角色扮演</li>
						<li class="company"><a target="_blank" href="#">49you</a></li>
						<li class="gift"></li>
						<li class="activity">-</li>
						<li class="players"><a server_id="356813" server_name="49you《烈火战神》双线956服" target="_blank" href="#">117</a></li>
						<li class="play"><a class="hot" target="_blank" href="#">开始游戏</a></li>
						<li class="model"><span class="opened">刚刚开服51分钟</span></li>
						<li class="convene"><a href="#" class="ready" onclick="add_zjl(356813)"></a></li>
					</ul>
				</dd>
			</dl>
		</div>
		
	</div>
		
	<div class="hot-game mt_15">
		<div class="this-box">
			<div class="titles blue-b">
				<a class="shamon right all" href="#">查看所有</a>
				<h2>
					{$p_name}<span> 热推游戏</span>
				</h2>

			</div>
			<div class="box border-box">
				<div class="employ-list">
					<n:mygame>
						<dl>
							<dt>
								<a href="$g_id">
									<img src="$logo" alt="烈焰">
								</a>
							</dt>
							<dd>
								<p class="first">
									<a href="#">$name</a>
									<span><em>$typet</em></span>
								</p>
								<p>游戏开服：<b>6952</b>组</p>
								<p>平台开服：<b>323</b>组</p>
								<p>平台占比：
									<b class="green">
										5%
									</b>
								</p>
							</dd>
						</dl>
					</n:mygame>
													
				</div>
			</div>
		</div>
		<div class="b-border"></div>
	</div>

	<div class="table  mt_15"><!-- 新游推荐 表格开始 -->
		<div class="titles blue-b"><!-- 标题-->
			<h2 class="left" title="">{$p_name} <span>游戏列表</span></h2>
			<a class="trend" href="#"><span class="left">49you 开服走势图</span></a>
		</div><!-- 标题结束 -->
		<dl class="table-box full"><!-- 表格主体 -->
			<dt>
				<ul>
					<li class="name first">游戏名称</li>
					<li class="open">开服时间</li>
					<li class="service">服务器名</li>
					<li class="type">游戏类型</li>
					<li class="company">运营公司</li>
					<li class="gift">礼包</li>
					<li class="activity">活动</li>
					<li class="players">玩家人数</li>
					<li class="play">进入游戏</li>
					<li class="model">状态</li>
					<li class="convene last">召集令</li>
				</ul>
			</dt>
			<dd>
				<!-- 首面主迭代样式 -->
				<ul class="">
					<li class="name"><a target="_blank" href="#">街机三国</a></li>
					<li class="open">
						<dl>
							<dt style="display: block;">今天 09:00</dt>
							<dd style="display: none;">
								<a href="#" target="_blank"></a>
							</dd>
						</dl>
					</li>
					<li class="service"><a target="_blank" href="#">双线228服</a></li>
					<li class="type">角色扮演</li>
					<li class="company"><a target="_blank" href="#">49you</a></li>
					<li class="gift"></li>
					<li class="activity">-</li>
					<li class="players"><a server_id="350372" server_name="49you《街机三国》双线228服" target="_blank" href="#">4</a></li>
					<li class="play"><a class="" target="_blank" href="#">开始游戏</a></li>
					<li class="model"><span class="will">未开服</span></li>
					<li class="convene"><a href="#" class="ready" onclick="add_zjl(356813)"></a></li>
				</ul><!-- 首面主迭代样式 -->
			</dd>	
		</dl><!-- 表格主体结束 -->
	</div>
	<div class="page-num">
	</div>
</div>
