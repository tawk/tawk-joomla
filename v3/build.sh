#!/bin/bash

mkdir tmp-build

cd tmp-build

mkdir packages

cp ../pkg_tawk.xml ./
cp ../LICENCE.txt ./
cp -R ../plugin ./
cp -R ../component ./

cd component
zip -1 ../com_tawkwidget.zip -r ./*

cd ../plugin
zip -1 ../plg_tawkwidget.zip -r ./*

cd ../

mv com_tawkwidget.zip packages
mv plg_tawkwidget.zip packages

zip -1 pkg_tawk.zip -r ./packages pkg_tawk.xml LICENCE.txt

cp pkg_tawk.zip ../

cd ../

rm -r tmp-build
