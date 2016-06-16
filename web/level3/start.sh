#!/bin/bash

# Very dirty hack to replace variables in code with ENVIRONMENT values
for i in $(env)
do
  variable=$(echo "$i" | cut -d'=' -f1)
  value=$(echo "$i" | cut -d'=' -f2)
  if [[ "$variable" != '%s' ]] ; then
    replace='\$\$_'${variable}'_\$\$'
    find /usr/share/nginx/html -type f -exec sed -i -e 's/'${replace}'/'${value}'/g' {} \;
  fi
done
