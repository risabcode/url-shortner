# url shortner asisgnment 
role based url shortner based on laravel -12 
# Main Features
 laravel breeze for authentication
 rbac
 company based restrictoin applied
 url shortner management
 feature testing

# Roles

superadmin , admin , member , sales , manager

---

# Database Tables

companies, roles , users , short urls

---



## invite restriction 

-superadmin cannot invite admin in new company
admin cannot invite admin or member in his onw company

---

## short url restriction 

 superadmin cannt create short urls 
 admin cannot created the short urls 
 members cannot ccreate short urls 

 admins can only viw the urls not created in their own company 
member can only view url not created by them 

public short urls are disabed 

---

# relationsihps used 

## User


belongsTo(Company::class)
belongsTo(Role::class)
hasMany(ShortUrl::class)

## company
hasMany(User::class)

## role


hasMany(User::class)


## ShortUrl


belongsTo(User::class)




# Setup


composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

# Default superAdmin


Email: superadmin@gmail.com
Password: password


# ran tests


php artisan test


assingment test passed succesfully 


# AI Usage

ChatGPT was used for, Laravel syntax references, Debugging migration issues, Middleware and validation syntax help
, Small UI improvements

