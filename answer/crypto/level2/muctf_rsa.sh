#!/bin/bash

openssl rsa -text -pubin -in pub.pem -out pub.info >& /dev/null
x=`head -4 pub.info | tail -2 | sed 'N;s/[:\n ]//g'`

n=`python -c "print int('$x',16)"`

read p q <<< $(yafu "factor($n)" | grep "P34 = " | sed "s/P34 = / /g" | sed "N;s/\n/ /g")

rsatool.py -f PEM -o key.pem -p $p -q $q

cat cipher | base64 --decode > cipher1

openssl rsautl -decrypt -inkey key.pem -in cipher1 -out flag.decrypt

cat flag.decrypt
