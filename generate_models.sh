#!/bin/bash

models=("Employee" "Department" "Position" "Attendance" "Leave" "Payroll")

for model in "${models[@]}"; do
    php artisan make:model $model -mc
done

echo "All models, controllers, and migrations generated successfully!"