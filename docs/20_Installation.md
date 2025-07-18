## Get the sources

I show you different variants.

### Git

```txt
cd [webroot]/vendor/
git clone https://github.com/axelhahn/class-htpasswd.git
```

### Download zip

```txt
cd [webroot]/vendor/
wget https://github.com/axelhahn/class-htpasswd/archive/refs/heads/main.zip
unzip main.zip
rm -f main.zip
```

### Minimal download

The file `htpasswd.class.php` is the only file for pure functionality.

```txt
cd [webroot]/vendor/
mkdir -p class-htpasswd/src
cd class-htpasswd/src
wget https://raw.githubusercontent.com/axelhahn/class-htpasswd/refs/heads/main/src/htpasswd.class.php
```
