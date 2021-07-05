#!/bin/sh

sed -i "s/flag_demo/$FLAG/g" /tmp/initdb.sql
export FLAG=not_flag
FLAG=not_flag
