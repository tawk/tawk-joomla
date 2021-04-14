#!/bin/sh

build_dir=$(dirname $0);

build_release_file() {
    if [ -z "$1" ]
        then
            echo "Extension type wasn't specified";
            return;
    fi

    ext_type=$1;
    ext_dir_name=$ext_type\_tawkto;
    ext_dir=$build_dir/../$ext_dir_name;

    echo "Building Joomla $ext_dir_name...";
    echo "Creating temporary directory"
    rm -rf $build_dir/$ext_dir_name;
    mkdir $build_dir/$ext_dir_name;

    echo "Copying files to temporary directory"
    cp -r $ext_dir/* $build_dir/$ext_dir_name/;

    echo "Retrieving release version";
    release_version=$(retrieve_version $ext_dir $ext_type);

    echo "Creating zip file"
    (cd $build_dir && zip -9 -rq $ext_dir_name-$release_version.zip $ext_dir_name);

    echo "Cleaning up"
    rm -rf $build_dir/$ext_dir_name;

    echo "Done building Joomla $ext_dir_name!";
}

retrieve_version() {
    ext_dir=$1;
    ext_type=$2;
    config_name=tawkto.xml;

    if [ $ext_type = "mod" ]
        then
            config_name=mod_$config_name;
    fi

    awk 'gsub(/<version>|<\/version>\r/,"")' $ext_dir/$config_name | xargs;
}

build_release_file mod;
build_release_file plg;
