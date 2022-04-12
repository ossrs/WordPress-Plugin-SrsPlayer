#!/bin/bash

REALPATH=$(realpath $0)
WORK_DIR=$(cd $(dirname $REALPATH)/.. && pwd)
echo "Run pub at $WORK_DIR from $0"
cd $WORK_DIR

git st |grep -q 'nothing to commit'
if [[ $? -ne 0 ]]; then
  echo "Failed: Please commit before release";
  exit 1
fi

RELEASE=$(git describe --tags --abbrev=0 --exclude release-*)
REVISION=$(echo $RELEASE|awk -F . '{print $3}')
let NEXT=$REVISION+1
echo "Last release is $RELEASE, revision is $REVISION, next is $NEXT"

VERSION="1.0.$NEXT" &&
TAG="v$VERSION" &&
echo "publish VERSION=$VERSION, TAG=$TAG"

cat srs-player/readme.txt |sed "s/Stable tag: 1.0.1/Stable tag: $VERSION/g" > tmp.txt && mv tmp.txt srs-player/readme.txt &&
cat srs-player/srs-player.php |sed "s/Version: 1.0.1/Version: $VERSION/g" > tmp.txt && mv tmp.txt srs-player/srs-player.php &&
cat srs-player/srs-player.php |sed "s/define( 'SRS_PLAYER_VERSION', '1.0.1' );/define( 'SRS_PLAYER_VERSION', '$VERSION' );/g" > tmp.txt &&
mv tmp.txt srs-player/srs-player.php
if [[ $? -ne 0 ]]; then echo "Change release failed"; exit 1; fi

GIT_MESSAGE=$(git log -1 --pretty=%B)
cat srs-player/readme.txt | sed "s/== Changelog ==/== Changelog ==\n\n= $VERSION =\n$GIT_MESSAGE/g" > tmp.txt &&
mv tmp.txt srs-player/readme.txt
if [[ $? -ne 0 ]]; then echo "Generate Changelog failed"; exit 1; fi

git ci -am "Update srs-player version to $TAG"
if [[ $? -ne 0 ]]; then echo "Commit release failed"; exit 1; fi

git push
git tag -d $TAG 2>/dev/null && git push origin :$TAG
git tag $TAG
git push origin $TAG
echo "publish $TAG ok"
echo "    https://github.com/ossrs/WordPress-Plugin-SrsPlayer/actions"
