
  
    <style>
		.white { background:#fff; }
		.grey { background:#f2f2f2; }
		ul.xFire, ul.xFire1 {
			background: #FFFBBA;
		}
	  </style>
  <div class="thisOuterWrapper ofv">
    <div class="thisWrapper_R ofv">
	  <div class="thisWrapper_L ofv">
	    
	    		<div class="thisBigTitleWrapper">
		  <div class="thisBigTitle xScreen msya">
		    <p class="tt_l fl c33"><a href="{$createUrl(stage/kaifu)}">今日开服</a></p>
			<p class="tt_r fr"><a href="{$createUrl(stage/kaifu)}">今日共 <b>{$count}</b> 款开服</a></p>
		  </div>
		</div>
				
		<!-- 今日数据加载 -->
		<div class="thisInnerWrapper xScreen2 bbn ofv">
		
		  <ul class="tableTitle xScreen2">
		    <li class="x16">游戏名称</li>
			<li class="x14">开服时间</li>
			<li class="x14">服务器名</li>
			<li class="x14">游戏类型</li>
			<li class="x14">游戏礼包</li>
			<li>快捷操作</li>
			<li class="vv">运营商</li>
		  </ul>
		  		  		  
          
		  
		  
		  		 
		  	<n:kaifu>
				<ul class="lineFix tableList xScreen2 ofv grey $hour $color " data-bgcolor="f2f2f2" >
					<li class="vName v2"><a href="$registerAddress" rel="nofollow" target="_blank">$name$img</a></li>
					<li class="thisWH xRel">
						 <p>
							<a href="javascript:;" 
								onmouseover="document.getElementById(&#39;lxy_$id&#39;).style.height=&#39;30px&#39;" 
								onmouseout="document.getElementById(&#39;lxy_$id&#39;).style.height=&#39;0&#39;">
								$open
							</a>
						</p>
						<div class="thisRemind" id="lxy_$id"
						onmouseover="this.style.height=&#39;30px&#39;" 
						onmouseout="this.style.height=&#39;0&#39;">
							<a href="javascript:;" 
							onclick="add_warn('$name$service$registerAddress', &#39;$open2&#39;, &#39;942121&#39;)">
							<img src="{$baseurl}/kaifu_files/thisRemind.png">
							</a>
						</div>
					</li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$service</a></li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$type</a></li>
					<li class="vGift">
									</li>
					<li class="vStart"><a href="$registerAddress" rel="nofollow" target="_blank">开始游戏</a></li>
					<li class="vv xRel ofv">
							  <p><a href="$registerAddress" rel="nofollow" target="_blank">$platform</a></p>
					</li>
			    </ul>
			</n:kaifu>
			<n:kaifu2>
				<ul class="lineFix tableList xScreen2 ofv grey $hour $color " data-bgcolor="f2f2f2" >
					<li class="vName v2"><a href="$registerAddress" rel="nofollow" target="_blank">$name</a></li>
					<li class="thisWH xRel">
						<p>
							<a href="javascript:;" 
							onmouseover="document.getElementById(&#39;lxy_$id&#39;).style.height=&#39;30px&#39;" 
							onmouseout="document.getElementById(&#39;lxy_$id&#39;).style.height=&#39;0&#39;">
							$open
							</a>
						</p>
						<div class="thisRemind" id="lxy_$id"
						onmouseover="this.style.height=&#39;30px&#39;" 
						onmouseout="this.style.height=&#39;0&#39;">
							<a href="javascript:;" 
							onclick="add_warn('$name$service$registerAddress', &#39;$open2&#39;, &#39;942121&#39;)">
							<img src="{$baseurl}/kaifu_files/thisRemind.png">
							</a>
						</div>
					</li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$service</a></li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$type</a></li>
					<li class="vGift">
					</li>
					<li class="vStart"><a href="$registerAddress" rel="nofollow" target="_blank">开始游戏</a></li>
					<li class="vv xRel ofv">
						<p><a href="$registerAddress" rel="nofollow" target="_blank">$platform</a></p>
					</li>
			    </ul>
			</n:kaifu2>
		</div>
		
		<script>
			$('ul.lineFix').live('mouseover',function(){
				$(this).css('background-color', '#e8f5ff');
			}).live('mouseout', function(){
				var bg = $(this).attr('data-bgcolor');
				$(this).css('background-color', '#'+bg);
			});
			$('ul.xFire1').live('mouseover',function(){
				$(this).css('background-color', '#e8f5ff');
			}).live('mouseout', function(){
				$(this).css('background-color', '#fffbba');
			});
		</script>		<!-- 今日数据加载 结束 -->
		
		
		<div class="thisOuterMore">
		  <div class="thisInnerMore xScreen2 msya">
		    <p class="xMore"><a href="{$createUrl(stage/kaifu)}">查看今日更多开服 &gt;&gt;</a></p>
		  </div>
		</div>
		
		<div class="thisBottomShadowWrapper">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		<div class="thisBigTitleWrapper" id="nightList">
		  <div class="thisBigTitle xScreen msya">
		  <p class="tt_l fl c33">通宵推荐</p>
		  </div>
		</div>
		
		<div class="thisInnerWrapper xScreen2 bbn ofv">
		
			<ul class="tableTitle xScreen2">
				<li class="x16">游戏名称</li>
				<li class="x14">开服时间</li>
				<li class="x14">服务器名</li>
				<li class="x14">游戏类型</li>
				<li class="x14">游戏礼包</li>
				<li>快捷操作</li>
				<li class="vv">运营商</li>
			</ul>
			<n:night>
				<ul class="tableList xScreen2 ofv xFire" onmouseover="this.style.backgroundColor=&#39;#e8f5ff&#39;" onmouseout="this.style.backgroundColor=&#39;#fffbba&#39;">
					<li class="vName v2">
						<a href="$registerAddress" rel="nofollow" target="_blank">$name</a>
						<img src="{$baseurl}/kaifu_files/tx1.gif">
					</li>
					<li class="thisWH xRel">
						<p style="padding-top:8px"><img src="{$baseurl}/kaifu_files/tx2.gif"></p>
					</li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$service</a></li>
					<li class="v2"><a href="$registerAddress" rel="nofollow" target="_blank">$type</a></li>
					<li class="vGift">
									</li>
					<li class="vStart"><a href="$registerAddress" rel="nofollow" target="_blank">开始游戏</a></li>
					<li class="vv xRel ofv">
							  <p><a href="$registerAddress" rel="nofollow" target="_blank">$platform</a></p>
					</li>
				</ul>
			</n:night>
		 </div>
				
		
		
		
		<div class="thisTopShadowWrapper" id="shadow_d">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		
	<n:calendar>
		日历
	</n:calendar>
	
	
		
		<div class="thisTopShadowWrapper">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		<div class="thisInnerWrapper xScreen2 msya">
		  <div class="thisLink">
		    <p>
				<span>友情链接</span>
				<n:links>
					<a class="kf_yqcc" href="$url" target="_blank">$name</a> | 
				</n:links>
			</p>
		  </div>
		</div>
		
		<div class="thisBottomShadowWrapper">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		
		
		
	  </div>
	</div>
  </div>
  
  
    <div id="left_month" class="thisPointer msya" style="top: 213px; _top: expression(documentElement.scrollTop+213+&#39;px&#39;);">
    <ul class="clearfix">
    		    <li><a class="h_8" href="javascript:;" value="8">08:00</a></li>
	    	    <li><a class="h_9" href="javascript:;" value="9">09:00</a></li>
	    	    <li><a class="h_10" href="javascript:;" value="10">10:00</a></li>
	    	    <li><a class="h_11" href="javascript:;" value="11">11:00</a></li>
	    	    <li><a class="h_12" href="javascript:;" value="12">12:00</a></li>
	    	    <li><a class="h_13" href="javascript:;" value="13">13:00</a></li>
	    	    <li><a class="h_14" href="javascript:;" value="14">14:00</a></li>
	    	    <li><a class="h_15" href="javascript:;" value="15">15:00</a></li>
	    	    <li><a class="h_16" href="javascript:;" value="16">16:00</a></li>
	    	    <li><a class="h_17" href="javascript:;" value="17">17:00</a></li>
	    	    <li><a class="h_18" href="javascript:;" value="18">18:00</a></li>
	    	    <li><a class="h_19" href="javascript:;" value="19">19:00</a></li>
	    	    <li><a class="h_20" href="javascript:;" value="20">20:00</a></li>
	    	    <li><a class="h_21" href="javascript:;" value="21">21:00</a></li>
	    	    <li><a class="h_22" href="javascript:;" value="22">22:00</a></li>
	    	    <!--<li class="xLast"><a href="javascript:;" value="kf_fire">火爆开服</a></li>-->
	    <li class="xLast"><a href="{$createUrl(stage/index#nightList)}">通宵推荐</a></li>
	</ul>
  </div>
  
<script type="text/javascript">
$(function () {
	var d = new Date();
	var h = d.getHours();
	$('.h_'+h).addClass('current');
	$('#left_month ul li a').click(function() {
		$('#left_month ul li a').removeClass('current');
		$(this).addClass('current');
		$('ul.lineFix').attr('style','');
		var name = $(this).attr("value");		
		$('ul').removeClass('xFire1');
		$("." + name).addClass('xFire1');
		
		
		var pos = $("."+name).offset().top;
		$("html,body").scrollTop(pos);
		
	});
});
</script>
  <script type="text/javascript">
/*function receive(id, kf_id) {
	try {
		$('#thisWinWrapper').show();
		$('#thisWinWrapper h2').text("号码领取中");
		$('#thisWinWrapper_content').html('<p align="center"><b>正在为您准备号码，不要关闭当前窗口，请稍等...</b></p><br /><p align="center" style="padding-right:20px;"><img src="http://img1.游戏.com/_10img/hao/img_tips.gif" /> 提示:为了您和他人的利益，请不要重复领取</p>');
		$('#thisWinWrapper_content').show();
		$('#thisFloating_content_success').hide();

    	$.getScript("/fahaoinfo/getInfo/" + id + '/' + Math.random(), function () {
//     		alert(giftinfo.title);
    		$.ajax({
    		    dataType: 'jsonp',
    		    data: {},
    		    jsonp: 'jsonp_callback',
    		    url: 'http://fahao.游戏.com/api/tk_fh/' + id,
    		    success: function(giftdata) {
    		    	kf_url = 'http://kf.游戏.com/kfinfo/go/' + kf_id;

    		    	if (giftdata.error_no == '89' || giftdata.error_no == '88' || giftdata.error_no  == '87') {
    					$('#thisWinWrapper_content').show();
    					$('#thisWinWrapper_content').html('<p>没有找到发号信息</p>');
    					$('#thisFloating_content_success').hide();
    					return false;
    				}

    		    	if (giftdata.error_no == '88') {
    					$('#thisWinWrapper h2').text(giftinfo.title);
    					$('#card_code').val('');
    					$('#fh_content h3').html('很抱歉，已被一抢而空！')
    					$('#fh_success').hide();
    					$('#thisWinWrapper_content').hide();
    					$('#fh_content').show();
    					$('#weburl').val(kf_url);
    					$('#thisFloating_content_success').show();
    					return false;
    				}

    		    	if (giftdata.error_no == '0') {
    					$('#thisWinWrapper h2').text(giftinfo.title);
    					$('#thisWinWrapper_content').hide();
    					$('#fh_content').hide();
    					
    					$('#card_code').val(giftdata.gift_code);
    					$('#card_info1').html(giftinfo.info1);
    					$('#card_info2').html(giftinfo.info2);
    					$('#weburl').val(kf_url);
    					var str = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="CaoCao" width="80" height="25" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">'
    						+ '<param name="movie" value="http://img1.游戏.com/_12js/copy.swf" />'
    						+ '<param name="flashvars" value="lable1=复制卡密&lable2=已复制&color=0xFFFFFF&size=12&x=13&y=2&time=1000&line=true&text='
    						+ giftdata.gift_code
    						+ '" />'
    						+ '<param name="align" value="middle" />'
    						+ '<param name="quality" value="high" />'
    						+ '<param name="wmode" value="transparent" />'
    						+ '<param name="allowScriptAccess" value="sameDomain" /><embed align="middle" width="80" height="25" flashvars="lable1=复制卡密&lable2=已复制&color=0xFFFFFF&size=12&x=13&y=4&time=1000&line=true&text='
    						+ giftdata.gift_code
    						+ '" src="http://img1.游戏.com/_12js/copy.swf" quality="high" wmode="transparent" allowscriptaccess="sameDomain" pluginspage="http://www.adobe.com/go/getflashplayer" type="application/x-shockwave-flash">';
    					$('#card_copy').html('').prepend(str);

    					$('#thisFloating_content_success').show();
    					$('#fh_success').show();
    				}
    		    	
    		    },
    		});
	    });*/

		/*
		$.getJSON("http://fahao.游戏.com/api/tk_fh/" + id, function (giftdata) {

			kf_url = 'http://kf.游戏.com/kfinfo/go/' + kf_id

			alert(giftdata.error);
			return false;
			if(giftdata.error == 'notfound') {
				$('#thisWinWrapper_content').show();
				$('#thisWinWrapper_content').html('<p>没有找到发号信息</p>');
				$('#thisFloating_content_success').hide();
				return false;
			}

			if (giftdata.error == 'expired' || giftdata.error == 'empty') {
				$('#thisWinWrapper h2').text(giftdata.title);
				$('#card_code').val('');
				$('#fh_content h3').html('很抱歉，已被一抢而空！')
				$('#fh_success').hide();
				$('#thisWinWrapper_content').hide();
				$('#fh_content').show();
				$('#weburl').val(kf_url);
				$('#thisFloating_content_success').show();
				return false;
			}
			
			if (giftdata.error == 'tp' || 
					giftdata.error == 'activity' || giftdata.error == 'iptake' || 
					giftdata.error == 'repeat'
					) {
				
				$('#thisWinWrapper h2').text(giftdata.title);
				$('#card_code').val('');
				$('#fh_content h3').html(giftdata.message)
				$('#fh_success').hide();
				$('#thisWinWrapper_content').hide();
				$('#fh_content').show();
				$('#weburl').val(kf_url);
				$('#thisFloating_content_success').show();
				return false;
			}

			if (giftdata.error == 'success') {
				$('#thisWinWrapper h2').text(giftdata.title);
				$('#thisWinWrapper_content').hide();
				$('#fh_content').hide();
				$('#thisFloating_content_success').show();
				$('#fh_success').show();
				$('#card_code').val(giftdata.message);
				$('#card_info1').html(giftdata.info1);
				$('#card_info2').html(giftdata.info2);
				$('#weburl').val(kf_url);
				var str = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="CaoCao" width="80" height="25" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">'
					+ '<param name="movie" value="http://img1.游戏.com/_12js/copy.swf" />'
					+ '<param name="flashvars" value="lable1=复制卡密&lable2=已复制&color=0xFFFFFF&size=12&x=13&y=2&time=1000&line=true&text='
					+ giftdata.message
					+ '" />'
					+ '<param name="align" value="middle" />'
					+ '<param name="quality" value="high" />'
					+ '<param name="wmode" value="transparent" />'
					+ '<param name="allowScriptAccess" value="sameDomain" /><embed align="middle" width="80" height="25" flashvars="lable1=复制卡密&lable2=已复制&color=0xFFFFFF&size=12&x=13&y=4&time=1000&line=true&text='
					+ giftdata.message
					+ '" src="http://img1.游戏.com/_12js/copy.swf" quality="high" wmode="transparent" allowscriptaccess="sameDomain" pluginspage="http://www.adobe.com/go/getflashplayer" type="application/x-shockwave-flash">';
				$('#card_copy').html('').prepend(str);
			}
		});
		*/
	} catch(e) {
		return false;
	}
}
</script>
  <div class="thisWinWrapper msya xShadow w400" id="thisWinWrapper" style=" top: 167px; _top: expression(documentElement.scrollTop+300+&#39;px&#39;); display: none;">
    <h2 align="center"></h2>
	<p class="wxx"><a href="javascript:;" onclick="$(&#39;#thisWinWrapper&#39;).hide();"><img src="{$baseurl}/kaifu_files/x.png"></a></p>
	<div class="thisWinPages" id="thisWinWrapper_content"></div>
	<div class="thisWinPages" id="thisFloating_content_success" style="display: none">
		<div id="fh_content" style="display: none;">
	  <h3></h3>
	  <h6><a href="http://kf.游戏.com/#" class="wpa1" onclick="window.open($(&#39;#weburl&#39;).val());">开始游戏</a></h6>
	  	</div>
	  	<div id="fh_success">
	  <h4><input id="card_code" type="text" value="" class="msya" name=""></h4>
	  <h5>
	    <span class="wpa3" id="card_copy"></span>
		<a href="javascript:;" class="wpa2" onclick="window.open($(&#39;#weburl&#39;).val());">开始游戏</a>
	  </h5>
	  <h4>礼包介绍</h4>
	  <p><b>礼包介绍</b></p>
	  <p id="card_info1"></p>
	  <p><b>使用方法</b></p>
	  <p id="card_info2"></p>
	  <input id="weburl" type="hidden" value="">
	  	</div>
	  </div>
  </div>  
