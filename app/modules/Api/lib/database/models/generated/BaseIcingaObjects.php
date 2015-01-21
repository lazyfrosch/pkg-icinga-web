<?php
// {{{ICINGA_LICENSE_CODE}}}
// -----------------------------------------------------------------------------
// This file is part of icinga-web.
// 
// Copyright (c) 2009-2014 Icinga Developer Team.
// All rights reserved.
// 
// icinga-web is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// icinga-web is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with icinga-web.  If not, see <http://www.gnu.org/licenses/>.
// -----------------------------------------------------------------------------
// {{{ICINGA_LICENSE_CODE}}}

/**
 * BaseIcingaObjects
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $object_id
 * @property integer $instance_id
 * @property integer $objecttype_id
 * @property string $name1
 * @property string $name2
 * @property integer $is_active
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIcingaObjects extends Doctrine_Record {
    public function setTableDefinition() {
        $conn = $this->getTable()->getConnection();
        if(!$conn)
            $conn = Doctrine_Manager::getInstance()->getConnection(IcingaDoctrineDatabase::CONNECTION_ICINGA);
        $prefix = $conn->getPrefix();
        $this->setTableName($prefix.'objects');
        $this->hasColumn('object_id', 'integer', 4, array(
                             'type' => 'integer',
                             'length' => 4,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => true,
                             'autoincrement' => true,
                         ));
        $this->hasColumn('instance_id', 'integer', 2, array(
                             'type' => 'integer',
                             'length' => 2,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '0',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('objecttype_id', 'integer', 2, array(
                             'type' => 'integer',
                             'length' => 2,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '0',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('name1', 'string', 128, array(
                             'type' => 'string',
                             'length' => 128,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('name2', 'string', 128, array(
                             'type' => 'string',
                             'length' => 128,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'notnull' => false,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('is_active', 'integer', 2, array(
                             'type' => 'integer',
                             'length' => 2,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '0',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
    }

    public function setUp() {
        $this->hasOne('IcingaInstances as instance', array(
                          'local' => 'instance_id',
                          'foreign' => 'instance_id'
                      ));
        $this->hasOne('IcingaObjects as object', array(
                          'local' => 'object_id',
                          'foreign' => 'object_id'
                      ));

        // Weak binding to derived objects

        $this->hasOne('IcingaHosts as host', array(
                          'local' => 'object_id',
                          'foreign' => 'host_object_id'
                      ));
        $this->hasOne('IcingaServices as service', array(
                          'local' => 'object_id',
                          'foreign' => 'service_object_id'
                      ));
        $this->hasOne('IcingaServicegroups as servicegroup', array(
                          'local' => 'object_id',
                          'foreign' => 'servicegroup_object_id'
                      ));
        $this->hasOne('IcingaHostgroups as hostgroup', array(
                          'local' => 'object_id',
                          'foreign' => 'hostgroup_object_id'
                      ));
        $this->hasOne('IcingaContactgroups as contactgroup', array(
                          'local' => 'object_id',
                          'foreign' => 'contactgroup_object_id'
                      ));
        $this->hasOne('IcingaContacts as contact', array(
                          'local' => 'object_id',
                          'foreign' => 'contact_object_id'
                      ));
        $this->hasOne('IcingaTimeperiods as timeperiod', array(
                          'local' => 'object_id',
                          'foreign' => 'timeperiod_object_id'
                      ));
        $this->hasOne('IcingaNotifications as notification', array(
                          'local' => 'object_id',
                          'foreign' => 'notification_object_id'
                      ));

        $this->hasMany("IcingaCustomvariables as customvariables", array(
                           "local" => "object_id",
                           "foreign" => "object_id"
                      ));
        parent::setUp();

    }
}
