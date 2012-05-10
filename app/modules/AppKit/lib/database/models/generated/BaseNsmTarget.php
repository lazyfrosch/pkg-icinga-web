<?php
Doctrine_Manager::getInstance()->bindComponent('NsmTarget', 'icinga_web');

/**
 * BaseNsmTarget
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $target_id
 * @property string $target_name
 * @property string $target_description
 * @property string $target_class
 * @property string $target_type
 * @property Doctrine_Collection $NsmPrincipalTarget
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNsmTarget extends Doctrine_Record {

    public function setTableDefinition() {
        $this->setTableName('nsm_target');
        $this->hasColumn('target_id', 'integer', 4, array(
                             'type' => 'integer',
                             'length' => 4,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => true,
                             'autoincrement' => true,
                         ));
        $this->hasColumn('target_name', 'string', 45, array(
                             'type' => 'string',
                             'length' => 45,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('target_description', 'string', 100, array(
                             'type' => 'string',
                             'length' => 100,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'notnull' => false,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('target_class', 'string', 80, array(
                             'type' => 'string',
                             'length' => 80,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'notnull' => false,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('target_type', 'string', 45, array(
                             'type' => 'string',
                             'length' => 45,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'notnull' => true,
                             'autoincrement' => false,
                         ));

    }

    public function setUp() {
        parent::setUp();
        $this->hasMany('NsmPrincipalTarget', array(
                           'local' => 'target_id',
                           'foreign' => 'pt_target_id'));
    }

    public static function getInitialData() {
        return array(
                   array('target_id'=>1,'target_name'=>"IcingaHostgroup",'target_description'=>"Limit data access to specific hostgroups",'target_class'=>"IcingaDataHostgroupPrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>2,'target_name'=>"IcingaServicegroup",'target_description'=>"Limit data access to specific servicegroups",'target_class'=>"IcingaDataServicegroupPrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>3,'target_name'=>"IcingaHostCustomVariablePair",'target_description'=>"Limit data access to specific custom variables",'target_class'=>"IcingaDataHostCustomVariablePrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>4,'target_name'=>"IcingaServiceCustomVariablePair",'target_description'=>"Limit data access to specific custom variables",'target_class'=>"IcingaDataServiceCustomVariablePrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>5,'target_name'=>"IcingaContactgroup",'target_description'=>"Limit data access to users contact group membership",'target_class'=>"IcingaDataContactgroupPrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>6,'target_name'=>"IcingaCommandRo",'target_description'=>"Limit access to commands",'target_class'=>"IcingaDataCommandRoPrincipalTarget",'target_type'=>"icinga"),
                   array('target_id'=>7,'target_name'=>"appkit.access",'target_description'=>"Access to login-page (which, actually, means no access)",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>8,'target_name'=>"icinga.user",'target_description'=>"Access to icinga",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>9,'target_name'=>"appkit.admin.groups",'target_description'=>"Access to group editor",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>10,'target_name'=>"appkit.admin.users",'target_description'=>"Access to user editor",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>11,'target_name'=>"appkit.admin",'target_description'=>"Access to admin panel ",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>12,'target_name'=>"appkit.user.dummy",'target_description'=>"Basic right for users",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>13,'target_name'=>"appkit.api.access",'target_description'=>"Access to web-based api adapter",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>14,'target_name'=>"icinga.demoMode",'target_description'=>"Hide features like password reset which are not wanted in demo systems",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>15,'target_name'=>"icinga.cronk.category.admin",'target_description'=>"Enables category admin features",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>16,'target_name'=>"icinga.cronk.log",'target_description'=>"Allow user to view icinga-log",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>17,'target_name'=>"icinga.control.view",'target_description'=>"Allow user to view icinga status",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>18,'target_name'=>"icinga.control.admin",'target_description'=>"Allow user to administrate the icinga process",'target_class'=>"",'target_type'=>"credential"),
                   array('target_id'=>19,'target_name'=>"IcingaCommandRestrictions",'target_description'=>"Disable critical commands for this user",'target_class'=>"IcingaDataCommandRestrictionPrincipalTarget",'target_type'=>"icinga")

            );

    }

    public static function getPgsqlSequenceOffsets() {
        return array("nsm_target_target_id_seq" => 20);
    }
}