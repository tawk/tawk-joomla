#!/bin/sh
set -e;

build_dir=$(dirname $0);
module_dir=$build_dir/bin/tawkto;

if [ -d "$module_dir" ]; then
	echo "Removing existing module folder";
	rm -r $module_dir;
fi

echo "Creating module folder";
mkdir -p $module_dir;

echo "Copying files to module folder";
cp -r $build_dir/../mod_tawkto $module_dir
cp -r $build_dir/../plg_tawkto $module_dir

echo "Done building module folder";

echo "Building docker image"
if [ -z $1 ]; then
	docker-compose build;
else
	docker-compose --env-file $1 build;
fi
