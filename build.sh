#!/usr/bin/env bash

export APP_ENV=production

### PHP
composer check-platform-reqs --no-dev --no-interaction
# 自动加载器优化
composer install --optimize-autoloader --no-dev --no-interaction
# 优化配置加载
php artisan config:cache
# 优化路由加载
php artisan route:cache
# 优化视图加载
php artisan view:cache

### Node.js
npm install 
# 运行所有的 Mix 任务并最小化输出
npm run production

### 清理文件
rm -rf node_modules

### 修复目录归属
chown -R www:www .
