## Get the sources

I show you different variants.

### Git

```txt
cd [webroot]/vendor/
git clone https://github.com/axelhahn/php-htpasswd.git
```

### Download zip

```txt
cd [webroot]/vendor/
wget https://github.com/axelhahn/php-htpasswd/archive/refs/heads/main.zip
unzip main.zip
rm -f main.zip
```

### Minimal download

The class files are the only files for pure functionality.

```txt
cd [webroot]/vendor/

mkdir -p php-htpasswd/src
cd php-htpasswd/src

wget https://raw.githubusercontent.com/axelhahn/php-htpasswd/refs/heads/main/src/htpasswd.class.php
wget https://raw.githubusercontent.com/axelhahn/php-htpasswd/refs/heads/main/src/htgroup.class.php
```
