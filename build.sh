#!/bin/bash

cd v2

./build.sh

cd ../v3

./build.sh

cd ../

mkdir tmp-build

cd tmp-build

cp ../v2/pkg_tawk.zip pkg_tawk_joomla2.x.zip
cp ../v3/pkg_tawk.zip pkg_tawk_joomla3.x.zip

cp ../LICENCE.txt ./
cp ../README ./

zip -1 pkg_tawk_UNZIPFIRST.zip -r LICENCE.txt README pkg_tawk_joomla2.x.zip pkg_tawk_joomla3.x.zip

cp pkg_tawk_UNZIPFIRST.zip ../

cd ../

rm -r tmp-build
