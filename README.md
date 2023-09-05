<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://assets.laracasts.com/images/logo.svg" width="400"></a></p>
<p align="center"><a href="https://laracasts.com/" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## Docker File

```bash
docker build . --no-cache -t json-server
```

Run Our Server (it refers to `db.json` file) 
```bash
docker run --rm -p 3000:3000  json-server
```
Container down
```bash
docker ps
docker stop <CONTAINER ID>
```
Re-run and specify json file

```bash
docker run --rm -p 3000:3000 json-server alt.json
```



