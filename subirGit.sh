if [ "$1" ]
then 
    git add .
    git commit -m "$1"
    echo "Proyecto Subido a Git"
else 
    echo "Introduce el  nombre del commit"
fi
