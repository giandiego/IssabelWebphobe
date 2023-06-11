#! /usr/bin/env bash

# Add items to Issabel menus

sqlite3 /var/www/db/menu.db <<SQL_ENTRY_TAG_1
insert into menu values('webphone','my_extension', '', 'webphone', 'module', '1');
SQL_ENTRY_TAG_1
sqlite3 /var/www/db/acl.db <<SQL_ENTRY_TAG_2
insert into acl_resource values(150, 'webphone', 'webphone');
insert into acl_group_permission values(170, 1, 1, 150);
SQL_ENTRY_TAG_2

# Copiamos var-www-hmtl/webphone a /var/www/html/webphone
cp -Rf ./var-www-html/webphone/ /var/www/html/

# Copiamos var-www-hmtl-modules/webphone a /var/www/html/modules/webphone
cp -Rf ./var-www-html-modules/webphone/ /var/www/html/modules/