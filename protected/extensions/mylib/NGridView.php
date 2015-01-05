<?php

/**
 * TbGridView class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */
Yii::import('bootstrap.widgets.TbGridView');

/**
 * Bootstrap Zii grid view.
 */
class NGridView extends TbGridView {
    public $show_checkbox_select = false;
    public $operate = 'delete';//examine;e_delete
    public $target_id = 'yw0';//examine;e_delete
    /**
     * Creates column objects and initializes them.
     */
    protected function initColumns() {
        if(!$this->show_checkbox_select)
            unset($this->columns['0']);
        foreach ($this->columns as $i => $column) {
            if (is_array($column) && !isset($column['class']))
                $this->columns[$i]['class'] = 'ext.mylib.NDataColumn';
        }

        parent::initColumns();
    }

    /**
     * Creates a column based on a shortcut column specification string.
     * @param mixed $text the column specification string
     * @return \TbDataColumn|\CDataColumn the column instance
     * @throws CException if the column format is incorrect
     */
    protected function createDataColumn($text) {
        if (!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $text, $matches))
            throw new CException(Yii::t('zii', 'The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));

        $column = new NDataColumn($this);
        $column->name = $matches[1];

        if (isset($matches[3]) && $matches[3] !== '')
            $column->type = $matches[3];

        if (isset($matches[5]))
            $column->header = $matches[5];

        return $column;
    }
    
    public function renderTableRow($row){
//        $this->rowCssClass = array();
        $modelName = get_class($this->dataProvider->model);
        GlobalFunction::$temp = array(
            'class'=>$modelName.$this->dataProvider->data[$row]['id'],
            'data_id'=>$this->dataProvider->data[$row]['id'],
        );
        $this->rowHtmlOptionsExpression = 'GlobalFunction::$temp';
        parent::renderTableRow($row);
    }
    
    public function renderItems() {
        parent::renderItems();
        if($this->show_checkbox_select) {      
$c_btn=<<<EOD
            <a class="btn btn-danger btn-small" onclick="ncheckbox.pass(2,'删除','delete');">删除</a>
EOD;
if($this->operate=='examine')
$c_btn=<<<EOD
            <a class="btn btn-success btn-small" onclick="ncheckbox.pass(1,'通过','examine');">通过</a>
            <a class="btn btn-danger btn-small" onclick="ncheckbox.pass(2,'拒绝','examine');">拒绝</a>
EOD;
if($this->operate=='e_delete')
$c_btn=<<<EOD
             <a class="btn btn-success btn-small" onclick="ncheckbox.pass(1,'通过','examine');">通过</a>
            <a class="btn btn-danger btn-small" onclick="ncheckbox.pass(2,'删除','delete');">删除</a>
EOD;
    
$btn=<<<EOD

    <div class="btn-group">
            <a class="btn btn-primary btn-small" onclick="ncheckbox.select();">全选</a>
            <a class="btn btn-small" onclick="ncheckbox.cancel();">取消全选</a>
            $c_btn
    </div>

EOD;
    echo $btn;
        }
    }

}
