<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameAction
 *
 * @author Administrator
 */
class IncludeAction extends SelfAction{
    //put your code here
    public function run($name=null) {
//        $this->setCustomTags(array(
//           
//        ));
        if(isset($name)){
            switch($name){
                case "add":
                    $this->add();
                break;
                default:
                    $this->list_info($name);
            }
        }else{
             $this->list_data();
        }
    }
    
    public function add(){
        $model = new Pgame();
        $p['pgame']['g_url'] = $_POST['p_address'];
        $p['pgame']['p_id'] = $_POST['p_id'];
        $p['pgame']['g_id'] = $_POST['g_id'];
        $p['pgame']['m_id'] = Yii::app()->session['id'];
        $model->setAttributes($p['pgame'],false);
        if($model->save()){
            $game = Game::model()->findByPk($model->g_id);
            if($game->p_id=='') $p2['Game']['p_id']=$model->p_id;
            else $p2['Game']['p_id'] = $game->p_id.','.$model->p_id;
            $game->setAttributes($p2['Game'],false);
            if($game->save()){
                $data['pass'] = true;
                $data['msg'] = "收录成功！";
            }else{
                $data['pass'] = false;
                $data['msg'] = "收录失败！请重试！";
            }
            echo CJSON::encode($data);
        }
    }
    
    public function list_info($name){
           
        $criteria=new CDbCriteria(array(  
            'condition'=>"`name`='$name' and `examine`=1",  
        ));
       
        $dataProvider = new JSonActiveDataProvider('Game',array(
            'criteria' => $criteria,
        ));
        $data = $dataProvider->getArrayData();
        echo json_encode($data['data'][0]);
    }   
    public function list_data(){
        $criteria=new CDbCriteria(array(  
            'condition'=>'`examine`=1',  
        ));
        $dataProvider = new CActiveDataProvider('Game',array(
            'criteria' => $criteria,
        ));
        
        $data = array();
        foreach($dataProvider->getData() as $d){
            $data[] = $d['name'];
        }
        
        $this->controller->render("include",array(
            'data'=>$data,
            'model'=>$dataProvider->model,
        ));
    }
    
    public function tagTest(){
        return '000';
    }
    
}

?>
