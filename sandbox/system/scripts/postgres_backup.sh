#!/bin/bash
#
# Simple postgresql backup script
#

db_array="MyDatabase1 MyDatabase2 MyDatabase3 MyDatabase4"
logfile="/tmp/pgsql-backup.log"

cd /var/lib/pgsql/9.0/backups

for db in $db_array
do
        /usr/bin/pg_dump $db > "$db.sql" 1>> $logfile 2>> $logfile
        tar zcvf "$db.tgz" "$db.sql"
        rm -rf "$db.sql"
done
