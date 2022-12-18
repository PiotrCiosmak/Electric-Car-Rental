FROM nginx:1.17.8-alpine

COPY docker/nginx /app/
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf