#!/bin/bash

mysql -u admintfg -p tfg < resources/archivos_sql/tablas.sql

mysql -u admintfg -p tfg < resources/archivos_sql/insert.sql
