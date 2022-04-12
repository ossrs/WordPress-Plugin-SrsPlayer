#!/bin/bash

REALPATH=$(realpath $0)
WORK_DIR=$(cd $(dirname $REALPATH)/.. && pwd)
echo "Run pub at $WORK_DIR from $0"
cd $WORK_DIR

if [[ ! -d svn ]]; then
  echo "no svn found, please run:"
  echo "  svn checkout http://plugins.svn.wordpress.org/srs-player svn"
  exit 1
fi

GIT_MESSAGE=$(git log -1 --pretty=%B)
RELEASE=$(git describe --tags --abbrev=0 --exclude release-* |sed "s/^v//g")
echo "Release to WordPress directory, $RELEASE $GIT_MESSAGE"

rm -rf svn/trunk &&
cp -R srs-player svn/trunk &&
(cd svn && svn add trunk --force) &&
(cd svn && svn copy trunk tags/$RELEASE)
if [[ $? -ne 0 ]]; then echo "Update files for $RELEASE failed"; exit 1; fi

echo "Please checkin manually:"
echo "  cd svn"
echo "  svn ci -m \"Release $RELEASE: $GIT_MESSAGE\" --username winlinvip"
echo "Or revert it:"
echo "  svn revert -R ."

