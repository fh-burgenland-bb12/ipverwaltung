<?php

use Zend\Loader\StandardAutoloader as Autoloader,
    Zend\Db\Metadata\Metadata,
    Zend\Db\Adapter\Adapter as DbAdapter;

/////////////////////////////////////
//     START CONFIGURATION
/////////////////////////////////////
//
define('ZF2_PATH', 'library/Zend');
//define('TAB', '    ');
define('TAB', "\t");

$moduleName = 'Ipverwaltung';

$dbconfig = array(
    'driver' => 'Mysqli',
    'hostname' => 'localhost',
    'username' => 'ipverwaltung',
    'password' => 'IpV3rw8ltunG.A',
    'database' => 'ipverwaltung',
    'table_type' => 'InnoDB'
);

/////////////////////////////////////
//       END CONFIGURATION
/////////////////////////////////////

/*
require_once ZF2_PATH . '/library/Zend/Loader/StandardAutoloader.php';
$autoloader = new Autoloader;
$autoloader->register();
*/
require_once 'init_autoloader.php';

class ModelBuilder {
    protected $db;
    protected $stdin;
    protected $module;

    public function __construct($dbParams, $module) {
        $this->db = new DbAdapter($dbParams);
        $this->module = $module;
        $this->stdin = fopen('php://stdin', 'r');
    }

    public function run() {
        $tables = $this->getTablesToModel();
        $files = $this->getFiles($tables);
        $this->writeFiles($files);
    }

    public function getTablesToModel() {
        $metadata = new Metadata($this->db);

        foreach ($metadata->getTables() as $t) {
            if ($this->prompt($t->getName())) {
                $tables[] = $t;
            }
        }

        return $tables;
    }

    public function writeFiles($files) {
        foreach ($files as $dirname => $dir) {
            foreach ($dir as $file => $content) {
                $filename = $dirname . '/' . $file;
                @mkdir(dirname($filename), 0777, true);
                file_put_contents($filename, $content);
            }
        }
    }

    public function getFiles($tables) {
        $files = array();
        $dirConfig = 'module'. DIRECTORY_SEPARATOR . $this->module . DIRECTORY_SEPARATOR . 'config';
        $files[$dirConfig]['model.php'] = "";
        foreach ($tables as $t) {

            foreach($t->getConstraints() as $constraint)
            {
                if($constraint->isPrimaryKey())
                {
                    $pKey = $constraint;
                    break;
                }
            }
            $modelName = $this->toCamelCase($t->getName());
            $dbTableName = $t->getName();
            $modelInterfaceName = $modelName . 'Interface';
            $tableName = $modelName . 'Table';
            $formName = $modelName . 'Form';
            $inputFilterName = $modelName . 'InputFilter';
            $dirModel = 'module'. DIRECTORY_SEPARATOR . $this->module . DIRECTORY_SEPARATOR . 'src' .
                DIRECTORY_SEPARATOR . $this->module . DIRECTORY_SEPARATOR .
                'Model' . DIRECTORY_SEPARATOR . $modelName;

            $configFile = <<<EOF
            '{$this->module}\Model\\$modelName\\$modelName' =>  function(\$sm) {
                \$g = new {$this->module}\Model\\$modelName\\$modelName();
                return \$g;
            },
            '{$this->module}\Model\\$modelName\\$tableName' =>  function(\$sm) {
                \$tableGateway = \$sm->get('{$this->module}\Model\\$modelName\\${tableName}Gateway');
                \$table = new {$this->module}\Model\\$modelName\\$tableName(\$tableGateway);
                return \$table;
            },
            '{$this->module}\Model\\$modelName\\${tableName}Gateway' => function (\$sm) {
                \$dbAdapter = \$sm->get('Zend\Db\Adapter\Adapter');
                \$resultSetPrototype = new ResultSet();
                \$resultSetPrototype->setArrayObjectPrototype(\$sm->get('{$this->module}\Model\\$modelName\\$modelName'));
                return new TableGateway('$dbTableName', \$dbAdapter, null, \$resultSetPrototype);
            },
EOF;

            $files[$dirConfig]['model.php'] .= $configFile;


            $modelFile = <<<EOF
<?php

namespace {$this->module}\Model\\$modelName;
use {$this->module}\Model\\ModelInterface;

class $modelName implements $modelInterfaceName, ModelInterface
{

EOF;

            // fields
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colName[0] = strtolower($colName[0]);
                $modelFile .= TAB . "protected \${$colName};\n";
            }

            $modelFile .= "\n";

            // getters and setters
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colFuncName = $colName;
                $colName[0] = strtolower($colName[0]);
                $modelFile .= TAB . "public function get{$colFuncName}()\n";
                $modelFile .= TAB . "{\n";
                $modelFile .= TAB . TAB . "return \$this->$colName;\n";
                $modelFile .= TAB . "}\n\n";

                $modelFile .= TAB . "public function set{$colFuncName}(\$$colName)\n";
                $modelFile .= TAB . "{\n";
                $modelFile .= TAB . TAB . "\$this->$colName = \$$colName;\n";
                $modelFile .= TAB . TAB . "return \$this;\n";
                $modelFile .= TAB . "}\n\n";
            }

            $modelFile .= TAB . "public function exchangeArray(\$data)\n";
            $modelFile .= TAB . "{\n";
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colFuncName = $colName;
                $colName[0] = strtolower($colName[0]);
                $modelFile .= TAB . TAB . "if(isset(\$data['$colName'])) \$this->set$colFuncName(\$data['$colName']);\n";
            }
            $modelFile .= TAB . "}\n\n";
            $modelFile .= TAB . "public function toArray()\n";
            $modelFile .= TAB . "{\n";
            $modelFile .= TAB . TAB . "\$data = array();\n";
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colFuncName = $colName;
                $colName[0] = strtolower($colName[0]);
                $modelFile .= TAB . TAB . "\$data['$colName'] = \$this->get$colFuncName();\n";
            }
            $modelFile .= TAB . TAB . "return \$data;\n";
            $modelFile .= TAB . "}\n\n";

            $modelFile .= TAB . "public function getPrimaryFields()\n";
            $modelFile .= TAB . "{\n";

            $modelFile .= TAB . TAB . "return ".var_export($pKey->getColumns(),true).";\n";
            $modelFile .= TAB . "}\n\n";

            $modelFile .= "}";

            $files[$dirModel][$modelName . '.php'] = $modelFile;

            /**
             * MODEL INTERFACE START
             */
            $iModelFile = <<<EOF
<?php

namespace {$this->module}\Model\\$modelName;

interface $modelInterfaceName
{

EOF;

            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colFuncName = $colName;
                $colName[0] = strtolower($colName[0]);
                $iModelFile .= TAB . "public function get{$colFuncName}();\n";
                $iModelFile .= TAB . "public function set{$colFuncName}(\$$colName);\n";
            }

            $iModelFile .= "}";

            $files[$dirModel][$modelInterfaceName . '.php'] = $iModelFile;

            /**
             * FORM START
             */
            $formFile = <<<EOF
<?php

namespace {$this->module}\Model\\$modelName;
use Zend\Form\Form;
use Zend\Form\Element;

class $formName extends Form
{

    public function __construct()
    {
        parent::__construct();
EOF;
            // Fields
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colFuncName = $colName;
                $colName[0] = strtolower($colName[0]);

                $add = false;
                $attr = array();
                $elclass = "Element";
                if($col->getDatatype() == 'varchar' || $col->getDatatype() == 'char')
                {
                    $elclass = "Element\\Text";
                    $attr['type'] = 'text';
                }
                elseif($col->isNumericUnsigned())
                {
                    $elclass = "Element\\Number";
                    $attr['type'] = 'number';
                    $attr['min'] = '0';

                }
                elseif (strpos($col->getDatatype(),'int') !== false)
                {
                    $elclass = "Element\\Number";
                    $attr['type'] = 'number';
                }
                elseif (strpos(strtolower($col->getDatatype()),'enum') !== false)
                {
                    $elclass = "Element\\Select";
                    $options = $col->getErrata('permitted_values');
                    $add = "\$${colName}->setValueOptions(".var_export($options,true).");\n";
                    //var_dump($col);exit();
                }

                $formFile .= TAB . TAB . "\$${colName} = new $elclass('$colName');\n";
                $formFile .= TAB . TAB . "\$${colName}->setLabel('$colFuncName');\n";

                $gen = new \Zend\Code\Generator\ValueGenerator($attr);
                $gen->setArrayDepth(3);
                $formFile .= TAB . TAB . "\$${colName}->setAttributes(".$gen.");\n";
                if($add)
                {
                    $formFile .= TAB . TAB . $add;
                }
                $formFile .= TAB . TAB . "\$this->add(\$$colName);\n";
            }

            $formFile .= <<<EOF
            \$send = new Element('submit');
            \$send->setLabel('');
            \$send->setValue('Submit');
            \$send->setAttributes(array(
                'type'  => 'submit'
            ));

            \$this->add(\$send);

            \$csrf = new Element\Csrf('csrf');
            \$this->add(\$csrf);

EOF;

            $formFile .= TAB . "}\n";
            $formFile .= "}";

            $files[$dirModel][$formName . '.php'] = $formFile;

            /**
             * TABLE START
             */

            $tableFile = <<<EOF
<?php

namespace {$this->module}\Model\\$modelName;

use {$this->module}\\Model\\AbstractModelTable;


class $tableName extends AbstractModelTable
{
}
EOF;


            $files[$dirModel][$tableName . '.php'] = $tableFile;


            $inputFilterFile = <<<EOF
<?php

namespace {$this->module}\Model\\$modelName;
use Zend\InputFilter\InputFilter;

class $inputFilterName extends InputFilter
{

    public function __construct()
    {

EOF;
            // Fields
            foreach ($t->getColumns() as $col) {
                $colName = $this->toCamelCase($col->getName());
                $colName[0] = strtolower($colName[0]);

                $if = array('name'=>$colName);
                $if['required'] = $col->isNullable()?false:true;
                $if['filters'] = array();
                $if['validators'] = array();
                if($col->getDatatype() == 'varchar' || $col->getDatatype() == 'char')
                {

                    $if['filters'][] = array('name' => 'StripTags');
                    $if['filters'][] = array('name' => 'StringTrim');
                    $if['filters'][] = array('name' => 'Digits');
                    $if['validators'][]=array('name' => 'StringLength', 'options' => array('min' => 0, 'max' => $col->getCharacterMaximumLength()));
                }
                elseif (strpos($col->getDatatype(),'int') !== false)
                {
                    $if['filters'][] = array('name' => 'StripTags');
                    $if['filters'][] = array('name' => 'StringTrim');
                    $if['filters'][] = array('name' => 'Digits');
                    $if['validators'][]=array('name' => 'Digits');

                    if($col->isNumericUnsigned())
                    {
                        if($col->getDatatype()=='tinyint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => 0, 'max' => 255));
                        elseif($col->getDatatype()=='smallint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => 0, 'max' => 65535));
                        elseif($col->getDatatype()=='mediumint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => 0, 'max' => 16777215));
                        elseif($col->getDatatype()=='int') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => 0, 'max' => 4294967295));
                        elseif($col->getDatatype()=='bigintint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => 0, 'max' => 18446744073709551615));
                    }
                    else
                    {
                        if($col->getDatatype()=='tinyint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => -127, 'max' => 127));
                        elseif($col->getDatatype()=='smallint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => -32767, 'max' => 32767));
                        elseif($col->getDatatype()=='mediumint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => -8388607, 'max' => 8388607));
                        elseif($col->getDatatype()=='int') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => -2147483647, 'max' => 2147483647));
                        elseif($col->getDatatype()=='bigintint') $if['validators'][]=array('name' => 'Between', 'options' => array('min' => -9223372036854775807, 'max' => 9223372036854775807));
                    }
                }
                elseif (strpos(strtolower($col->getDatatype()),'enum') !== false)
                {
                    $if['filters'][] = array('name' => 'StripTags');
                    $if['filters'][] = array('name' => 'StringTrim');
                    $if['filters'][] = array('name' => 'Digits');
                    $if['validators'][]=array('name' => 'InArray', 'options' => array('haystack'=>$col->getErrata('permitted_values')));
                }
                elseif (strpos(strtolower($col->getDatatype()),'enum') !== false)
                {
                    $if['filters'][] = array('name' => 'StripTags');
                    $if['filters'][] = array('name' => 'StringTrim');
                    $if['validators'][]=array('name' => 'Date', 'format' => '%Y-%m-%d');
                }

                if(strpos(strtolower($colName),'ip')!==NULL && strpos($colName,'Id')===NULL)
                {
                    $if['validators'][] = array('name' => 'Ip');
                }
                $gen = new \Zend\Code\Generator\ValueGenerator($if);
                $gen->setArrayDepth(2);
                //$inputFilterFile .= TAB . TAB . "\$this->add(".var_export($if,true).");\n";
                $inputFilterFile .= TAB . TAB . "\$this->add(".$gen.");\n";
            }
            $inputFilterFile .= TAB."}\n}\n";

            $files[$dirModel][$inputFilterName . '.php'] = $inputFilterFile;

        }


//        exit();
        return $files;
    }

    protected function prompt($tableName) {
        echo "Do you want to model this table ($tableName)? (y/N) ";
        $answer = fgets($this->stdin, 256);
        if (strtolower($answer[0]) === 'y') {
            return true;
        } else {
            return false;
        }
    }

    protected function toCamelCase($name)
    {
        return implode('',array_map('ucfirst', explode('_',$name)));
    }

    protected static function fromCamelCase($name)
    {
        return trim(preg_replace_callback('/([A-Z])/', function($c){ return '_'.strtolower($c[1]); }, $name),'_');
    }
}

$builder = new ModelBuilder($dbconfig, $moduleName);
$builder->run();
