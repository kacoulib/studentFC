USERNAME='root'
PASSWORD=''
DBNAME='db_programer'
HOST='localhost'

USER_USERNAME='tony'
USER_PASSWORD='tony'

_env_example="$APP_NAME/.env.example"
_env="$APP_NAME/.env"

if [ -f ${_env_example} ] && [ ! -f ${_env} ]
then

    sed -i "s/DB_DATABASE=homestead/DB_DATABASE=$DBNAME/g" ${_env_example}
    sed -i "s/DB_USERNAME=homestead/DB_USERNAME=$USER_USERNAME/g" ${_env_example}
    sed -i "s/DB_PASSWORD=secret/DB_PASSWORD=$USER_PASSWORD/g" ${_env_example}

    if [ $(uname -s)="Darwin" ]
    then
       sed -i "s/DB_PORT=3306/DB_PORT=8889/g" ${_env_example}
    fi

    mv ${_env_example} ${_env}
fi

echo "******** MySQL install ***************"

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

echo "Voulez-vous installer Gulp et ses dépendances yes/no ?"
read GULP

if [ $GULP == 'yes' ]
then
    if [ $(uname -s)="Darwin" ]
    then
        sudo npm install -g gulp
        sudo npm install gulp --save-dev
        sudo npm install gulp-sass --save-dev
        sudo npm install gulp-minify-css --save-dev
        sudo npm install gulp-uglify --save-dev
        sudo npm install gulp-concat --save-dev
        sudo npm install gulp-remane --save-dev
        sudo npm install browser-sync --save-dev
    else
        npm install -g gulp
        npm install gulp --save-dev
        npm install gulp-sass --save-dev
        npm install gulp-minify-css --save-dev
        npm install gulp-uglify --save-dev
        npm install gulp-concat --save-dev
        npm install gulp-remane --save-dev
        npm install browser-sync --save-dev
    fi
fi