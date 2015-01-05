 <div class="thisOuterWrapper ofv">
    <div class="thisWrapper_R ofv">
	  <div class="thisWrapper_L ofv">
	    
		
		
		<div class="thisGPSWrapper" id="gps_d">
		 <div class="thisGPS xScreen2 msya">
		   <p><a href="{$createUrl(stage/index)}">游戏开服表</a> &gt; 开服排行</p>
		 </div>
		</div>
		
		
		
		
		
		<div class="thisTopShadowWrapper delmb">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		<div class="thisInnerWrapper xScreen2 msya">
		  <div class="thisRankWrapper">
		  
		    
			<h3>游戏周排行榜</h3>
			
			
		    <div class="thisRankInnerWrapper clearfix">
			  
			  
			  <div class="thisRank xRank3 fl">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						
						<tr>
							<th colspan="3">上周开服数量排行</th>
						</tr>
						
					</thead>
					<tbody>
						<tr>
							<th class="rTit" width="20%">排名</th>
							<th class="rTit" width="55%">游戏名称</th>
							<th class="rTit" width="25%">开服量</th>
						</tr>
						<n:open>
							<tr>
								<th class="rtot">$i</th>
									<td><a href="{$baseurl}/stage/search?keyword=$name">$name</a></td>
								<td>$open</td>
							</tr>
						</n:open>
					</tbody>
				</table>
			  </div>
			  <div class="thisRank xRank3 fl">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						
						<tr>
							<th colspan="3">上周热门点击排行</th>
						</tr>
						
					</thead>
					<tbody>
						<tr>
							<th class="rTit" width="20%">排名</th>
							<th class="rTit" width="55%">游戏名称</th>
							<th class="rTit" width="25%">点击量</th>
						</tr>
						<n:click>
							<tr>
								<th class="rtot">$k</th>
									<td><a href="{$baseurl}/stage/search?keyword=$name">$name</a></td>
								<td>$click</td>
							</tr>
						</n:click>
					</tbody>
				</table>
			  </div>
			  <div class="thisRank xRank3 fl">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						
						<tr>
							<th colspan="3">上周搜索热度排行</th>
						</tr>
						
					</thead>
					<tbody>
						<tr>
							<th class="rTit" width="20%">排名</th>
							<th class="rTit" width="55%">游戏名称</th>
							<th class="rTit" width="25%">搜索量</th>
						</tr>
						<n:search>
							<tr>
								<th class="rtot">$j</th>
									<td><a href="{$baseurl}/stage/search?keyword=$name">$name</a></td>
								<td>$search</td>
							</tr>
						</n:search>
					</tbody>
				</table>
			  </div>
			  
			  
			</div>
		  </div>
		</div>
		
		<div class="thisBottomShadowWrapper">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		
		
		
		
		
		
		<p class="sp10">&nbsp;</p>
		<p class="sp10">&nbsp;</p>
		
		
		
		
		
	    
		<div class="thisBigTitleWrapper">
		  <div class="thisBigTitle xScreen msya">
		    <p class="tt_l fl">推荐游戏</p>
			<p class="tt_r fr"></p>
		  </div>
		</div>
		
	    <div class="thisInnerWrapper xScreen2 ofv">
		
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
				<ul class="tableList xScreen2 ofv xFire" onmouseover="this.style.backgroundColor=&#39;#e8f5ff&#39;" onmouseout="this.style.backgroundColor=&#39;#fffbba&#39;">
					<li class="vName v2"><a href="$registerAddress" rel="nofollow" target="_blank">$name</a></li>
					<li class="thisWH xRel">
						 <p>
							$open
						</p>
						
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
		  	
	</div>
		
		
		<div class="thisBottomShadowWrapper">
		  <i class="fr"></i><em class="fl"></em>
		</div>
		
		
		
		
		
	  </div>
	</div>
  </div>