<style>
	.s-title h2{
		margin-right:35px;
	}
	#letters a{padding-left:0;}
	/*类似橙色的颜色*/
	body .color_orange{
		color:#ff6000;
	}
</style>
<div class="content lay-out">
	<div class="left-box">
		<div class="bottom-border">
			<div class="new-game rBox">
				<div class="tips aBox"></div>
				
				<div class="s-title" id="js_rtype">
					<a  href="javascript:void(0)" onclick="setAll(false,false,'0')">
						<h2 class="fl">全部游戏</h2>
					</a>
					<a  href="javascript:void(0)" onclick="setLetter(false,false,'手机')">
						<h2 class="fl">手机游戏</h2>
					</a>
					<a  href="javascript:void(0)" onclick="setLetter(false,false,'网页')">
						<h2 class="fl">网页游戏</h2>
					</a>
					<a  href="javascript:void(0)" onclick="setLetter(false,false,'客户端')">
						<h2 class="fl">客户端游戏</h2>
					</a>
				</div>
				<div class="box">
					<div class="list">
                        <n:newgame>
						<dl class="">
							<dt><a href="$url"><img src="$img" alt="$name">$name</a></dt>
							<dd>
								<p>类型：<a  href="javascript:void(0)">$typet</a></p>
								<p>画面：<a  href="javascript:void(0)">$ul</a></p>
								<p>题材：<a  href="javascript:void(0)">$theme</a></p>
								<p>状态：<a  href="javascript:void(0)">$gstate</a></p>
							</dd>
						</dl>
                        </n:newgame>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="bottom-border">
			<div class="quick-block mt_15">
				<dl class="s-type">
					<dt>按游戏<b>类别</b>查找：</dt>
					<dd>
						<ul id="js_platform">
							<li ><a href="javascript:void(0)" onclick="setAll(false,false,'0');return false;">全部</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,false,'手机');return false;">手机游戏</a></li>
							<li><a href="javascript:void(0)" onclick="setLetter(false,false,'网页');return false;">网页游戏</a></li>
							<li><a href="javascript:void(0)" onclick="setLetter(false,false,'客户端');return false;">客户端游戏</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="letter">
					<dt>按游戏<b>字母</b>查找：</dt>
					<dd>	
						<ul id="letters">
							<li ><a href="javascript:void(0)" onclick="setLetter('0',false);return false;">全部</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('A',false);return false;">A</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('B',false);return false;">B</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('C',false);return false;">C</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('D',false);return false;">D</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('E',false);return false;">E</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('F',false);return false;">F</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('G',false);return false;">G</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('H',false);return false;">H</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('I',false);return false;">I</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('J',false);return false;">J</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('K',false);return false;">K</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('L',false);return false;">L</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('M',false);return false;">M</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('N',false);return false;">N</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('O',false);return false;">O</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('P',false);return false;">P</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('Q',false);return false;">Q</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('R',false);return false;">R</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('S',false);return false;">S</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('T',false);return false;">T</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('U',false);return false;">U</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('V',false);return false;">V</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('W',false);return false;">W</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('X',false);return false;">X</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('Y',false);return false;">Y</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('Z',false);return false;">Z</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter('0-9',false);return false;">0-9</a></li>
						</ul>
					</dd>
				</dl>
				<dl>
					<dt>按游戏<b>类型</b>查找：</dt>
					<dd>
						<ul id="js_type">
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'0');return false;">全部</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'角色扮演');return false;">角色扮演</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'战争策略');return false;">战争策略</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'模拟经营');return false;">模拟经营</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'社区养成');return false;">社区养成</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'休闲竞技');return false;">休闲竞技</a></li>
							<li><a  href="javascript:void(0)" onclick="setLetter(false,'其他类型');return false;">其他类型</a></li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
		<div class="game-list mt_15">
			<div class="box">
				
						
                <n:recogame>	
				<dl>
					<div class="clearfix">
						<dt>
							<a target="_blank" href="$url"><img src="$img" alt="$name"></a>
						</dt>
						<dd>
							<h3><a target="_blank" href="$site">$name</a></h3>
							<p>
								<span class="g-span1 block fl">
									类型：<a  href="javascript:void(0)">$typet</a>
								</span>
								<span class="g-span2">
									评分：<a  href="javascript:void(0)">$estimate</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									画面：<a  href="javascript:void(0)">$ul</a>
								</span>
								<span class="g-span2">
									题材：<a  href="javascript:void(0)">$theme</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									战斗：<a  href="javascript:void(0)">$fightform</a>
								</span>
								<span class="g-span2">
									状态：<a  href="javascript:void(0)">$gstate</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									开发：<a  href="javascript:void(0)">$cCompany</a>
								</span>
								<span class="g-span2">
									运营：<a  href="javascript:void(0)">$rCompany</a>
								</span>
							</p>
						
						</dd>
					</div>
					
					<div class="g-action">
						<a class="play_btn fl ml5"  href="javascript:void(0)">官方网站</a>
						<a class="play_btn2 fl ml10 mr5"  href="javascript:void(0)">礼包</a>
						<a class="g-info fl ml15"  href="javascript:void(0)">新闻(0)</a>
						<a class="g-info fl ml10"  href="javascript:void(0)">攻略(0)</a>
						<a class="g-info fl ml10"  href="javascript:void(0)">图片(0)</a>
						<a class="g-info fl ml10"  href="javascript:void(0)">视频(0)</a>
					</div>
				</dl>
                </n:recogame>	
			</div>
			<div class="tc ">
				<n:recogamePager>
					分页
				</n:recogamePager>
			</div>
			<script>
			
			</script>
		</div>
			

	</div>

	<div class="right-box">
		<div class="click-rank rBox">
			<div class="tips aBox"></div>
			<div class="border-box">
				<div class="t-title">
					<h2>热门游戏排行榜</h2>
				</div>
			
				<div class="box" id="js_hotgame">
                                    
					<dl>
						<dt class="t-type" id="js_htype">
							<a class="mr10"  href="javascript:void(0)" onclick="setAll(false,false,'0')">全部</a>
							<a class="mr10"  href="javascript:void(0)" onclick="setLetter(false,false,'手机')">手游</a>
							<a class="mr15"  href="javascript:void(0)" onclick="setLetter(false,false,'网页')">页游</a>
							<a class=""  href="javascript:void(0)" onclick="setLetter(false,false,'客户端')">端游</a>
						</dt>
					</dl>
                    <n:hotgame>
					<dl>
						<dt>
							<span class="right">$click</span>
							<span class="num $top">$i</span>
							<a  href="$url">$name</a>
							
						</dt>
						<dd>
							<p>
								<span class="g-span1 block fl">
									类型：<a  href="javascript:void(0)">$typet</a>
								</span>
								<span class="g-span2">
									评分：<a  href="javascript:void(0)">$estimate</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									画面：<a  href="javascript:void(0)">$ul</a>
								</span>
								<span class="g-span2">
									题材：<a  href="javascript:void(0)">$theme</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									战斗：<a  href="javascript:void(0)">$fightform</a>
								</span>
								<span class="g-span2">
									状态：<a  href="javascript:void(0)">$gstate</a>
								</span>
							</p>
							<p>
								
								<span class="block fl g-span1">
									开发：<a  href="javascript:void(0)">$cCompany</a>
								</span>
								<span class="g-span2">
									运营：<a  href="javascript:void(0)">$rCompany</a>
								</span>
							</p>
						</dd>
					</dl>
                    </n:hotgame>
				</div>
			</div>
		</div>
		<div class="click-rank rBox mt10">
			<div class="tips aBox"></div>
			<div class="border-box">
				<div class="t-title">
					<h2>热门游戏测试表</h2>
				</div>
			
				<div class="box">
					<dl>
						<dt class="t-type" id="js_htype1">
							<a class="mr10"  href="javascript:void(0)" onclick="setAll(false,false,'0')">全部</a>
							<a class="mr10"  href="javascript:void(0)" onclick="setLetter(false,false,'手机')">手游</a>
							<a class="mr15"  href="javascript:void(0)" onclick="setLetter(false,false,'网页')">页游</a>
							<a class=""  href="javascript:void(0)" onclick="setLetter(false,false,'客户端')">端游</a>
						</dt>
					</dl>
					<dl>
						<dt>
							<table>
								<tr>
									<th>游戏名称</th>
									<th class="tc">测试时间</th>
									<th class="tr last">状态</th>
								</tr>
							</table>
						</dt>
						<dd>
							<p>
								<span>类型：<a  href="javascript:void(0)">角色扮演</a></span>
								<span>画面：<a  href="javascript:void(0)">2D</a></span>
							</p>
							<p>
								<span>题材：<a  href="javascript:void(0)">武侠</a></span>
								<span>状态：<a  href="javascript:void(0)">运营</a></span>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>
							<table>
								<tr>
									<td>
										<a  href="javascript:void(0)">烈火战神</a>
									</td>
									<td class="tc">09:00</td>
									<td class="tr color_orange last">公测</td>
								</tr>
							</table>
							
						</dt>
						<dd>
							<p>
								<span>类型：<a  href="javascript:void(0)">角色扮演</a></span>
								<span>画面：<a  href="javascript:void(0)">2D</a></span>
							</p>
							<p>
								<span>题材：<a  href="javascript:void(0)">武侠</a></span>
								<span>状态：<a  href="javascript:void(0)">运营</a></span>
							</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	
	</div>

	
</div>

<script>
    <!--<n:search>-->
    var url = '{$createUrl(stage/game)}';
	function setAll(pinyin,type,platform){
		location.href=url;
    }
    function setLetter(pinyin,type,platform){
		var platform=(platform?platform:'$platform')||0;
		var type=(type?type:'$type')||0;
		var pinyin=(pinyin?pinyin:'$pingyin')||0;
		location.href=url+'?type='+type+'&letter='+pinyin+'&platform='+platform;
    }
    var js_platfrom = $("#js_platform");
    var js_letter = $("#letters ");
    var js_type = $("#js_type");
    $('li:eq($pnum)',js_platfrom).addClass('hover');
    $('a:eq($pnum) h2',$("#js_rtype")).addClass('color_orange');
    $('a:eq($pnum)',$("#js_htype")).addClass('color_orange');
    $('a:eq($pnum)',$("#js_htype1")).addClass('color_orange');
    $('li:eq($lnum)',js_letter).addClass('hover');
    $('li:eq($tnum)',js_type).addClass('hover');
    <!--</n:search>-->
    var js_hotgame = $('#js_hotgame');
    g521.set_toggle("#js_hotgame dl","hover");
 
</script>
