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
 * Cronk
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 * @property Doctrine_Collection CronkCategory
 * @property Doctrine_Collection NsmPrincipal
 * @package    IcingaWeb
 * @subpackage AppKit
 * @author     Icinga Development Team <info@icinga.org>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Cronk extends BaseCronk {

    public function setTableDefinition() {

        parent::setTableDefinition();

        $this->index('cronk_uid_UNIQUE', array(
                         'fields' => array(
                             'cronk_uid'
                         ),
                         'type' => 'unique'
                     ));
    }

    public function setUp() {
        parent::setUp();

        $this->hasMany('CronkCategory', array(
                           'local'      => 'ccc_cronk_id',
                           'foreign'    => 'ccc_cc_id',
                           'refClass'   => 'CronkCategoryCronk'
                       ));

        $this->hasMany('NsmPrincipal', array(
                           'local'      => 'cpc_cronk_id',
                           'foreign'    => 'cpc_principal_id',
                           'refClass'   => 'CronkPrincipalCronk'
                       ));

        $options = array(
                       'created' =>  array('name' => 'cronk_created'),
                       'updated' =>  array('name' => 'cronk_modified'),
                   );

        $this->actAs('Timestampable', $options);
    }

}
