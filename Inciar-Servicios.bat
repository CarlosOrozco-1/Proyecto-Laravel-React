@echo off
title Iniciar Laravel y React
echo ===============================
echo Iniciando servidor Laravel...
cd C:\Users\Carlos Orozco\Documents\Proyecto-Larabel\ProyectoB\ProyectoB
start cmd /k "php artisan serve"

timeout /t 2

echo Iniciando servidor React...
cd C:\Users\Carlos Orozco\Documents\Proyecto-Larabel\ProyectoA\react-laravel
start cmd /k "npm run dev"

timeout /t 2

echo Abriendo navegadores...
start "" "http://localhost:8000"
start "" "http://localhost:5173"

echo ===============================
echo Servidores iniciados. Puedes cerrar esta ventana.
pause
