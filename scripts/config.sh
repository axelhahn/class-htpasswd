# ----------------------------------------------------------------------
# CONFIG
# includet by generate_classdoc.sh
# standing in its directory
# ----------------------------------------------------------------------

# go to approot to reference local input and ouput files
cd ..

APPDIR="$( pwd )"
OUTDIR="$APPDIR/docs/99_PHP-classes"

FILELIST="
    src/htgroup.class.php
    src/htpasswd.class.php
"

# web url to watch sources
# The relative filename to approot will be added + "#L" + line number
# (which works for Github and Gitlab for sure)
SOURCEURL="https://github.com/axelhahn/php-htpasswd/tree/main"

# relative or absolute path of local php doc parser
PARSERDIR="$( dirname $0)/../../php-classdoc"

# ----------------------------------------------------------------------
