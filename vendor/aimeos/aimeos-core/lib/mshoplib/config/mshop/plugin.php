<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 */


return array(
	'provider' => array(
		'order' => array(
			'decorators' => array(
				'Log', 'Singleton',
			),
		),
	),
	'manager' => array(
		'type' => array(
			'standard' => array(
				'delete' => array(
					'ansi' => '
						DELETE FROM "mshop_plugin_type"
						WHERE :cond AND siteid = ?
					'
				),
				'insert' => array(
					'ansi' => '
						INSERT INTO "mshop_plugin_type" (
							"code", "domain", "label", "pos", "status",
							"mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
				),
				'update' => array(
					'ansi' => '
						UPDATE "mshop_plugin_type"
						SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
							"status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
				),
				'search' => array(
					'ansi' => '
						SELECT mpluty."id" AS "plugin.type.id", mpluty."siteid" AS "plugin.type.siteid",
							mpluty."code" AS "plugin.type.code", mpluty."domain" AS "plugin.type.domain",
							mpluty."label" AS "plugin.type.label", mpluty."status" AS "plugin.type.status",
							mpluty."mtime" AS "plugin.type.mtime", mpluty."editor" AS "plugin.type.editor",
							mpluty."ctime" AS "plugin.type.ctime", mpluty."pos" AS "plugin.type.position"
						FROM "mshop_plugin_type" mpluty
						:joins
						WHERE :cond
						GROUP BY mpluty."id", mpluty."siteid", mpluty."code", mpluty."domain",
							mpluty."label", mpluty."status", mpluty."mtime", mpluty."editor",
							mpluty."ctime", mpluty."pos" /*-columns*/ , :columns /*columns-*/
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					'
				),
				'count' => array(
					'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT mpluty."id"
							FROM "mshop_plugin_type" mpluty
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					'
				),
				'newid' => array(
					'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
					'mysql' => 'SELECT LAST_INSERT_ID()',
					'oracle' => 'SELECT mshop_plugin_type_seq.CURRVAL FROM DUAL',
					'pgsql' => 'SELECT lastval()',
					'sqlite' => 'SELECT last_insert_rowid()',
					'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
					'sqlanywhere' => 'SELECT @@IDENTITY',
				),
			),
		),
		'standard' => array(
			'delete' => array(
				'ansi' => '
					DELETE FROM "mshop_plugin"
					WHERE :cond AND siteid = ?
				'
			),
			'insert' => array(
				'ansi' => '
					INSERT INTO "mshop_plugin"(
						"typeid", "label", "provider", "config", "pos",
						"status", "mtime", "editor", "siteid", "ctime"
					) VALUES (
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
			),
			'update' => array(
				'ansi' => '
					UPDATE "mshop_plugin"
					SET "typeid" = ?, "label" = ?, "provider" = ?, "config" = ?,
						"pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
					WHERE "siteid" = ? AND "id" = ?
				'
			),
			'search' => array(
				'ansi' => '
					SELECT mplu."id" AS "plugin.id", mplu."siteid" AS "plugin.siteid",
						mplu."typeid" AS "plugin.typeid", mplu."label" AS "plugin.label",
						mplu."provider" AS "plugin.provider", mplu."config" AS "plugin.config",
						mplu."pos" AS "plugin.position", mplu."status" AS "plugin.status",
						mplu."mtime" AS "plugin.mtime", mplu."editor" AS "plugin.editor",
						mplu."ctime" AS "plugin.ctime"
					FROM "mshop_plugin" mplu
					:joins
					WHERE :cond
					GROUP BY mplu."id", mplu."siteid", mplu."typeid", mplu."label",
						mplu."provider", mplu."config", mplu."pos", mplu."status",
						mplu."mtime", mplu."editor", mplu."ctime" /*-columns*/ , :columns /*columns-*/
					/*-orderby*/ ORDER BY :order /*orderby-*/
					LIMIT :size OFFSET :start
				'
			),
			'count' => array(
				'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT DISTINCT mplu."id"
						FROM "mshop_plugin" mplu
						:joins
						WHERE :cond
						LIMIT 10000 OFFSET 0
					) AS list
				'
			),
			'newid' => array(
				'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
				'mysql' => 'SELECT LAST_INSERT_ID()',
				'oracle' => 'SELECT mshop_plugin_seq.CURRVAL FROM DUAL',
				'pgsql' => 'SELECT lastval()',
				'sqlite' => 'SELECT last_insert_rowid()',
				'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
				'sqlanywhere' => 'SELECT @@IDENTITY',
			),
		),
	),
);