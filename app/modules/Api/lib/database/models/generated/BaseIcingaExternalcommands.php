<?php
// {{{ICINGA_LICENSE_CODE}}}
// -----------------------------------------------------------------------------
// This file is part of icinga-web.
// 
// Copyright (c) 2009-present Icinga Developer Team.
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
 * BaseIcingaExternalcommands
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $externalcommand_id
 * @property integer $instance_id
 * @property timestamp $entry_time
 * @property integer $command_type
 * @property string $command_name
 * @property string $command_args
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIcingaExternalcommands extends Doctrine_Record {
    public function setTableDefinition() {
        $conn = $this->getTable()->getConnection();
        if(!$conn)
            $conn = Doctrine_Manager::getInstance()->getConnection(IcingaDoctrineDatabase::CONNECTION_ICINGA);
        $prefix = $conn->getPrefix();
        $this->setTableName($prefix.'externalcommands');
        $this->hasColumn('externalcommand_id', 'integer', 4, array(
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
        $this->hasColumn('entry_time', 'timestamp', null, array(
                             'type' => 'timestamp',
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '0000-00-00 00:00:00',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('command_type', 'integer', 2, array(
                             'type' => 'integer',
                             'length' => 2,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '0',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('command_name', 'string', 128, array(
                             'type' => 'string',
                             'length' => 128,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
        $this->hasColumn('command_args', 'string', 255, array(
                             'type' => 'string',
                             'length' => 255,
                             'fixed' => false,
                             'unsigned' => false,
                             'primary' => false,
                             'default' => '',
                             'notnull' => true,
                             'autoincrement' => false,
                         ));
    }

    public function setUp() {
        $this->hasOne('IcingaInstances as instance', array(
                          'local' => 'instance_id',
                          'foreign' => 'instance_id'
                      ));

        parent::setUp();

    }
}
