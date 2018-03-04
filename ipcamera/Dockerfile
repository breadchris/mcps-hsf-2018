FROM php:7.0-apache
ADD ./log/ /home/log/
ADD ./html/ /var/www/html/
ADD ./ipcam/ /root/ipcam/
RUN echo "deb http://ftp.uk.debian.org/debian jessie-backports main" >> /etc/apt/sources.list
RUN apt-get update && apt-get install -y python ffmpeg
RUN chmod a-w /home/log/thursday
RUN chmod a-w /home/log/friday
RUN chmod a-w /home/log/flag.txt
RUN chmod a-w /var/www/html
CMD (python /root/ipcam/update.py &) && /usr/sbin/apache2ctl -D FOREGROUND
