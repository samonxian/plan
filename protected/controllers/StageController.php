<?php
class StageController extends NController{
    
        public $layout = '//layouts/stage_default';
        public function actions(){
			// return external action classes, e.g.:
			return array(
				'game'=>'application.controllers.stage.GameAction',
				'game_info'=>'application.controllers.stage.Game_infoAction',
				'platform'=>'application.controllers.stage.PlatformAction',
				'platform_info'=>'application.controllers.stage.Platform_infoAction',
				'jintian'=>'application.controllers.stage.KaifuAction',
				'index'=>'application.controllers.stage.IndexAction',
				'gamerank'=>'application.controllers.stage.GamerankAction',
				'lishi'=>'application.controllers.stage.HistoryAction',
				'bang'=>'application.controllers.stage.RankAction',
				'search'=>'application.controllers.stage.SearchAction',
			);
		}
        
        
        public function actionProgress(){
            $this->layout = "//layouts/empty";
            if(!isset($_GET['id'])) $this->redirect('kaifu');
            $model = Sservice::model()->find("`id`=:id",array(
                "id"=>$_GET['id'],
            ));
            // 统计点击量
            $gameObj = Game::model()->find("id=:id",array(":id"=>$model->g_id));
            if($gameObj){
                    $p['Game']['click'] = $gameObj->click + 1;
                    $flag = Tglobal::isToReset();
                    if($flag){
                        $p['Game']['clickprevweek'] = $gameObj->clickprevweek + 1;
                    }else{
                        $p['Game']['clickthisweek'] = $gameObj->clickthisweek + 1;
                    }
                    $gameObj->attributes=$gameObj->setAttributes($p['Game'],false);
//                    var_dump($gameObj->attributes);
                    $gameObj->saveAttributes($gameObj->attributes);
            }
            $this->render('progress',array(
                "model"=>$model,
            ));
        }
        
        public function actionRe(){
            $this->layout = "//layouts/empty";
            $this->render('re',array(
            ));
        }
         public function actionLo(){
            $this->layout = "//layouts/empty";
            $this->render('lo',array(
            ));
        }
        
        public function actionSaveto(){
             $Shortcut = "
                    [InternetShortcut]
                        URL=http://s-61973.gotocdn.com
                        IDList=
                        IconFile=http://s-61973.gotocdn.com
                        IconIndex=1
                        [{000214A0-0000-0000-C000-000000000046}]
                        Prop3=19,2
             ";
             Header("Content-type: application/octet-stream"); 
             header("Content-Disposition: attachment; filename=5884.url");
             echo $Shortcut;
        }
        
        
        
        
//	public function actionGame(){
//		$this->render('game');
//	}
//	public function actionPlatform(){
//		$this->render('platform');
//	}
//	public function actionPlatform_info(){
//		$this->render('platform_info');
//	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
        */
	
	
}