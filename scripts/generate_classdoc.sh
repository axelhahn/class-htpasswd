#!/bin/bash
# ----------------------------------------------------------------------
# generate_classdoc.sh
# this script runs on my computer only where the php doc class is 
# referenced locally
# ----------------------------------------------------------------------

cd "$( dirname "$0" )/../"
APPDIR="$( pwd )"
OUTDIR="$APPDIR/docs/99_PHP-classes"

echo "APPDIR: $APPDIR"
echo "OUTDIR: $OUTDIR"

cd "$( dirname $0)/../../php-classdoc"

for phpclassfile in $APPDIR/src/*.class.php; do
    echo "----------------------------------------------------------------------"
    ./parse-class.php --debug --out md $phpclassfile > "$OUTDIR/$(basename $phpclassfile).md"
done
echo "done"