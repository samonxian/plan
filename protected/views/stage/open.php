
<div id="calendar">
	 <div class="calendar">
		<div class="contrl">
			<div class="show-month">
				<span>2013年12月</span><s></s>
				<div class="aBox month-list" style="display:none">
					<ul>
						<li><a href="javascript:void(set_data('2013','1'))" month="1" year="2013" title="2013年1月">1</a></li>
						<li><a href="javascript:void(set_data('2013','2'))" month="2" year="2013" title="2013年2月">2</a></li>
						<li><a href="javascript:void(set_data('2013','3'))" month="3" year="2013" title="2013年3月">3</a></li>
						<li><a href="javascript:void(set_data('2013','4'))" month="4" year="2013" title="2013年4月">4</a></li>
						<li><a href="javascript:void(set_data('2013','5'))" month="5" year="2013" title="2013年5月">5</a></li>
						<li><a href="javascript:void(set_data('2013','6'))" month="6" year="2013" title="2013年6月">6</a></li>
						<li><a href="javascript:void(set_data('2013','7'))" month="7" year="2013" title="2013年7月">7</a></li>
						<li><a href="javascript:void(set_data('2013','8'))" month="8" year="2013" title="2013年8月">8</a></li>
						<li><a href="javascript:void(set_data('2013','9'))" month="9" year="2013" title="2013年9月">9</a></li>
						<li><a href="javascript:void(set_data('2013','10'))" month="10" year="2013" title="2013年10月">10</a></li>
						<li><a href="javascript:void(set_data('2013','11'))" month="11" year="2013" title="2013年11月">11</a></li>
						<li><a href="javascript:void(set_data('2013','12'))" month="12" year="2013" title="2013年12月">12</a></li>
					</ul>
				</div>
			</div>
			<script>
				$(".show-month span").click(function(){
					$(".month-list").show(100,function(){g521.spaceClosed(".month-list")});
				})
			</script>
			

		</div>
		<div class="date-list rBox">
			<div class="box">
				<ul>
						<li class="empty"></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-1">1</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-2">2</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-3">3</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-4">4</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-5">5</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-6">6</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-7">7</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-8">8</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-9">9</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-10">10</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-11">11</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-12">12</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-13">13</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-14">14</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-15">15</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-16">16</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-17">17</a></li>
						<li class="hover"><a href="http://www.521g.com/kaifu/?date=2013-12-18">今天</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-19">19</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-20">20</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-21">21</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-22">22</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-23">23</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-24">24</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-25">25</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-26">26</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-27">27</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-28">28</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-29">29</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-30">30</a></li>
						<li><a href="http://www.521g.com/kaifu/?date=2013-12-31">31</a></li>					
						<li class="empty"></li>
				</ul>
			</div>
			<div class="hover-border" style="left: 636px; top: 28px; display: block;"></div>
		</div>
		
		<!-- 日期显示时ajax时需要带入此方法 -->
		<script>
			g521.seachXy($(".date-list li.hover"),".hover-border");
		</script>
	</div>
</div>
	
	<div class="open-links margin-b"><!-- 运营商列表开始 -->
		<div class="b-border">
			<div class="border-box">
				<ul class="dotted-bg">
					<li id="game_id_2939"><a title="武尊" href="http://www.521g.com/kaifu?game_id=2939&amp;date=2013-12-18">武尊 (<em>72</em>)</a></li>
					<li id="game_id_2973"><a title="烈焰" href="http://www.521g.com/kaifu?game_id=2973&amp;date=2013-12-18">烈焰 (<em>66</em>)</a></li>
					<li id="game_id_3326"><a title="武易" href="http://www.521g.com/kaifu?game_id=3326&amp;date=2013-12-18">武易 (<em>57</em>)</a></li>
					<li id="game_id_3260"><a title="一剑轩辕" href="http://www.521g.com/kaifu?game_id=3260&amp;date=2013-12-18">一剑轩辕 (<em>36</em>)</a></li>
					<li id="game_id_3308"><a title="太古遮天" href="http://www.521g.com/kaifu?game_id=3308&amp;date=2013-12-18">太古遮天 (<em>35</em>)</a></li>
					<li id="game_id_2920"><a title="街机三国" href="http://www.521g.com/kaifu?game_id=2920&amp;date=2013-12-18">街机三国 (<em>35</em>)</a></li>
					<li id="game_id_2497"><a title="热血三国2" href="http://www.521g.com/kaifu?game_id=2497&amp;date=2013-12-18">热血三国2 (<em>32</em>)</a></li>
					<li id="game_id_2620"><a title="热血海贼王" href="http://www.521g.com/kaifu?game_id=2620&amp;date=2013-12-18">热血海贼王 (<em>31</em>)</a></li>
					<li id="game_id_3187"><a title="女神联盟" href="http://www.521g.com/kaifu?game_id=3187&amp;date=2013-12-18">女神联盟 (<em>28</em>)</a></li>
			
                                        <li class="check-all">
						<a class="all" href="#"><span>查看所有</span><s></s></a>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- 运营商列表结束 -->
	<div class="date-open">
		<div class="titles blue-b"><!-- 标题-->
			<h2 class="left" title="">12月18日<span>开服表</span></h2>
			<div class="choose-msg right">
				您选择的日期：<span class="date">2013-12-18</span>符合条件开服<b>1024</b>组
			</div>
		</div>
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
				<!-- 首面主迭代样式 -->
					<ul time="11" class="">
						<li class="name"><a target="_blank" href="http://www.521g.com/youxi/2939.html">武尊</a></li>
						<li class="open">
							<dl>
								<dt style="display: block;">今天 11:00</dt>
								<dd style="display: none;">
									<a href="http://www.521g.com/qq_remind/402120.html" target="_blank"></a>
								</dd>
							</dl>
						</li>
						<li class="service"><a target="_blank" href="http://www.521g.com/kaifu/402120.html">双线87服</a></li>
						<li class="type">角色扮演</li>
						<li class="company"><a target="_blank" href="http://www.521g.com/pingtai/288.html">微微玩</a></li>
						<li class="gift"></li>
						<li class="activity"></li>
						<li class="players"><a server_id="402120" server_name="微微玩《武尊》双线87服" target="_blank" href="http://www.521g.com/search/user/?server_id=402120">29</a></li>
						<li class="play"><a class="" target="_blank" href="http://www.521g.com/kaifu/402120.html">开始游戏</a></li>
						<li class="model"><span class="will">未开服</span></li>
						<li class="convene"></li>
					</ul><!-- 首面主迭代样式 -->
					
			</dd>
		</dl><!-- 表格主体结束 -->
	</div><!-- 表格结束 -->
<script>
$(".nav-box .nav-list li").eq(1).addClass("hover")
		
	var page_detail = {
		tag:".open-links li",
		num:23,
		show_word:"<span>查看所有</span><s></s>",
		hide_word:"<span>收起内容</span><s></s>",
		targets:".check-all a",
		class_name:"all",
		other:"last"
	}
	var pageList = new setList();
		pageList.reset(page_detail);
function set_data(years,monthes){
	$.get(
		url + 'ajax/kaifudate/',
		{year:years,month:monthes},
		function(data){
			$("#calendar").html(data);
			$("body").click();
			pageList.reset(page_detail)
		}
	)
}

</script>
  